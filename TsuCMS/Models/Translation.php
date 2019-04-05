<?php

namespace TsuCMS\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use Translatable;

    protected $table = 'translation';
    public $timestamps = false;
    public $translationModel = 'TsuCMS\Models\TranslationTranslated';

    public $translatedAttributes = [
        'value'
    ];
    protected $fillable = [
        'key'
    ];

}
