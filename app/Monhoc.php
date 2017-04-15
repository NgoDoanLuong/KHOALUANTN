<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    //
    protected $fillable=['sinhvien_id','lopmonhoc_id'];
    public function sinhvien(){
      return $this->belongsTo('App\Sinhvien');
    }

    public function diems(){
      return $this->hasMany('App\Diem');
    }

    public function lopmonhoc(){
      return $this->belongsTo('App\Lopmonhoc');
    }
}
