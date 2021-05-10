<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\UnidadesMedidas;
use App\Models\Categorias;
use App\Models\Ingre_Egre;

class Detalles extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'DETALLES';
    public $timestamps=false;
    protected $fillable = [
        'det_descripcion',
        'cat_id',
        'det_preciounitario',
        'det_cantidad',
        'det_subtotal',
        'um_id',
        'ie_id'
    ];   

    public function unidadesmedidas(){
        return $this->hasOne(UnidadesMedidas::class, '_id', 'um_id');
    }
    public function categoria(){
        return $this->hasOne(Categorias::class, '_id', 'cat_id');
    }
    public function factura(){
        return $this->hasOne(Ingre_Egre::class, '_id', 'ie_id');
    }
}
