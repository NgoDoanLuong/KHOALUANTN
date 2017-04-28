@extends('layoutSV')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Đánh giá  môn học: {{$lopmonhoc->tenmonhoc}} </h3>
            </div>
          </div>
          <div class="row">
            <div class="editable-responsive">
              <form action="{{route('danhgia',['monhoc_id'=>$id])}}" method="post">
                {{csrf_field()}}
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

                          <td><input type="radio" name="{{$tieu->id}}" value="1" required></input></td>
                          <td><input type="radio" name="{{$tieu->id}}" value="2" required></input></td>
                          <td><input type="radio" name="{{$tieu->id}}" value="3" required></input></td>
                          <td><input type="radio" name="{{$tieu->id}}" value="4" required></input></td>
                          <td><input type="radio" name="{{$tieu->id}}" value="5" required></input></td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Ghi nhận</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
