<?php


namespace TsuCMS\Repositories;


use TsuCMS\Core\Database\Repository;
use TsuCMS\Models\MediaToAny;

class MediaToAnyRepository extends Repository
{

    function model()
    {
     return MediaToAny::class;
    }
}
