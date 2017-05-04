@extends('layoutSV')
@section('content')
<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              @if(Session::has('message_diem'))
              <div class=" alert alert-success">
                  {!! Session::get('message_diem') !!}
              </div>
              @endif
              <h3>Đánh giá lại môn: {{$monhoc->lopmonhoc->tenmonhoc}} </h3>
            </div>
          </div>
          <div class="row">
            <div class="editable-responsive">

              <form action="{{route('diem.update',['monhoc_id'=>$monhoc->id])}}" method="post">
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
                          @if($tap_diem[$loop->index]['diemdanhgia']==1)
                          <td><input type="radio" name="{{$tieu->id}}" value="1" required checked></input></td>
                          @else
                          <td><input type="radio" name="{{$tieu->id}}" value="1" required></input></td>
                          @endif

                          @if($tap_diem[$loop->index]['diemdanhgia']==2)
                          <td><input type="radio" name="{{$tieu->id}}" value="2" required checked></input></td>
                          @else
                          <td><input type="radio" name="{{$tieu->id}}" value="2" required ></input></td>
                          @endif

                          @if($tap_diem[$loop->index]['diemdanhgia']==3)
                          <td><input type="radio" name="{{$tieu->id}}" value="3" required checked=""></input></td>
                          @else
                          <td><input type="radio" name="{{$tieu->id}}" value="3" required></input></td>
                          @endif

                          @if($tap_diem[$loop->index]['diemdanhgia']==4)
                          <td><input type="radio" name="{{$tieu->id}}" value="4" required checked=""></input></td>
                          @else
                          <td><input type="radio" name="{{$tieu->id}}" value="4" required></input></td>
                          @endif

                          @if($tap_diem[$loop->index]['diemdanhgia']==5)
                          <td><input type="radio" name="{{$tieu->id}}" value="5" required checked=""></input></td>
                          @else
                          <td><input type="radio" name="{{$tieu->id}}" value="5" required></input></td>
                          @endif
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Đánh giá</button>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
