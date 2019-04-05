<?php


namespace TsuCMS\Models;


use Illuminate\Database\Eloquent\Model;

class MenuToAny extends Model
{
    protected $table = 'menu_to_anys';

    protected $fillable = [
        'menu_uuid','row_uuid','type'
    ];

    public $timestamps = false;

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
