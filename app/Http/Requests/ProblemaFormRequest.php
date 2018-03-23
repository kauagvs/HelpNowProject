<?php

namespace HelpNow\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProblemaFormRequest extends FormRequest
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
            'problema' =>'max:256',
            'descricao' =>'max:256',
            'status' =>'max:256'
        ];
    }
}
