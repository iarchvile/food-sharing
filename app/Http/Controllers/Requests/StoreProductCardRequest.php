<?php

namespace App\Http\Controllers\Requests;

use App\Http\Requests\FormRequest;
use App\Services\Geocode\GeocodeService;

class StoreProductCardRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'address' => 'required|max:255',
            'photos' => 'array|min:1|max:5',
            'photos.*' => 'image',
        ];
    }

    public function withValidator($validator)
    {
        $this->merge([
            'user_id' => \Auth::user()->id,
        ]);

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
        });
    }

}
