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

    public function scopeCar($query, $nombre) {        
        if(($nombre)){
            return $query->where('car_nombre', 'like', "%$nombre%"); 
        }    
    } 

    public function scopeCarNombre($query, $nombre) {        
        if(($nombre)){
            return $query->where('car_nombre', '=', "$nombre"); 
        }          
    }
}
