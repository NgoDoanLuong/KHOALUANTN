<!DOCTYPE html>
<html>
<body>
@foreach($tong as $array)
{{$array[0]}}
@foreach($array[1] as $lopmonhoc)
{{$lopmonhoc[0]->tenmonhoc}}
{{$lopmonhoc[1]}}
{{$lopmonhoc[2]}}
{{$lopmonhoc[3]}}
{{$lopmonhoc[4]}}
{{$lopmonhoc[5]}}
@endforeach
@endforeach
</body>
</html>
