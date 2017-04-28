
@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tạo tài khoản</h3>
              </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>Tạo tài khoản cho giảng viên </h2>

                  </div>
                  <div class="x_content">
                    @if(Session::has('flash_message'))
                    <div class=" alert alert-{!! Session::get('flash_level') !!}">
                        {!! Session::get('flash_message') !!}
                    </div>
                    @endif
                    <form action="{{route('giangvien.add')}}" method="post" class="form-horizontal form-label-left" novalidate>
                          {{csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tengiangvien">Họ và tên <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tengiangvien" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tengiangvien"  required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Địa chỉ email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" placeholder="@vnu.edu.vn" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="magiangvien">Mã giảng viên <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="magiangvien" name="magiangvien" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
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

                    <form action="{{route('giangvien.addExcel')}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                        <label>Tạo bảng file excel</label>
                        <input type="file" name="file"/>
                        <button type="submit" class="btn btn-success">Tạo</button>
                    </form>
                  </div>
                </div>
            </div>


            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="panel-body">

                      <div class="editable-responsive">
                        @if(Session::has('message_delete'))
                        <div class=" alert alert-success">
                            {!! Session::get('message_delete') !!}
                        </div>
                        @endif
                          <table class="table table-striped" id="tablegv">
                              <thead>
                                  <tr>
                                      <th>STT</th>
                                      <th>Mã giảng viên</th>
                                      <th>Email</th>
                                      <th>Tên giảng viên</th>
                                      <th>Xoá<th/>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($giangviens as $giangvien)
                                  <tr>
                                      <td>{{$loop->index+1}}</td>
                                      <td>{{$giangvien->magiangvien}}</td>
                                      <td>{{$giangvien->user->email}}</td>
                                      <td>{{$giangvien->tengiangvien}}</td>
                                      <td >
                                        <a onclick="return xoa('Bạn có chắc xoá hay không')" href="{{route('giangvien.delete',['id'=>$giangvien->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá </a>
                                      </td>
                                      <td></td>
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>

@endsection
