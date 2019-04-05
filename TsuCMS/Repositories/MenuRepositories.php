<?php

namespace TsuCMS\Repositories;


use TsuCMS\Core\Database\Repository;
use TsuCMS\Models\Menu;

class MenuRepositories extends Repository
{
    function model()
    {
        return Menu::class;
    }

    public function topMenu(){
      return  $this->startCounditions()->mTranslation()->get();
    }

    public function topChildren(){
      return $this->startCounditions()->childrens()->get();
    }

    public function mToAny($catid){
        return $this->startCounditions()->mToAny()->where('menu_uuid','=',$catid);
    }

}
