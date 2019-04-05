<?php


namespace TsuCMS\Models;


use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    protected $table = 'menu_translations';

    protected $fillable = [
        'name','menu_id','locale'
    ];

    public $timestamps = false;


    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
