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
                            <h4>Tạo học kỳ</h4>
                            <form action="{{route('hocky.create')}}" method="POST">
                              {{csrf_field()}}
                              <input id='tenhocky' name="tenhocky"></input>
                              <button type="submit" class="btn btn-success">Tạo</button>
                            </form>
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
                                        <td><input type="datetime-local" name="start"></input></td>
                                        <td><input type="datetime-local" name="end"></input></td>
                                        <td><button type="submit" class="btn btn-success">Tạo thời gian</button></td>
                                        </form>
                                      <td >
                                        <a href="/admin/hocky/{{$hk->id}}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá</a>
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
