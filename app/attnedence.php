<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attnedence extends Model
{
    
    public function Employee(){
        return $this->belongsTo('App\Employee');
     }
}
