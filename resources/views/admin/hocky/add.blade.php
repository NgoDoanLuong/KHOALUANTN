<!DOCTYPE html>
<html>
  <body>
    <form action="{{route('hocky.create')}}" method="POST">
      {{csrf_field()}}
        Tao hoc ky:<input id='tenhocky' name="tenhocky"></input>
        <button type="submit">Submit</button>
    </form>
    <a href="{{route('getLogout')}}">Logout</a>
    <table>
        <tr>
            <th>Ten hoc ky</th>
            <th>Xoa hoc ky</th>
        </tr>
        @foreach($hocky as $hk)
          <tr>
              <td><a href="{{route('monhoc.addSV',['id'=>$hk->id])}}">{{$hk->tenhocky}}</a></td>
              <td><a href="/admin/hocky/{{$hk->id}}/delete">Xoa</a></td>
          </tr>
        @endforeach
    </table>

  </body>
</html>
