<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('DataTableSeeder');
    }
}

class DataTableSeeder extends Seeder{
  public function run(){
    DB::table('diems')->insert([
      array('diemdanhgia'=>2,'tieuchi_id'=>2,'monhoc_id'=>1),
      array('diemdanhgia'=>4,'tieuchi_id'=>2,'monhoc_id'=>2),
      array('diemdanhgia'=>5,'tieuchi_id'=>2,'monhoc_id'=>3),
      array('diemdanhgia'=>3,'tieuchi_id'=>2,'monhoc_id'=>4),
      array('diemdanhgia'=>2,'tieuchi_id'=>2,'monhoc_id'=>5),


      array('diemdanhgia'=>1,'tieuchi_id'=>3,'monhoc_id'=>1),
      array('diemdanhgia'=>4,'tieuchi_id'=>3,'monhoc_id'=>2),
      array('diemdanhgia'=>3,'tieuchi_id'=>3,'monhoc_id'=>3),
      array('diemdanhgia'=>2,'tieuchi_id'=>3,'monhoc_id'=>4),
      array('diemdanhgia'=>1,'tieuchi_id'=>3,'monhoc_id'=>5),

      array('diemdanhgia'=>5,'tieuchi_id'=>4,'monhoc_id'=>1),
      array('diemdanhgia'=>5,'tieuchi_id'=>4,'monhoc_id'=>2),
      array('diemdanhgia'=>5,'tieuchi_id'=>4,'monhoc_id'=>3),
      array('diemdanhgia'=>2,'tieuchi_id'=>4,'monhoc_id'=>4),
      array('diemdanhgia'=>2,'tieuchi_id'=>4,'monhoc_id'=>5),

      array('diemdanhgia'=>1,'tieuchi_id'=>5,'monhoc_id'=>1),
      array('diemdanhgia'=>1,'tieuchi_id'=>5,'monhoc_id'=>2),
      array('diemdanhgia'=>1,'tieuchi_id'=>5,'monhoc_id'=>3),
      array('diemdanhgia'=>3,'tieuchi_id'=>5,'monhoc_id'=>4),
      array('diemdanhgia'=>3,'tieuchi_id'=>5,'monhoc_id'=>5),


    ]);
  }
}

class DataAdminSeeder extends Seeder{
  public function run(){
    DB::table('users')->insert([
      array('email'=>'luong@gmail.com','password'=>bcrypt('123456'),'name'=>'luong','role'=>1),
      array('email'=>'doanluong@gmail.com','password'=>bcrypt('123456'),'name'=>'luong','role'=>1),
      array('email'=>'ngodoanluong@gmail.com','password'=>bcrypt('123456'),'name'=>'luong','role'=>1),

    ]);
  }
}
