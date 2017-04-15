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
    <form action="{{route('giangvien.add')}}" method="post">
      {{csrf_field()}}
        Nhập tên giảng viên:
        <input type="text" id="tengiangvien" name="tengiangvien" required></input></br>
        Nhập mã giảng viên:
        <input type="text" id="magiangvien" name="magiangvien" required=""></input></br>
        Nhập địa chỉ email của giảng viên:
        <input type="text" id="email" name="email" required></input></br>
        <button type="submit">Đăng ký</button>
    </form>
    <form action="{{route('giangvien.addExcel')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
        <label>Import file</label>
        <input type="file" name="file"/>
        <button type="submit">Import</button>
    <table>
        <tr>
            <th>Mã giảng viên</th>
            <th>Tên giảng viên</th>
            <th>Email</th>
            <th>Xoá</th>
        </tr>
        @foreach($giangviens as $giangvien)
          <tr>
              <td>{{$giangvien->magiangvien}}</td>
              <td>{{$giangvien->tengiangvien}}</td>
              <td>{{$giangvien->email}}</td>
              <td><a href="{{route('giangvien.delete',['id'=>$giangvien->id])}}">Xoá</a></td>
          </tr>
        @endforeach
    </table>
  </body>
</html>
