@extends('admin.layout')
        <!-- /top navigation -->

        <!-- page content -->
        @section('content')
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                        <div class="panel-body">
                          <div class="col-lg-12">
                            <h4>Tạo học kỳ</h4>
                            @if(Session::has('flash_message'))
                            <div class=" alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                            @endif
                            <form action="{{route('hocky.create')}}" method="POST">
                              {{csrf_field()}}
                              <input id='tenhocky' name="tenhocky"></input>
                              <button type="submit" class="btn btn-success">Tạo</button>
                            </form>
                        </div>
                        </div>
                  </div>
              </div>
          </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="panel-body">
                    <div class="title_left">
                      <h3>Danh sách học kỳ</h3>
                    </div>
                      <div class="editable-responsive">
                        @if(Session::has('message_delete'))
                        <div class=" alert alert-success">
                            {!! Session::get('message_delete') !!}
                        </div>
                        @endif
                          <table class="table table-striped" id="datatable-editable">
                              <thead>
                                  <tr>
                                      <th>STT</th>
                                      <th>Tên học kỳ</th>
                                      <th>Thời gian bắt đầu</th>
                                      <th>Thời gian kết thúc</th>
                                      <th>Tạo</th>
                                      <th>Xoá<th/>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($hocky as $hk)
                                  <tr>
                                      <td>{{$loop->index+1}}</td>
                                      <td>{{$hk->tenhocky}}</td>
                                      <form action="{{route('hocky.time',['hocky_id'=>$hk->id])}}" method="post">
                                        {{csrf_field()}}
                                        <td><input type="datetime-local" name="batdau"></input></td>
                                        <td><input type="datetime-local" name="ketthuc"></input></td>
                                        <td><button type="submit" class="btn btn-success">Tạo thời gian</button></td>
                                        </form>
                                      <td >
                                        <a onclick="return xoa('Bạn có chắc xoá hay không')" href="{{route('hocky.delete',['id'=>$hk->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá</a>
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
        <!-- /page content -->

        <!-- footer content -->
