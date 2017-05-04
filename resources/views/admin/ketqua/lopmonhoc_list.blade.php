
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
              <h2>Tên học kỳ: {{$hocky->tenhocky}} </h>
              <h3>Danh sách lớp môn học</h3>

            </div>
          </div>
            <div class="editable-responsive">
                <table class="table table-striped" id="table_lopmonhoc">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã lớp môn học</th>
                            <th>Mã giảng viên</th>
                            <th>Tên môn học</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lopmonhocs as $lopmonhoc)
                          <tr>
                              <td>{{$loop->index+1}}</td>
                              <td>{{$lopmonhoc->mamonhoc}}</td>
                              <td>{{$lopmonhoc->magiangvien}}</td>
                              <td><a href="{{route('admin.ketqua',['id_lopmonhoc'=>$lopmonhoc->id])}}"  style="color:blue">{{$lopmonhoc->tenmonhoc}}</a></td>

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
