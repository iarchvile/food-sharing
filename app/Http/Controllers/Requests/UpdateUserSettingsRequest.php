<?php


namespace App\Http\Controllers\Requests;


use App\Http\Requests\FormRequest;
use App\Services\Geocode\GeocodeService;
use App\Services\Users\UsersService;

class UpdateUserSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param  GeocodeService  $geocode_service
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|max:12',
            'address' => 'required|string|max:255',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $geocode_service = resolve(GeocodeService::class);
            $point = $geocode_service->getPoint($this->address);

            if (!is_null($point)) {
                $this->merge([
                    'latitude' => $point[0],
                    'longitude' => $point[1],
                ]);
            } else {
                $validator->errors()->add('field', 'Address is wrong!');
            }

            $user_service = resolve(UsersService::class);
            $user = $user_service->getUserByPhone($this->phone);
            if(\Auth::user()->id !== $user->id){
                $validator->errors()->add('field', 'Phone is already use!');
            }
        });
    }
}
