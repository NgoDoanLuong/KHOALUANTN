@extends('layout')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="row">
          @if($count_diem==0)
          <div class="page-title">
            <div class="title_left">
              <h4>Mã lớp môn học:{{$lopmonhoc->mamonhoc}}</h4>
              <h4>Tên giảng viên:{{$lopmonhoc->giangvien->tengiangvien}}</h4>
              <h4>Tên môn học:{{$lopmonhoc->tenmonhoc}}  </h4>
              <span>Sĩ số:{{$si_so}}</span>
              </br>
              <h3>Chưa có sinh viên đánh giá môn học này</h3>
            </div>
          </div>

          @else
          <div class="page-title">
            <div class="title_left">
              <h4>Mã lớp môn học:{{$lopmonhoc->mamonhoc}}</h4>
              <h4>Tên giảng viên:{{$lopmonhoc->giangvien->tengiangvien}}</h4>
              <h4>Tên môn học:{{$lopmonhoc->tenmonhoc}}  </h4>
              <span>Sĩ số:{{$si_so}}</span>
              </br>
              <span>Số sinh viên đã đánh giá:{{$sv_da_danh_gia}}</span>
            </div>
          </div>
          <div class="row">
            <div class="editable-responsive">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tên tiêu chí</th>
                          <th>Hoàn toàn không đồng ý</th>
                          <th>Cơ bản không đồng ý</th>
                          <th>Đồng ý một phần</th>
                          <th>Cơ bản đồng ý</th>
                          <th>Hoàn toàn đồng ý</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tieuchi as $tieu)
                          <tr>
                              <td>{{$loop->index+1}}</td>
                              <td>{{$tieu->tentieuchi}}</td>
                              @foreach($array_result[$loop->index] as $arr)
                              <?php $phan_tram=round(($arr/$sv_da_danh_gia)*100 , 2); ?>
                              <td><i>{{$arr}}  -- ({{$phan_tram}}%)</i></td>

                              @endforeach
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
          </div>
          @endif
      </div>
    </div>
@endsection
