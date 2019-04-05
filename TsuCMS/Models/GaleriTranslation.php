<?php


namespace TsuCMS\Models;


use Illuminate\Database\Eloquent\Model;

class GaleriTranslation extends Model
{
    protected $table = 'galeri_translation';

    public $timestamps = false;

    protected $fillable = [
        'og_title','og_description', 'meta_title','meta_description', 'title', 'description','locale','post_id','slug'
    ];
}
