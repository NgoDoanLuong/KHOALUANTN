<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tieuchi extends Model
{
    //
    protected $fillable=['tentieuchi','hocky_id'];
    public function diems(){
      return $this->hasMany('App\Diem');
    }

    public function hocky(){
      return $this->belongsTo('App\Hocky');
    }
}
