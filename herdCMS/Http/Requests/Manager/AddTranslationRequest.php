<?php

namespace HerdCMS\Http\Requests\Manager;


use Illuminate\Foundation\Http\FormRequest;

class AddTranslationRequest extends FormRequest
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
            'key' => 'required|unique:translation',
        ];
    }

    public function messages()
    {
        return [
            'key.required'  => 'Translation field is required',
            'key.unique'    => ' Translation key must be a unique ',
        ];
    }
}
