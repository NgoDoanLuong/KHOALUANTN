@extends('layoutSV')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Danh sách học kỳ </h3>
            </div>
          </div>
          <div class="row">
            @foreach($hockys as $hocky)
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="panel-body">
                  @if($check_time[$loop->index]==-1)
                  {{$hocky->tenhocky}}
                    <button type="button" class="btn btn-warning">Chưa đến thời gian đánh giá</button>
                  @elseif($check_time[$loop->index]==1)
                    {{$hocky->tenhocky}}
                    <button type="button" class="btn btn-danger">  Hết thời gian đánh giá</button>
                  @else
                    <a href="{{route('sinhvien.list_monhoc',['user_id'=>Auth::user()->id,'hocky_id'=>$hocky->id])}}">{{$hocky->tenhocky}}</a>
                    <button type="button" class="btn btn-success">Trong thời gian đánh giá</button>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
@endsection
