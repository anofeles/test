<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 12/12/18
 * Time: 8:50 PM
 */

namespace HerdCMS\Http\Requests\Manager;


use HerdCMS\Http\Requests\Manager\Request;

class PageRequest extends Request
{
    public $locales;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $this->locales = getLocales();
        $required = [];


            $required["ka.title"] = 'required';
            $required["ka.description"] = 'required|min:5';


            if ($this->request->get('id') == null){
                $required["ka.slug"] = 'required';
            }
        //todo Feature hook before post save/update request hook


        return $required;
    }

    public function messages()
    {
        $return = [];
        $this->locales = getLocales();

        foreach ($this->locales as $locale)
        {
            if ($this->request->get('id') == null){
                $return["$locale->locale.slug.required"] = $locale->original_name.' - The Slug Field Is Required ';

            }
            $return["$locale->locale.title.required"] = $locale->original_name.' - The Title Field Is Required';
            $return["$locale->locale.description.min"] = $locale->original_name.' - Post Description Is Required';
        }
        //todo Feature hook before return post validation messages
        return $return;
    }
}
