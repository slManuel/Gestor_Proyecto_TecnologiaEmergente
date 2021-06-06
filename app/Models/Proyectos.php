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
        'proy_fechaF',
        'proy_estado'
    ];

    public function scopeProy($query, $nombre,$estado) {        
        if(($nombre) || ($estado)){
            if ($nombre!=null && $estado!="Todos"){
                return $query->where('proy_nombre', 'like', "%$nombre%")
                             ->where('proy_estado', '=', "$estado");
            }
            elseif ($nombre!=null && $estado=="Todos"){
                return $query->where('proy_nombre', 'like', "%$nombre%");
            }
            elseif ($nombre==null && $estado!="Todos"){
                return $query->where('proy_estado', '=', "$estado");
            }
        }        
    }

    public function scopeExiste($query, $nombre) {        
        if(($nombre) ){
            if ($nombre!=null){
                return $query->where('proy_nombre', 'like', "$nombre");
            }
        }        
    }
}
