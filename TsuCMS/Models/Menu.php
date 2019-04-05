<?php


namespace TsuCMS\Models;


use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * @property mixed uuid
 */
class Menu extends Model
{
    use Translatable;

    protected $table = 'menu';

    protected $fillable = [
        'uuid', 'sort', 'target', 'type', 'parent_id', 'user_id', 'faculty_id'
    ];

    public $translatedAttributes = [
        'name','locale'
    ];

//    public function toAny()
//    {
//        return $this->belongsToMany(Page::class,'menu_to_any','menu_uuid','row_uuid','uuid','uuid')
//            ->withPivot('type');
//    }

//    public function toPage()
//    {
//        return $this->belongsToMany(Page::class,'menu_to_any','menu_uuid','row_uuid','uuid','uuid')
//            ->withPivot('type')->where('menu_to_any.type','=','page');
//    }

    public function mToAny()
    {
    return $this->belongsToMany(MenuToAny::class,'menu','parent_id','uuid','3','menu_uuid');
    }

    public function mTranslation()
    {
        return $this->belongsToMany(MenuTranslation::class,'menu','parent_id','id','menu_id','menu_id')
            ->withPivot("type")->orderBy('sort','ASC');
    }

    public function parents()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->belongsToMany(MenuTranslation::class,'menu','target','id','menu_id','menu_id')
            ->withPivot("type","parent_id")->orderBy('sort','ASC');
    }

    function beforeBoot()
    {
        if ($this->uuid == null) {
            $this->uuid = Uuid::uuid4();
        }
    }

}
