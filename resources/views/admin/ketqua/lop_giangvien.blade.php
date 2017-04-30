@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="title_left">
              <h4 style="color:#b30000">Mã giảng viên:{{$giangvien->magiangvien}}<h4>
              <h4 style="color:#b30000">Tên giảng viên:{{$giangvien->tengiangvien}}<h4>
            </div>
            @foreach($tong as $array)
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="panel-body">
                    <div class="title_left">
                      <h4 style="color:blue">{{$array[0]}}</h4>
                    </div>
                    @foreach($array[1] as $lopmonhoc)
                    <?php
                      $sum=$lopmonhoc[1]+$lopmonhoc[2]+$lopmonhoc[3]+$lopmonhoc[4]+$lopmonhoc[5];
                      $diem1 = round(($lopmonhoc[1]/$sum)*100 , 2);
                      $diem2 = round(($lopmonhoc[2]/$sum)*100 , 2);
                      $diem3 = round(($lopmonhoc[3]/$sum)*100 , 2);
                      $diem4 = round(($lopmonhoc[4]/$sum)*100 , 2);
                      $diem5 = 100-($diem1+$diem2+$diem3+$diem4);
                    ?>
                    <div style="height:250px; width:400px; display:inline-block; margin-right:30px">
                    <h5 style="display:block; overflow:hidden">{{$lopmonhoc[0]->mamonhoc}}-{{$lopmonhoc[0]->tenmonhoc}}</h5>
                    <div style="height:200px; width:150px; float:left">

                      <canvas id="{{$lopmonhoc[0]->id}}" ></canvas>
                    </div>
                    <div style="height:200px; width:250px; float:right">

                        <table style="height:200px; width:250px">
                            <tbody>
                                <tr style="height:40px">
                                    <td style="height:40px; width:200px">
                                        <div style="height:18px; width:18px; background-color:black; float:left"></div>
                                        <div style="height:18px; width:175px; float:right">Hoàn toàn không đồng ý</div>
                                    </td>
                                    <td style="height:40px; width:50px">
                                        <div style="height:18px; width:25px; float:left">{{$diem1}}%</div>
                                    </td>
                                </tr>
                                <tr style="height:40px">
                                    <td style="height:40px; width:200px">
                                        <div style="height:18px; width:18px; background-color:#FF6384; float:left"></div>
                                        <div style="height:18px; width:175px; float:right">Cơ bản không đồng ý</div>
                                    </td>
                                    <td style="height:40px; width:50px">
                                        <div style="height:18px; width:25px; float:left">{{$diem2}}%</div>
                                    </td>
                                </tr>
                                <tr style="height:40px">
                                    <td style="height:40px; width:200px">
                                        <div style="height:18px; width:18px; background-color:#36A2EB; float:left"></div>
                                        <div style="height:18px; width:175px; float:right">Đồng ý một phần</div>
                                    </td>
                                    <td style="height:40px; width:50px">
                                        <div style="height:18px; width:25px; float:left">{{$diem3}}%</div>
                                    </td>
                                </tr>
                                <tr style="height:40px">
                                    <td style="height:40px; width:200px">
                                        <div style="height:18px; width:18px; background-color:#FFCE56; float:left"></div>
                                        <div style="height:18px; width:175px; float:right">Cơ bản đồng ý</div>
                                    </td>
                                    <td style="height:40px; width:50px">
                                        <div style="height:18px; width:25px; float:left">{{$diem4}}%</div>
                                    </td>
                                </tr>
                                <tr style="height:40px">
                                    <td style="height:40px; width:200px">
                                        <div style="height:18px; width:18px; background-color:green; float:left"></div>
                                        <div style="height:18px; width:175px; float:right">Hoàn toàn đồng ý</div>
                                    </td>
                                    <td style="height:40px; width:50px">
                                        <div style="height:18px; width:25px; float:left">{{$diem5}}%</div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                  </div>
                    @endforeach
                  </div>
                </div>
            </div>
          </div>
            @endforeach
        </div>
          </div>
        </div>
        <script >
        /*
        @foreach($tong as $tong1){
          console.log({{$tong1[1][0][1]}})
        }
        @endforeach
        console.log({{$tong[0][1][0][1]}});        */

@foreach($tong as $arr)
  @foreach($arr[1] as $lop)

        var ctx = document.getElementById("{{$lop[0]->id}}");
        	var myPieChart = new Chart(ctx,{
        		type: 'pie',
        		data : {

        		    datasets: [
        		        {
        		            data: [{{$lop[1]}}, {{$lop[2]}}, {{$lop[3]}},{{$lop[4]}}, {{$lop[5]}}],
        		            backgroundColor: [
                            "black",
        		                "#FF6384",
        		                "#36A2EB",
        		                "#FFCE56",
        		                "green"
        		            ],
        		            hoverBackgroundColor: [
                            "black",
        		                "#FF6384",
        		                "#36A2EB",
        		                "#FFCE56",
        		                 "green"
        		            ]
        		        }],
                	options: {
                		animation: {
                			animateRotate: true

                		},
                		legend:{
                			labels:{
                				generateLabels:function(chart){

                				}

                			}

                		},
                    tooltips:{
                      xPadding:'average',
                    }
                	}
        	}
        	});

  @endforeach
@endforeach
</script>
@endsection
