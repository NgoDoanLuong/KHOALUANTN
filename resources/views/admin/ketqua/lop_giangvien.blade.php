@extends('admin.layout')
@section('content')
<div class="right_col" role="main">
          <div class="">
            @foreach($tong as $array)
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="panel-body">
                    <div class="title_left">
                      <h4 style="color:blue">{{$array[0]}}</h4>
                    </div>
                    @foreach($array[1] as $lopmonhoc)
                    <div style="height:350px; width:300px; display:inline-block">
                    <h5 style="display:block; overflow:hidden">{{$lopmonhoc[0]->mamonhoc}}-{{$lopmonhoc[0]->tenmonhoc}}</h5>
                    <div style="height:300px; width:300px; display:block ">

                      <canvas id="{{$lopmonhoc[0]->id}}" ></canvas>
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
  <?php
    $sum=$lop[1]+$lop[2]+$lop[3]+$lop[4]+$lop[5];
    $diem1 = round(($lop[1]/$sum)*100 , 2);
    $diem2 = round(($lop[2]/$sum)*100 , 2);
    $diem3 = round(($lop[3]/$sum)*100 , 2);
    $diem4 = round(($lop[4]/$sum)*100 , 2);
    $diem4 = 100-($diem1+$diem2+$diem3+$diem4);
  ?>
        var ctx = document.getElementById("{{$lop[0]->id}}");
        	var myPieChart = new Chart(ctx,{
        		type: 'pie',
        		data : {
        		    labels: [
        		        "Hoàn toàn không đồng ý",
        		        "Cơ bản không đồng ý",
        		        "Đồng ý một phần",
        		        "Cơ bản đồng ý",
                    "Hoàn toàn đồng ý"
        		    ],
        		    datasets: [
        		        {
        		            data: [{{$diem1}}, {{$diem2}}, {{$diem3}},{{$diem4}}, {{$diem4}}],
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
