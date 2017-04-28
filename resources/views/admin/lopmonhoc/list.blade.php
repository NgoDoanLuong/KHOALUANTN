

@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">
                  <div class="page-title">
                    @if(Session::has('flash_message'))
                    <div class=" alert alert-{!! Session::get('flash_level') !!}">
                        {!! Session::get('flash_message') !!}
                    </div>
                    @endif
                    <div class="title_left">
                      <h3>Tạo lớp môn học</h3>
                    </div>
                  </div>

                  <form action="{{ route('lopmonhoc.add') }}" method="post" class="form-horizontal form-label-left" novalidate>
                    {{csrf_field()}}
                    <div class="item form-group">
                    Chọn học kỳ
                    <select name="hocky_id">
                      @foreach($hockys as $hocky)
                        <option value="{{$hocky->id}}">{{$hocky->tenhocky}}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mamonhoc">Nhập mã lớp <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="mamonhoc" class="form-control col-md-7 col-xs-12"  name="mamonhoc"  required="required" type="text">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="magiangvien">Mã giảng viên <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="magiangvien" name="magiangvien" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tenmonhoc">Tên môn học <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="tenmonhoc" name="tenmonhoc" required="required"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success">Tạo</button>
                      </div>
                    </div>
                  </form>
                    <form action="{{route('lopmonhoc.addExcel')}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
                      {{csrf_field()}}
                      <div class="item form-group">
                          <label>Tạo bảng file excel</label></br>
                      Chọn học kỳ
                      <select name="hocky_id">
                        @foreach($hockys as $value)
                          <option value="{{$value->id}}">{{$value->tenhocky}}</option>
                        @endforeach
                        </select>
                        <input type="file" name="file"/>
                        <button type="submit" class="btn btn-success">Tạo</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Danh sách lớp môn học</h3>

                    </div>
                  </div>
                  @if(Session::has('message_delete'))
                  <div class=" alert alert-success">
                      {!! Session::get('message_delete') !!}
                  </div>
                  @endif
                    <div class="editable-responsive">
                        <table class="table table-striped" id="table_lopmonhoc">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên học kì</th>
                                    <th>Mã lớp môn học</th>
                                    <th>Mã giảng viên</th>
                                    <th>Tên môn học</th>
                                    <th>Sửa/Xoá<th/>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($hockys as $hocky)
                                @foreach($lopmonhocs as $lopmonhoc)
                                @if($lopmonhoc->hocky_id==$hocky->id)
                                  <tr>
                                    
                                      <td>{{$loop->index+1}}</td>
                                      <td>{{$hocky->tenhocky}}</td>
                                      <td>{{$lopmonhoc->mamonhoc}}</td>
                                      <td>{{$lopmonhoc->magiangvien}}</td>
                                      <td><a href="{{route('lopmonhoc.listSV',['id'=>$lopmonhoc->id])}}">{{$lopmonhoc->tenmonhoc}}</a></td>
                                    <td >
                                      <a href="{{route('lopmonhoc.getEdit',['id'=>$lopmonhoc->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Sửa  </a>
                                      <a onclick="return xoa('Bạn có chắc xoá hay không')" href="{{route('lopmonhoc.delete',['id'=>$lopmonhoc->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá </a>
                                    </td>
                                    <td></td>
                                </tr>
                                @endif
                                @endforeach
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
@endsection
