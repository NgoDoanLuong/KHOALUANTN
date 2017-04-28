
@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
        <div class="">
            <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                    <div class="panel-body">
                      @if(Session::has('flash_message'))
                      <div class=" alert alert-{!! Session::get('flash_level') !!}">
                          {!! Session::get('flash_message') !!}
                      </div>
                      @endif
                        <h4>Tạo tiêu chí</h4>
                        <span>Chọn hoc kỳ:  </span>
                        <form action="{{route('tieuchi.add')}}" method="POST">
                            {{csrf_field()}}
                          <select name="hocky_id">
                            @foreach($hocky as $value)
                              <option value="{{$value->id}}">{{$value->tenhocky}}</option>
                            @endforeach
                          </select>
                          <input type="text" id='tentieuchi' name="tentieuchi"></input>
                          <button type="submit" class="btn btn-success">Tạo</button>
                        </form>

                        <form action="{{route('tieuchi.addExcel')}}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}
                            Tạo bảng file excel
                            <select name="hocky_id">
                              @foreach($hocky as $value)
                                <option value="{{$value->id}}">{{$value->tenhocky}}</option>
                              @endforeach
                            </select>
                            <input type="file" name="file"/>
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
                    <h3>Danh sách tiêu chí</h3>
                  </div>
                  <div class="editable-responsive">
                    @if(Session::has('message_delete'))
                    <div class=" alert alert-success">
                        {!! Session::get('message_delete') !!}
                    </div>
                    @endif
                      <table class="table table-striped" id="table_tieuchi">
                          <thead>
                              <tr>
                                  <th>STT</th>
                                  <th>Tên học kỳ</th>
                                  <th>Tên tiêu chí</th>
                                  <th>Xoá<th/>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($hocky as $value)
                              @foreach($tieuchi as $tieu)
                              @if($tieu->hocky_id==$value->id)
                              <tr >
                                <td>{{$loop->index+1}}</td>
                                <td>{{$value->tenhocky}}</td>
                                <td>{{$tieu->tentieuchi}}</td>
                                  <td >
                                    <a onclick="return xoa('Bạn có chắc xoá hay không')" href="{{route('tieuchi.delete',['id'=>$tieu->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Xoá</a>
                                  </td>
                                  <td></td>
                              </tr>
                              @endif
                              @endforeach
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
