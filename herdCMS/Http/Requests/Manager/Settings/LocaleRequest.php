<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 11/15/18
 * Time: 1:26 PM
 */

namespace HerdCMS\Http\Requests\Manager\Settings;



use HerdCMS\Http\Requests\Manager\Request;

class LocaleRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $required = [
            'original_name' => 'required',
            'latin_name' => 'required',
        ];

        if (!$this->request->get('id')){
            $required['locale'] = 'sometimes|required|unique:locales';
        }

        return $required;
    }

    public function messages()
    {
        return [
            'locale.required'  => 'locale field is required',
            'locale.unique'    => ' locale code must be a unique ',
            'original_name.required'  => 'Original name field is required',
            'latin_name.required'  => 'English name field is required',
        ];
    }

}
