<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8"></meta>
  </head>
  <body>
      Tên môn học: {{$lopmonhoc->tenmonhoc}}
      <form action="{{route('diem.update')}}" method="post">
        {{csrf_field()}}
      <table>
        <tr>
            <th>Tên tiêu chí</th>
            <th>Hoàn toàn không đống ý</th>
            <th>Cơ bản không đồng ý</th>
            <th>Dong y mot phan</th>
            <th>Cơ bản đồng ý</th>
            <th>Hoàn toàn đồng ý</th>
        </tr>
        @foreach($tieuchi as $tieu)
        <tr>
            <td>{{$tieu->tentieuchi}}</td>

            <td><input type="radio" name="{{$tieu->id}}" value="1"></input></td>
            <td><input type="radio" name="{{$tieu->id}}" value="2"></input></td>
            <td><input type="radio" name="{{$tieu->id}}" value="3"></input></td>
            <td><input type="radio" name="{{$tieu->id}}" value="4"></input></td>
            <td><input type="radio" name="{{$tieu->id}}" value="5"></input></td>

        </tr>
        @endforeach
      </table>
      <button type="submit">Submits</button>
      </form>
  </body>
</html>
