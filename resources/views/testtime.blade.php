<!DOCTYPE html>
<html>
<body>
  <form action="/datetime" method="post">
    {{csrf_field()}}
    <input type="datetime-local" name="start"></input>
    <input type="datetime-local" name="end"></input>
    <button type="submit">Submit</button>
    </form>
</body>
<html>
