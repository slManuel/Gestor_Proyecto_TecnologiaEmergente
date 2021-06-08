<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeExiste($query, $correo) {        
        if(($correo) ){
            if ($correo!=null){
                return $query->where('email', 'like', "$correo");
            }
        }        
    }
    public function scopeBuscar($query, $nombres,$correo) {        
        if(($nombres) || ($correo) ){
            if ($correo == "") {
                return $query->where('name', 'like', "%$nombres%");    
            }else{
                if ($nombres==null) {
                    return $query->where('email', 'like', "%$correo%");
                }else{
                    return $query->where('name', 'like', "%$nombres%")
                                 ->where('email', 'like', "%$correo%");
                }               
            }
        }        
    }

}
