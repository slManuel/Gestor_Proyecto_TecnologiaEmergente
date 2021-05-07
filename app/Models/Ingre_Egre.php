<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingre_Egre extends Model
{
    protected $connection = 'mongodb';
	protected $collection = 'INGRE_EGRE';
    public $timestamps=false;

    protected $fillable = [
        'proy_id',
        'ie_tipo',
        'ie_fecha'
    ];  
    
    public function DETALLES(){
        return $this->hasOne(Detalles::class, '_id', 'det_id');
    }
}
