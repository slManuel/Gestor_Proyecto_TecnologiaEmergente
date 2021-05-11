<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\Cargos;

class Ingre_Egre extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'INGRE_EGRE';
    public $timestamps=false;

    protected $fillable = [
        'proy_id',
        'ie_descripcion',
        'ie_tipo',
        'ie_fecha'
    ];  
    
    public function detalles(){
        return $this->hasOne(Detalles::class, '_id', 'det_id');
    }
    public function scopeIngre($query, $nombre) {        
        if(($nombre)){
            return $query->where('ie_tipo', 'like', "%$nombre%"); 
        }    
    }
}
