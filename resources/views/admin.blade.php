@extends('admin.layouts.masterlayouts')

@section('content')

<?php

use App\Salesman;
use App\Supplier;

$salemans = Salesman::all();
$suppliers = Supplier::all();

$var2=0;
$var3=0;
?>


@foreach($salemans as $saleman)
<?php      $var2++; ?>
@endforeach

@foreach($suppliers as $supplier)
<?php      $var3++; ?>
@endforeach
<div id="content-wrapper">
  <div class="container-fluid" >
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{URL('superadmin')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">

      <div class="col-xl-4 col-sm-6 mb-3" >
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-list"></i>
            </div>
            <div class="mr-5"><?php echo $var2 ?> Salesmen</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>

      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-shopping-cart"></i>
            </div>
            <div class="mr-5">123 New Orders!</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>

      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-fw fa-life-ring"></i>
            </div>
            <div class="mr-5"><?php echo $var3 ?> Suppliers</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="#">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fas fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- DataTables Example -->

  <div class="card mb-3">
    <div class="card-header">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if($errors->all())
        <div align="center" >
          <div align="center" class="alert alert-danger" style="width:30%;">
            <ul style="list-style-type: none;">
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div></div>
          @endif
          <div class="text-left">
           <form method="POST" autocomplete="off" action={{url('/superadmin/graphvalue')}}>
            {{csrf_field()}}
            <fieldset class="date"> 


              <h6>Start Year  - 

                <select id="year_start" name="year_start"> 
                  <option value="2018" name="2018">2018</option>       
                  <option value="2019" name="2019">2019</option>        
                  <option value="2020" name="2020">2020</option>       
                  <option value="2021" name="2021">2021</option>     
                  <option value="2022" name="2022">2022</option>        
                  <option value="2023" name="2023">2023</option>        
                  <option value="2024" name="2024">2024</option>        
                  <option value="2025" name="2025">2025</option>       
                  <option value="2026" name="2026">2026</option>       
                  <option value="2027" name="2027">2027</option>       
                </select> 
                <span class="inst">(Year)</span>   </h4> 


                <h6> End&ensp;&ensp;Year -

                  <select id="year_end" name="year_end" > 
                    <option value="2018" name="2018">2018</option>       
                    <option value="2019" name="2019">2019</option>        
                    <option value="2020" name="2020">2020</option>       
                    <option value="2021" name="2021">2021</option>     
                    <option value="2022" name="2022">2022</option>        
                    <option value="2023" name="2023">2023</option>        
                    <option value="2024" name="2024">2024</option>        
                    <option value="2025" name="2025">2025</option>       
                    <option value="2026" name="2026">2026</option>       
                    <option value="2027" name="2027">2027</option>          
                  </select> 
                  <span class="inst">(Year)</span>     </h4> 
                </fieldset> 

                <button id="create1"  name="create1" type="submit" class="btn btn-primary" >Filter</button>
              </form>
            </div>

            <div align="center">
              <div class="card mb-3" id="chartContainer" align="center" style="height: 370px; width: 65%;">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
      window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
         animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Salesmen Performance"
	},
	axisY: {
		title: "DMS"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Total Profit",
		dataPoints: [ 
    <?php
    foreach($data as $rows)
    {
      echo "{label:'{$rows->fname}',y:{$rows->profit}},";
    }
    ?>
    ]
  }]
});
        chart.render();

      }


    </script>


    <style type="text/css">





      span.inst { 
        font-size: 75%; 
        color: blue; 
        padding-left: .25em; 
      } 


      fieldset.date select:active, 
      fieldset.date select:focus, 
      fieldset.date select:hover 
      { 
        border-color: gray; 
        background-color: lightyellow; 
      } 


    </style>
    @endsection
