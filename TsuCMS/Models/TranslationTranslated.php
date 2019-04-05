<?php

namespace TsuCMS\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationTranslated extends Model
{
    protected $table = 'translation_translated';
    protected $fillable = [
      'value','locale','translation_id'
    ];
    public $timestamps = false;
}
