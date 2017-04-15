<!DOCTYPE html>
<htmL>
    <head>
        <meta charset="utf-8"></meta>
    </head>
    <body>
      Hoc ky:{{$hocky->tenhocky}}</br>
      <form action="{{ route('monhoc.add') }}" method="post">
        {{csrf_field()}}
      Chọn lớp môn học của học kì
      <select name="lopmonhoc_id">
        @foreach($lopmonhoc as $lop)
          <option value="{{$lop->id}}">{{$lop->mamonhoc}}--{{$lop->tenmonhoc}}</option>
        @endforeach
      </select>
      Nhập mẫ số sinh viên :
      <input type="text" id="mssv" name="mssv"></input>
      <button type="submit">Submit</button>
      </form>
      <h4>Nhập danh sách các sinh viên học lớp môn học đó</h4>
      <form action="{{ route('monhoc.createSV') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      Chọn lớp môn học của học kì
      <select name="lopmonhoc_id">
        @foreach($lopmonhoc as $lop)
          <option value="{{$lop->id}}">{{$lop->mamonhoc}}--{{$lop->tenmonhoc}}</option>
        @endforeach
      </select>
      <label>Import file</label>
      <input type="file" name="file"/>
      <button type="submit">Import</button>
    </form>
    </body>
</htmL>
