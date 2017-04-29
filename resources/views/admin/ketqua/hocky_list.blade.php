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
                    <div class="title_left">
                      <h3>Danh sách học kỳ</h3></h>
                    </div>
                      <div class="editable-responsive">

                          <table class="table table-striped" id="datatable-editable">
                              <thead>
                                  <tr>
                                      <th>STT</th>
                                      <th>Tên học kỳ</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($hocky as $hk)
                                  <tr>
                                      <td>{{$loop->index+1}}</td>
                                      <td><a href="{!! route('ketqua.show_lopmonhoc',['hk_id'=>$hk->id]) !!}">{{$hk->tenhocky}}</a></td>
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
