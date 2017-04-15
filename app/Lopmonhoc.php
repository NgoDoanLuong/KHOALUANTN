<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lopmonhoc extends Model
{
    //\
    protected $fillable=['tenmonhoc','mamonhoc','magiangvien','hocky_id','giangvien_id'];

    public function hocky(){
      return $this->belongsTo('App\Hocky');
    }

    public function giangvien(){
      return $this->belongsTo('App\Giangvien');
    }

    public function monhocs(){
      return $this->hasMany('App\Monhoc');
    }
}
