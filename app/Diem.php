<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    //
    protected $fillable=['diemdanhgia','tieuchi_id','monhoc_id'];
    public function tieuchi(){
    return $this->belongsTo('App\Tieuchi');
    }

    public function monhoc(){
      return $this->belongsTo('App\Monhoc');
    }

}
