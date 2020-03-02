<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    public function santos(){
        return $this->belongsTo('App\Saint');
    }
}
