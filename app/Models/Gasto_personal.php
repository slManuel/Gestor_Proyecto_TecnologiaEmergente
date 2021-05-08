<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\Proyectos;
use App\Models\Empleados;

class Gasto_personal extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'GASTOS_PERSONAL';
    public $timestamps=false;

    protected $fillable = [
        'proyecto',
        'empleado',
        'gp_fecha',
        'gp_comentario',
        'gp_pago',
    ];   

    public function proyecto(){
        return $this->hasOne(Proyectos::class, '_id', 'proyecto');
    }
    public function empleado(){
        return $this->hasOne(Empleados::class, '_id', 'empleado');
    }
}
