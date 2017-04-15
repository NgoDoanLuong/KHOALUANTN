<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/



Route::group(['middleware'=>'admin'],function(){
Route::group(['prefix'=>'admin'],function(){
  //Quan ly hoc ky
    Route::group(['prefix'=>'hocky'],function(){
      Route::get('/',['as'=>'hocky.list','uses'=>'HocKyController@show']);
      Route::post('list/add',['as'=>'hocky.create','uses'=>'HocKyController@add']);
      Route::get('{id}/delete',['as'=>'hocky.delete','uses'=>'HocKyController@delete']);
    });
//Quan ly tieu chi
    Route::group(['prefix'=>'tieuchi'],function (){
  //  Route::get('/','TieuchiController@list');
    Route::get('/',['as'=>'tieuchi.list','uses'=>'TieuchiController@show']);
    Route::post('/add',['as'=>'tieuchi.add','uses'=>'TieuchiController@add']);
    Route::post('/add/excel',['as'=>'tieuchi.addExcel','uses'=>'TieuchiController@addExcel']);
  //  Route::get('test','TieuchiController@test');
    Route::get('{id}/delete',['as'=>'tieuchi.delete','uses'=>'TieuchiController@delete']);
  });
  //Quan ly sinh vien
  Route::group(['prefix'=>'sinhvien'],function(){
    Route::get('/',['as'=>'sinhvien.list','uses'=>'SinhvienController@show']);
    Route::post('/add',['as'=>'sinhvien.add','uses'=>'SinhvienController@add']);
    Route::post('/addExcel',['as'=>'sinhvien.addExcel','uses'=>'SinhvienController@addExcel']);

    Route::get('{id}/delete',['as'=>'sinhvien.delete','uses'=>'SinhvienController@delete']);
  });
//Quan ly giang vien
  Route::group(['prefix'=>'giangvien'],function(){
    Route::get('/',['as'=>'giangvien.list','uses'=>'GiangvienController@show']);
    Route::post('/add',['as'=>'giangvien.add','uses'=>'GiangvienController@add']);
    Route::post('/addExcel',['as'=>'giangvien.addExcel','uses'=>'GiangvienController@addExcel']);

    Route::get('{id}/delete',['as'=>'giangvien.delete','uses'=>'GiangvienController@delete']);
  });
//Quan ly lop mon hoc
  Route::group(['prefix'=>'lopmonhoc'],function(){
    Route::get('/add',['as'=>'lopmonhoc.showAdd','uses'=>'LopmonhocController@show']);
    Route::post('/add',['as'=>'lopmonhoc.add','uses'=>'LopmonhocController@add']);

    Route::post('addExcel',['as'=>'lopmonhoc.addExcel','uses'=>'LopmonhocController@addExcel']);

    Route::get('{id}/edit',['as'=>'lopmonhoc.getEdit','uses'=>'LopmonhocController@getEdit']);
    Route::post('{id}/edit',['as'=>'lopmonhoc.edit','uses'=>'LopmonhocController@edit']);
    Route::get('{id}/delete',['as'=>'lopmonhoc.delete','uses'=>'LopmonhocController@delete']);

    //Danh sach sinh vien cua lop mon hoc
    Route::get('{id}/listSV',['as'=>'lopmonhoc.listSV','uses'=>'LopmonhocController@listSV']);

  });

  //Quan ly danh sach sinh vien cua lop mon hoc
  Route::group(['prefix'=>'monhoc'],function(){
    Route::get('add',['as'=>'monhoc.showAdd','uses'=>'MonhocController@showAdd']);
    Route::post('add',['as'=>'monhoc.add','uses'=>'MonhocController@add']);
    Route::get('listSV',['as'=>'monhoc.listSV','uses'=>'MonhocController@listSV']);

    Route::post('addExcel',['as'=>'monhoc.createSV','uses'=>'MonhocController@createSV_lop']);
    Route::get('{id}/delete/sinhvien',['as'=>'monhoc.delete','uses'=>'MonhocController@delete']);

    Route::get('{id}/addSV',['as'=>'monhoc.addSV','uses'=>'MonhocController@showAdd']);
    Route::get('{id}/deleteSV',['as'=>'monhoc.xoaSV','uses'=>'MonhocController@xoaSV']);

  });
});
});
Route::get('getLogin',['as'=>'getLogin','uses'=>'LoginController@getLogin']);
Route::post('postLogin',['as'=>'postLogin','uses'=>'LoginController@postLogin']);

Route::get('outout',['as'=>'getLogout','uses'=>'LoginController@logout']);

Route::get('{id}/test','DiemController@showDiem');

Route::get('{id}/monhoc','DiemController@form');

Route::post('danhgia',['as'=>'danhgia','uses'=>'DiemController@danhgia']);
