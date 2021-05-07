<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\Cargos;

class Empleados extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'EMPLEADOS';
    public $timestamps=false;

    protected $fillable = [
        'emp_nombre',
        'car_id',
        'emp_salario',
        'emp_estado',
        'emp_tel',
    ];   

    public function cargo(){
        return $this->hasOne(Cargos::class, '_id', 'car_id');
    }
}
