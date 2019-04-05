<?php

namespace TsuCMS\Http\Controllers\Frontend;


use TsuCMS\Http\Controllers\Controller;
use TsuCMS\Repositories\PostsRepository;
use TsuCMS\Repositories\MenuRepositories;
use TsuCMS\Repositories\MenuToAnyRepository;


abstract class FrontendController extends Controller
{
    private $MenuRepositories, $PostsRepository, $MenuToAnyRepository;

    public function __construct(PostsRepository $postsRepository, MenuRepositories $MenuRepositories, MenuToAnyRepository $MenuToAnyRepository)
    {
        $this->PostsRepository = $postsRepository;
        $this->MenuRepositories = $MenuRepositories;
        $this->MenuToAnyRepository = $MenuToAnyRepository;
    }


}
