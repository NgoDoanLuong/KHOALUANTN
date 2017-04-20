<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    //
    protected $fillable=['tensinhvien','mssv','class'];


    public function monhocs(){
      return $this->hasMany('App\Monhoc');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }
}
