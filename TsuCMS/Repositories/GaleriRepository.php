<?php


namespace TsuCMS\Repositories;


use TsuCMS\Core\Database\Repository;
use TsuCMS\Models\Galeri;

class GaleriRepository extends Repository
{
    function model()
    {
        return Galeri::class;
    }
}
