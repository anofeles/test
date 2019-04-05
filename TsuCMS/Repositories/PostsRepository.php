<?php

namespace TsuCMS\Repositories;

use TsuCMS\Core\Database\Repository;
use TsuCMS\Models\Post;

class PostsRepository extends Repository
{
    function model()
    {
        return Post::class;
    }

    function postlang($leng){
        return $this->startCounditions()->langpost($leng);
    }
}
