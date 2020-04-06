<?php

namespace App\Http\Controllers\Requests;

use App\Http\Requests\FormRequest;
use App\Services\Geocode\GeocodeService;

class UpdateProductCardRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'address' => 'required|max:255',
            'photos' => 'array|max:3',
            'photos.*' => 'image'
        ];
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        $data = parent::getFormData();

        $geocode_service = resolve(GeocodeService::class);

        if ($point = $geocode_service->getPoint($data['address'])) {
            $data['latitude'] = $point[0];
            $data['longitude'] = $point[1];
        }

        return $data;
    }

}
