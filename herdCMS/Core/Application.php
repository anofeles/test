<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 11/12/18
 * Time: 12:14 PM
 */

namespace HerdCMS\Core;


class Application extends \Illuminate\Foundation\Application
{

    public function path($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'herdCMS';
    }

}
