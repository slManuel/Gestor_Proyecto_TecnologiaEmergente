<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UnidadesMedidas extends Eloquent
{
    //use HasFactory;
    protected $connection = 'mongodb';
	protected $collection = 'UNIDAD_DE_MEDIDA';
    public $timestamps=false;

    protected $fillable = [
        'um_nombre'
    ];   
}
