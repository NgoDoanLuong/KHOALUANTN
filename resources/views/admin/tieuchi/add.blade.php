<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
</head>
  <body>
    <form action="{{route('tieuchi.add')}}" method="POST">
        {{csrf_field()}}
        <select name="hocky_id">
          @foreach($hocky as $value)
            <option value="{{$value->id}}">{{$value->tenhocky}}</option>
          @endforeach
        </select>
        Ten tieu chi<input type="text" name="tentieuchi" id="tentieuchi"/>
        <button type="submit">Submit</button>
    </form>
    <form action="{{route('tieuchi.addExcel')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <select name="hocky_id">
        @foreach($hocky as $value)
          <option value="{{$value->id}}">{{$value->tenhocky}}</option>
        @endforeach
        <label>Import file</label>
        <input type="file" name="file"/>
        <button type="submit">Import</button>
      </select>
    </form>
  <table>
      <tr>
          <td>Tên học kì</td>
          <td>Tên tiêu chí</td>
      </tr>
      @foreach($hocky as $value)
        @foreach($tieuchi as $tieu)
        @if($tieu->hocky_id==$value->id)
        <tr>
            <td>{{$value->tenhocky}}</td>
            <td>{{$tieu->tentieuchi}}</td>
            <td><a href="{{route('tieuchi.delete',['id'=>$tieu->id])}}">Xoá</a></td>
        </tr>
        @endif
        @endforeach
      @endforeach
  </table>
  </body>
</html>
