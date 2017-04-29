
@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="panel-body">

                      <div class="editable-responsive">
                        @if(Session::has('message_delete'))
                        <div class=" alert alert-success">
                            {!! Session::get('message_delete') !!}
                        </div>
                        @endif
                          <table class="table table-striped" id="tablegv">
                              <thead>
                                  <tr>
                                      <th>STT</th>
                                      <th>Mã giảng viên</th>
                                      <th>Email</th>
                                      <th>Tên giảng viên</th>
                                      <th>Kết quả</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($giangviens as $giangvien)
                                  <tr>
                                      <td>{{$loop->index+1}}</td>
                                      <td>{{$giangvien->magiangvien}}</td>
                                      <td>{{$giangvien->user->email}}</td>
                                      <td>{{$giangvien->tengiangvien}}</td>
                                      <td><button class="btn btn-success"><a href="{{route('ketqua.giangvien.show',['giangvien_id'=>$giangvien->id])}}">Xem kết quả</a></button></td>
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
          </div>
        </div>
@endsection
