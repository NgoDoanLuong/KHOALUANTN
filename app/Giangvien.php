<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    //
    protected $fillable=['tengiangvien','magiangvien'];


    public function lopmonhocs(){
      return $this->hasMany('App\Lopmonhoc');
    }
}
