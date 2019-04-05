<?php


namespace TsuCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Locale extends Model
{
    protected $table = 'local';

    protected $fillable = [
        'uuid','locale','original_name','latin_name','is_active','is_default'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model){
            $model->uuid = Uuid::uuid4();
        });
    }


    function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
