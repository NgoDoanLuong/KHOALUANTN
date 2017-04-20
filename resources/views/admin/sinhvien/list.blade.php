

@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Tạo tài khoản cho sinh viên </h3>

                  </div>
                  <div class="x_content">

                    <form action="{{route('sinhvien.add')}}" method="post" class="form-horizontal form-label-left" novalidate>
                      {{csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tensinhvien">Họ và tên <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tensinhvien" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="tensinhvien"  required="required" type="text">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mssv">Mã số sinh viên <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="mssv" name="mssv" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class">Lớp <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="class" name="class" required="required"  class="form-control col-md-7 col-xs-12">
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
                    <form action="{{route('sinhvien.addExcel')}}" method="POST" enctype="multipart/form-data">
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
                    <h3>Danh sách sinh viên</h3>
                      <div class="editable-responsive">
                          <table class="table table-striped" id="datatable">
                              <thead>
                                  <tr>
                                      <th>STT</th>
                                      <th>Lớp </th>
                                      <th>Mã số sinh viên</th>
                                      <th>Tên sinh viên</th>
                                      <th>Email</th>      
                                      <th>Xoá<th/>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($sinhviens as $sinhvien)
                                  <tr>
                                    <td>{{$loop->index+1}}</td>
                                      <td>{{$sinhvien->class}}</td>
                                      <td>{{$sinhvien->mssv}}</td>
                                      <td>{{$sinhvien->tensinhvien}}</td>
                                      <td>{{$sinhvien->user->email}}</td>
                                      <td><a href="{{route('sinhvien.delete',['id'=>$sinhvien->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá </a>
                                      </td>
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
        <script type="text/javascript">
         $(document).ready(function() {
           $('#datatable').DataTable();
        } );
        </script>
@endsection
