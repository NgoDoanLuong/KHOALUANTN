
@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">
                  <div class="page-title">
                    <div class="title_left">
                      <h3>Danh sách sinh viên lớp môn học</h3>
                      <h4>Học kỳ: {{$lopmonhoc->hocky->tenhocky}}</h4>
                      <h4> Mã lớp môn học:{{$lopmonhoc->mamonhoc}}</h4>
                      <h4>Tên lớp môn học:{{$lopmonhoc->tenmonhoc}}</h4>
                    </div>
                  </div>
                  @if(Session::has('message_delete'))
                  <div class=" alert alert-success">
                      {!! Session::get('message_delete') !!}
                  </div>
                  @endif
                    <div class="editable-responsive">
                        <table class="table table-striped" id="danhsach_lop">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã số sinh viên</th>
                                    <th>Lớp</th>
                                    <th>Tên sinh viên</th>
                                    <th>Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($dssv as $sinhvien)
                              <tr>
                                  <td>{{$loop->index+1}}</td>
                                  <td>{{$sinhvien->sinhvien->mssv}}</td>
                                  <td>{{$sinhvien->sinhvien->class}}</td>
                                  <td>{{$sinhvien->sinhvien->tensinhvien}}</td>
                                  <td>
                                    <a onclick="return xoa('Bạn có chắc xoá hay không')" href="{{ route('monhoc.xoaSV',['id'=>$sinhvien->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá </a>
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
@endsection
