<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Proyectos extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'PROYECTOS';
    public $timestamps=false;

    protected $fillable = [
        'proy_nombre',
        'proy_fechaI',
        'proy:fechaF',
        'proy_estado'
    ];
}
