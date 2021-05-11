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

    public function scopeCate($query, $nombre,$estado) {        
        if(($nombre) || ($estado)){
            if ($nombre!=null && $estado!="Todos"){
                return $query->where('cat_nombre', 'like', "%$nombre%")
                             ->where('cat_tipo', '=', "$estado");
            }
            elseif ($nombre!=null && $estado=="Todos"){
                return $query->where('cat_nombre', 'like', "%$nombre%");
            }
            elseif ($nombre==null && $estado!="Todos"){
                return $query->where('cat_tipo', '=', "$estado");
            }
        }        
    }
}
