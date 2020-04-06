<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{

    /**
     * @return array
     */
    public function getFormData()
    {
        $data = $this->except([
            '_token',
            '_method'
        ]);

        return $data;
    }

}
