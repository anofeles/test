<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 11/15/18
 * Time: 1:26 PM
 */

namespace HerdCMS\Http\Requests\Manager;




class MediaRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {



        return [
            'file'=>'required|mimes:jpeg,jpg,png,mp4,pdf,docx,doc,xlsx,xls'
        ];

    }

    public function messages()
    {
        return [
        ];
    }

}
