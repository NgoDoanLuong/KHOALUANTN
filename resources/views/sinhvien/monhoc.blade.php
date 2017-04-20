@extends('layoutSV')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Danh sách môn học của sinh viên </h3>
            </div>
          </div>
          <div class="row">
            @foreach($monhocs as $monhoc)
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">
                  {{$monhoc->lopmonhoc->tenmonhoc}}
                  @if($check_danhgia[$loop->index]==0)
                  <span><button type="button" class="btn btn-warning"><a href="{{route('sinhvien.danhgia',['monhoc_id'=>$monhoc->id])}}">Chưa đánh giá</a></button></span>
                  @else
                    <span><button type="button" class="btn btn-success">Đã đánh giá</button></span>
                  <span><button type="button" class="btn btn-success"><a href="{{route('diem.showUpdate',['monhoc_id'=>$monhoc->id])}}">Đánh giá lại</a></button></span>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
@endsection
