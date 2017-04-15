<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
    @if(count($errors)>0)
      <div class"alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
      </div>
    @endif
    <form action="{{route('sinhvien.add')}}" method="post">
      {{csrf_field()}}
        Nhập tên sinh viên:
        <input type="text" id="tensinhvien" name="tensinhvien" required></input></br>
        Nhập mã số sinh viên:
        <input type="text" id="mssv" name="mssv" required=""></input></br>
        Nhập lớp của sinh viên:
        <input type="text" id="class" name="class" required></input></br>
        Nhập địa chỉ email của sinh viên:
        <input type="text" id="email" name="email" required></input></br>

        <button type="submit">Đăng ký</button>
    </form>
    <form action="{{route('sinhvien.addExcel')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
        <label>Import file</label>
        <input type="file" name="file"/>
        <button type="submit">Import</button>
    <table>
        <tr>
            <th>Lớp</th>
            <th>MSSV</th/>
            <th>Tên sinh viên</th>
            <th>Email</th>
            <th>Xoá</th>
        </tr>
        @foreach($sinhviens as $sinhvien)
          <tr>
              <td>{{$sinhvien->class}}</td>
              <td>{{$sinhvien->mssv}}</td>
              <td>{{$sinhvien->tensinhvien}}</td>
              <td>{{$sinhvien->email}}</td>
              <td><a href="{{route('sinhvien.delete',['id'=>$sinhvien->id])}}">Xoá</a></td>
          </tr>
        @endforeach
    </table>
  </body>
</html>
