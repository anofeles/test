<?php


namespace TsuCMS\Repositories;


use TsuCMS\Models\Media;
use TsuCMS\Core\Database\Repository;

class MediaRepository extends Repository
{
    function model()
    {
        return Media::class;
    }

    function mediaToAny(){
        return $this->startCounditions()->media();
    }
}
