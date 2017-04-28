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

use Carbon\Carbon;
use Illuminate\Http\Request;

Route::group(['middleware'=>'admin'],function(){
Route::group(['prefix'=>'admin'],function(){
    Route::get('/',function(){
      return view('admin.layout');
    });
  //Quan ly hoc ky
    Route::group(['prefix'=>'hocky'],function(){
      Route::get('/',['as'=>'hocky.list','uses'=>'HocKyController@show']);
      Route::post('list/add',['as'=>'hocky.create','uses'=>'HocKyController@add']);
      Route::get('{id}/delete',['as'=>'hocky.delete','uses'=>'HocKyController@delete']);

      Route::post('{hocky_id}/time',['as'=>'hocky.time','uses'=>'HocKyController@createTime']);
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

  //  Route::get('search',['as'=>'sinhvien.search','uses'=>'SinhvienController@search']);
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
    Route::get('/',['as'=>'monhoc.show','uses'=>'MonhocController@show']);
  //  Route::get('add',['as'=>'monhoc.showAdd','uses'=>'MonhocController@showAdd']);
    Route::post('add',['as'=>'monhoc.add','uses'=>'MonhocController@add']);
  //  Route::get('listSV',['as'=>'monhoc.listSV','uses'=>'MonhocController@listSV']);

    Route::post('addExcel',['as'=>'monhoc.createSV','uses'=>'MonhocController@createSV_lop']);
  //  Route::get('{id}/delete/sinhvien',['as'=>'monhoc.delete','uses'=>'MonhocController@delete']);

    Route::get('{id}/addSV',['as'=>'monhoc.addSV','uses'=>'MonhocController@showAdd']);
    Route::get('{id}/deleteSV',['as'=>'monhoc.xoaSV','uses'=>'MonhocController@xoaSV']);

  });
});
});
Route::get('/',['as'=>'getLogin','uses'=>'LoginController@getLogin']);
Route::post('postLogin',['as'=>'postLogin','uses'=>'LoginController@postLogin']);

Route::get('logout',['as'=>'getLogout','uses'=>'LoginController@logout']);
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Route::get('{id}/test',['as'=>'show_diem','uses'=>'DiemController@showDiem']);

//Route::get('{id}/monhoc','DiemController@form');

//Route::post('danhgia',['as'=>'danhgia','uses'=>'DiemController@danhgia']);

/*
oute::get('test',function(){
  return view('admin.layout');
});*/


//Sinh vien
Route::group(['middleware'=>'sinhvien'],function(){
Route::group(['prefix'=>'sinhvien'],function(){
    Route::get('/',['as'=>'sinhvien.home','uses'=>'SinhvienController@home_sv']);
    //Danh sach mon hoc cua sinh vien
    Route::get('{sinhvien_id}/{hocky_id}/monhoc',['as'=>'sinhvien.list_monhoc','uses'=>'SinhvienController@monhoc_sinhvien']);

    Route::get('{monhoc_id}/monhoc',['as'=>'sinhvien.danhgia','uses'=>'SinhvienController@form_danhgia']);
    Route::post('{monhoc_id}/danhgia',['as'=>'danhgia','uses'=>'DiemController@danhgia']);

    Route::get('{monhoc_id}/update',['as'=>'diem.showUpdate','uses'=>'DiemController@form_update']);
    Route::post('{monhoc_id}/update',['as'=>'diem.update','uses'=>'DiemController@update_diem']);
});
});

//Giang vien
Route::group(['middleware'=>'giangvien'],function(){
Route::group(['prefix'=>'giangvien'],function(){
    Route::get('/',['as'=>'giangvien.home','uses'=>'GiangvienController@home_gv']);
    //Danh sach lop mon hoc cua giang vien
    Route::get('{user_id}/{hocky_id}/lopmonhoc',['as'=>'giangvien.lopmonhoc','uses'=>'GiangvienController@list_monhoc']);
    Route::get('{id_lopmonhoc}/lopmonhoc',['as'=>'show_diem','uses'=>'DiemController@showDiem']);
});
});
