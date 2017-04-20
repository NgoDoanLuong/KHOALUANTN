

@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Tên học kỳ:{{$hocky->tenhocky}}</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">

                  <form action="{{ route('monhoc.add') }}" method="post" class="form-horizontal form-label-left" novalidate>
                      {{csrf_field()}}
                      Chọn lớp môn học của học kì
                      <select name="lopmonhoc_id">
                        @foreach($lopmonhoc as $lop)
                          <option value="{{$lop->id}}">{{$lop->mamonhoc}}--{{$lop->tenmonhoc}}</option>
                        @endforeach
                      </select>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mssv">Nhập mã số sinh viên <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="mssv"  name="mssv"  required="required" type="text">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Tạo</button>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">

                  <form action="{{ route('monhoc.createSV') }}" method="post" class="form-horizontal form-label-left" novalidate>
                      {{csrf_field()}}
                      Chọn lớp môn học của học kì
                      <select name="lopmonhoc_id">
                        @foreach($lopmonhoc as $lop)
                          <option value="{{$lop->id}}">{{$lop->mamonhoc}}--{{$lop->tenmonhoc}}</option>
                        @endforeach
                      </select>
                      <label>Tạo</label>
                      <input type="file" name="file"/>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Tạo</button>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
