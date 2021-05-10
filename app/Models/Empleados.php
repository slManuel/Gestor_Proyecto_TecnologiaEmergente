<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\Cargos;
use App\Models\Gasto_personal;

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
    public function gastoPersonal(){
        return $this->hasOne(Gasto_personal::class, 'empleado', '_id');
    }    
    public function scopeEmp($query, $nombres,$cargo) {        
        if(($nombres) || ($cargo) ){
            if ($cargo == "Todos") {
                return $query->where('emp_nombre', 'like', "%$nombres%");    
            }else{
                if ($nombres==null) {
                    return $query->where('car_id', '=', "$cargo");
                }else{
                    return $query->where('emp_nombre', 'like', "%$nombres%")
                                 ->where('car_id', '=', "$cargo");
                }               
            }
        }        
    }
}
