<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hocky extends Model
{
    protected$table='hockys';
    protected $fillable=['tenhocky','start','end'];

    public function lopmonhocs(){
      return $this->hasMany('App\Lopmonhoc');
    }
    public function tieuchis(){
      return $this->hasMany('App\Tieuchi');
    }
}
