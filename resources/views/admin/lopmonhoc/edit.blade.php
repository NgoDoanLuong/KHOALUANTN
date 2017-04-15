<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8"></meta>
  </head>
  <body>
      <h4>Tên học kỳ: {{$hocky->tenhocky}}</h4>
    
      <form action="{{route('lopmonhoc.edit',['id'=>$lopmonhoc->id])}}" method="post">
        {{csrf_field()}}
      Mã lớp môn học:
      <input type="text" id="mamonhoc" name="mamonhoc" value="{{old('mamonhoc',isset($lopmonhoc) ? $lopmonhoc->mamonhoc : null )}}"></input></br>
      Mã giảng viên:
      <input type="text" id="magiangvien" name="magiangvien" value="{{old('magiangvien',isset($lopmonhoc) ? $lopmonhoc->magiangvien : null )}}"></input></br>
      Tên lớp môn học:
      <input type="text" id="tenmonhoc" name="tenmonhoc" value="{{old('tenmonhoc',isset($lopmonhoc) ? $lopmonhoc->tenmonhoc : null )}}"></input></br>
      <button type="submit">Submit</button>
      </form>
  </body>
</html>
