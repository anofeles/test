<?php


namespace TsuCMS\Repositories;


use TsuCMS\Core\Database\Repository;
use TsuCMS\Models\Locale;

class LocalesRepository extends  Repository
{
    function model()
    {
        return Locale::class;
    }

}
