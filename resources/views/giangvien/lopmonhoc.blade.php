@extends('layoutGV')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Danh sách môn học của giảng viên </h3>
            </div>
          </div>
          <div class="row">
            @foreach($lopmonhocs as $lophoc)
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">
                  <a style="color:blue" href="{{route('show_diem',['id_lopmonhoc'=>$lophoc->id])}}">{{$lophoc->mamonhoc}}--{{$lophoc->tenmonhoc}} </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
@endsection
