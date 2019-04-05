<?php


namespace TsuCMS\Repositories;

use TsuCMS\Core\Database\Repository;
use TsuCMS\Models\menuToAny;

class MenuToAnyRepository extends Repository
{
    function model()
    {
        return menuToAny::class;
    }

}
