<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8"></meta>
  </head>
  <body>
      <form action="{{ route('lopmonhoc.add') }}" method="post">
        {{csrf_field()}}
            <select name="hocky_id">
              @foreach($hockys as $hocky)
                <option value="{{$hocky->id}}">{{$hocky->tenhocky}}</option>
              @endforeach
            </select>
          </br>
          Nhập mã lớp:
          <input type="text" name="mamonhoc" id="mamonhoc">  </br>
          Nhập mã giảng viên:
          <input type="text" name="magiangvien" id="magiangvien">  </br>
          Nhập môn:
          <input type="text" name="tenmonhoc" id="tenmonhoc">  </br>
          <button type="submit">Submit</button>
      </form>
      <form action="{{route('lopmonhoc.addExcel')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <select name="hocky_id">
          @foreach($hockys as $value)
            <option value="{{$value->id}}">{{$value->tenhocky}}</option>
          @endforeach
          <label>Import file</label>
          <input type="file" name="file"/>
          <button type="submit">Import</button>
        </select>
      </form>
      <table>
          <tr>
              <th>Tên học kì</th>
              <th>Mã lớp môn học</th>
              <th>Mã giảng viên</th>
              <th>Tên môn học</th>
              <th>Sửa</th>
              <th>Xoá</th>
          </tr>
          @foreach($hockys as $hocky)
            @foreach($lopmonhocs as $lopmonhoc)
            @if($lopmonhoc->hocky_id==$hocky->id)
              <tr>
                  <td>{{$hocky->tenhocky}}</td>
                  <td>{{$lopmonhoc->mamonhoc}}</td>
                  <td>{{$lopmonhoc->magiangvien}}</td>
                  <td><a href="{{route('lopmonhoc.listSV',['id'=>$lopmonhoc->id])}}">{{$lopmonhoc->tenmonhoc}}</a></td>
                  <td><a href="{{route('lopmonhoc.getEdit',['id'=>$lopmonhoc->id])}}">Sửa</a></td>
                  <td><a href="{{route('lopmonhoc.delete',['id'=>$lopmonhoc->id])}}">Xoá</a></td>
              </tr>
            @endif
            @endforeach
          @endforeach
      </table>
  </body>
</html>
