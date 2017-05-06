@extends(Auth::user()->role==3 ? 'layoutSV' : (Auth::user()->role==2 ? 'layoutGV' : 'admin.layout'))
@section('content')
<div class="right_col" role="main">
        <div class="">
          @if($count_diem==0)
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="page-title">
            <div class="title_left">
              <h4>Mã lớp môn học: {{$lopmonhoc->mamonhoc}}</h4>
              <h4>Tên giảng viên: {{$lopmonhoc->giangvien->tengiangvien}}</h4>
              <h4>Tên môn học: {{$lopmonhoc->tenmonhoc}}  </h4>
              <span>Sĩ số: {{$si_so}}</span>
              </br>
              <h3>Chưa có sinh viên đánh giá môn học này</h3>
            </div>
          </div>
        </div>
      </div>
          @else
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="page-title">
            <div class="title_left">
              <h4>Mã lớp môn học: {{$lopmonhoc->mamonhoc}}</h4>
              <h4>Tên giảng viên: {{$lopmonhoc->giangvien->tengiangvien}}</h4>
              <h4>Tên môn học: {{$lopmonhoc->tenmonhoc}}  </h4>
              <span>Sĩ số: {{$si_so}}</span>
              </br>
              <span>Số sinh viên đã đánh giá: {{$sv_da_danh_gia}}</span>
            </div>
          </div>

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
        </div>
          @if(Auth::user()->role==1)
          <div class="clearfix"></div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="page-title">
              <div class="title_left">
                <h4>Danh sách sinh viên chưa đánh giá<h4>
              </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
          <div class="editable-responsive">
              <table class="table table-striped" id="danhsach_lop">
                  <thead>
                      <tr>
                          <th>STT</th>
                          <th>Mã số sinh viên</th>
                          <th>Lớp</th>
                          <th>Tên sinh viên</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($sinhvien_chua_danh_gia as $sinhvien)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$sinhvien->sinhvien->mssv}}</td>
                        <td>{{$sinhvien->sinhvien->class}}</td>
                        <td>{{$sinhvien->sinhvien->tensinhvien}}</td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
          </div>
          </div>
        </div>
      </div>
          @endif
          @endif
      </div>
    </div>
@endsection
