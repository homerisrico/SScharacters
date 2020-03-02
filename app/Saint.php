<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saint extends Model
{
    //SE DEBE CREAR PARA PODER ACTUALIZAR EN EL CONTROLLADOR
    protected $fillable = ['titulo','imagen','nombre','constelacion','pais','edad','serie','clase','informacion'];


    public function imagenes(){
        return $this->hasMany('App\Imagen');
    }
}
