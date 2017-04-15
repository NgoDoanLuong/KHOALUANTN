<!DOCTYPE html>
<html>
  <body>
    <form action="{{route('postLogin')}}" method="post">
      {{csrf_field()}}
    Nhap email
      <input type ="text" name="email" id="email"></input>
      Nhap mat khau:
      <input type="password" name="password" id="password"></input>
      <button type="submit">Submit</button>
      </form>
  </body>
</html>
