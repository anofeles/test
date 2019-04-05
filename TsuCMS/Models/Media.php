<?php


namespace TsuCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'uuid','media','extension'
    ];

    public function media()
    {
        return $this->belongsToMany(Media::class,'media_to_any','is_main','media_uuid','uuid','uuid')
            ->withPivot('type','row_uuid');
    }

    function beforeBoot()
    {
        if ($this->uuid == null){
            $this->uuid = Uuid::uuid4();
        }
    }
}
