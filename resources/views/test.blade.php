<!DOCTYPE html>
<html>
  <head><meta  charset="utf-8" /></head>
  <body>
    <table>
        <tr>
            <th>Tên tiêu chí</th>
            <th>Hoàn toàn không đồng ý</th>
            <th>Cơ bản đồng ý</th>
            <th>Đồng ý một phần</th>
            <th>Cơ bản đồng ý</th>
            <th>Hoàn toàn đồng ý</th>
        </tr>
        @foreach($tieuchi as $tieu)
          <tr>
              <td>{{$tieu->tentieuchi}}</td>
              @foreach($array_result[$loop->index] as $arr)
              <td>{{$arr}}</td>
              @endforeach
          </tr>
        @endforeach

    </table>

  </body>
</html>
