<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Categorias extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'CATEGORIAS';
    public $timestamps=false;

    protected $fillable = [
        'cat_nombre',
        'cat_tipo'
    ];
}
