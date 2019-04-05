<?php


namespace TsuCMS\Models;


use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Monolog\Handler\TestHandler;
use Ramsey\Uuid\Uuid;

class Post extends Model
{
    use Translatable;

    protected $table = 'post';
//    public $translationModel = 'TsuCMS\Models\TranslationTranslated';

    public $translatedAttributes = [
        'og_title','og_description','meta_title','meta_description', 'title', 'description','slug','locale'
    ];

    protected $fillable = [
        'uuid','is_active','is_featured','is_comment_on','type','user_id','faculty_id','created_at'
    ];

    public function langpost($leng){
        return $this->belongsToMany(Post::class,'post_translations','meta_title','post_id')
            ->withPivot('locale')->where('locale','=',$leng)->where('is_comment_on','=',1);
    }

//    public function toMenu()
//    {
//        return $this->belongsToMany(Menu::class,'menu_to_any','row_uuid','menu_uuid','uuid','uuid')
//            ->withPivot('type');
//    }

//    public function tags()
//    {
//        return $this->belongsToMany(Tags::class,'tags_to_any','row_uuid','tag_uuid','uuid','uuid');
//    }


//    public function author(){
//        return $this->hasOne(User::class,'id','user_id');
//    }

//    public function media()
//    {
//        return $this->belongsToMany(Media::class,'media_to_any','row_uuid','media_uuid','uuid','uuid')
//            ->withPivot('type');
//    }

//    public function galleries()
//    {
//        return $this->belongsToMany(Media::class,'media_to_any','row_uuid','media_uuid','uuid','uuid')
//            ->withPivot('type')->where('type','=','GALLERY');
//    }


//    public function facebookCover()
//    {
//        return $this->belongsToMany(Media::class,'media_to_any','row_uuid','media_uuid','uuid','uuid')
//            ->withPivot('type')->where('type','=','FACEBOOKCOVER');
//    }

//    public function pageCover()
//    {
//        return $this->belongsToMany(Media::class,'media_to_any','row_uuid','media_uuid','uuid','uuid')
//            ->withPivot('type')->where('type','=','PAGECOVER');
//    }

//    public function categories()
//    {
//        return $this->belongsToMany(Categories::class,'categories_to_any','row_uuid','category_uuid','uuid','uuid')
//            ->withPivot('type')->where('categories_to_any.type','=','POST');
//    }

//    public function attachments()
//    {
//        return $this->belongsToMany(Media::class,'media_to_any','row_uuid','media_uuid','uuid','uuid')
//            ->withPivot('type')->where('type','=','ATTACHMENT');
//    }

    function beforeBoot()
    {
        if ($this->uuid == null){
            $this->uuid = Uuid::uuid4();
        }
    }
}
