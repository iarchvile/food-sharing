<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{

    public function getFormData()
    {
        $data = $this->except([
            '_token',
            '_method',
            'photos'
        ]);

        return $data;
    }

}
