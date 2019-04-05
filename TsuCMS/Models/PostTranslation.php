<?php


namespace TsuCMS\Models;


use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $table = 'post_translations';

    public $timestamps = false;

    protected $fillable = [
        'og_title','og_description', 'meta_title','meta_description', 'title', 'description','locale','post_id','slug'
    ];

//    function beforeBoot()
//    {
//        // TODO: Implement beforeBoot() method.
//    }
}
