<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   
   protected $fillable = [
      'name', 'email','job_title', 'password','from','to','salary'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
    public function User(){
       return $this->belongsTo('App\User');
    }
    
    public function attnedences(){
        return $this->hasMany('App\attnedence');
     }
     
    public function holidays(){
      return $this->hasMany('App\holiday');
   }
}
