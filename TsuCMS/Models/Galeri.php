<?php


namespace TsuCMS\Models;


use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Galeri extends Model
{
    use Translatable;

    protected $table = 'galeri';

    public $translatedAttributes = [
        'og_title','og_description','meta_title','meta_description', 'title', 'description','slug','locale'
    ];

    protected $fillable = [
        'uuid','is_active','is_featured','is_comment_on','type','user_id','faculty_id','created_at'
    ];

    function beforeBoot()
    {
        if ($this->uuid == null){
            $this->uuid = Uuid::uuid4();
        }
    }
}
