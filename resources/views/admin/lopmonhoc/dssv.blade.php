<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8"></meta>
  </head>
  <body>
      <table>
          <tr>
              <th>Mã số sinh viên </th>
              <th>Lớp </th>
              <th>Tên sinh viên </th>
              <th>Xoá </th>
          </tr>
          <tr>
          @foreach($dssv as $sinhvien)
          <tr>
              <td>{{$sinhvien->sinhvien->mssv}}</td>
              <td>{{$sinhvien->sinhvien->class}}</td>
              <td>{{$sinhvien->sinhvien->tensinhvien}}</td>
              <td><a href="{{ route('monhoc.xoaSV',['id'=>$sinhvien->id]) }}">Xoá</a></td>
          </tr>
          @endforeach
          </tr>
      </table>

  </body>
</html>
