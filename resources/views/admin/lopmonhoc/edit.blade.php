


@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">
                  @if(Session::has('message_edit'))
                  <div class=" alert alert-{!! Session::get('level_edit') !!}">
                      {!! Session::get('message_edit') !!}
                  </div>
                  @endif
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Tên học kỳ:{{$hocky->tenhocky}}</h3>
                    </div>
                  </div>

                  <form action="{{route('lopmonhoc.edit',['id'=>$lopmonhoc->id])}}" method="post" class="form-horizontal form-label-left" novalidate>
                      {{csrf_field()}}
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mamonhoc">Nhập mã lớp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="mamonhoc" class="form-control col-md-7 col-xs-12"  name="mamonhoc"  value="{{old('mamonhoc',isset($lopmonhoc) ? $lopmonhoc->mamonhoc : null )}}" required="required" type="text">
                            </div>
                          </div>

                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="magiangvien">Mã giảng viên <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="magiangvien" name="magiangvien" value="{{old('magiangvien',isset($lopmonhoc) ? $lopmonhoc->magiangvien : null )}}" required="required"  class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>

                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tenmonhoc">Tên môn học <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="tenmonhoc" name="tenmonhoc" value="{{old('tenmonhoc',isset($lopmonhoc) ? $lopmonhoc->tenmonhoc : null )}}" required="required"  class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Sửa</button>
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
