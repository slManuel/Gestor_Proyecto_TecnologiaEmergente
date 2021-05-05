<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Cargos extends Eloquent
{
    //use HasFactory;
    protected $connection = 'mongodb';
	protected $collection = 'CARGOS';
    public $timestamps=false;

    protected $fillable = [
        'car_nombre'
    ];   
}
