<?php

namespace TsuCMS\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $table = 'options';
    public $timestamps = false;
    protected $fillable = [
      'name',
      'value'
    ];






}
