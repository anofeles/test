<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 12/19/18
 * Time: 8:22 PM
 */

namespace HerdCMS\Http\Requests;


use HerdCMS\Http\Requests\Manager\Request;

class UserRequest extends Request
{

    public function rules()
    {

       return [
           'name'=>'required',
           'role'=>'required',
       ];
    }

    public function messages()
    {
       return [
         'name.required' => 'name required',
         'email.unique' => 'Email Must Be a unique',
         'role.unique' => 'Role Field Is Required'
       ];
    }

}
