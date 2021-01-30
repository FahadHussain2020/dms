@extends('admin.layouts.masterlayouts')

@section('content')
<?php
use App\Salesman;
?>
<div class="container-fluid">
  <br>
  <div class="row">
    <div class="col-md-6  col-lg-6">
     @if (session('info'))
     <div class="alert alert-success">
      {{session('info')}}
    </div>
    @endif
  </div>
</div>
<br>
<div class="card mb-3">
  <div class="card-header">
    <i class="fab fa-shirtsinbulk"></i>
    Orders
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
          <h6>Orders not Saved</h6>
        </div></div>
        @endif
        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
         <br>
         <thead>
          <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Retailer Name</th>
            <th scope="col">Total</th>
            <th scope="col">Order Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
             <th scope="col">Order Id</th>
            <th scope="col">Retailer Name</th>
            <th scope="col">Total</th>
            <th scope="col">Order Date</th>
            <th scope="col">Action</th>
          </tr>
        </tfoot>
        <tbody>
          @if (count($order)>0)
         @foreach($order as $order)
         <tr>
           <td style="color:#C70039;">{{$order->ordid}}</td>
           <td>{{$order->rname}}</td>
           <td>{{$order->rtotal}}</td>
           <td>{{$order->created_at}}</td>
           <!-- <?php

         $var=$order->takenby;
         $data=Salesman::all();
          foreach($data as $datas)
          {
            if($datas->id==$var)
            {
              ?>
         <td>{{$datas->fname}}</td>
         <?php
       }
     }
     ?> -->
           <td>

            <a href='{{url("/admin/vieworderitem/$order->ordid")}}' title="View Order Detail"class="btn btn-success btn-sm"><i class="fas fa-eye"></i> </a> | 
             <a href='{{url("/admin/deleteorder/$order->ordid")}}' data-toggle="tooltip"  title="Delete"class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
           </td>
         </tr> 
         @endforeach
         @endif
       </tbody>
     </table>
   </div>
 </div>
</div>
</div>
</body>
</html>

</script>


@endsection