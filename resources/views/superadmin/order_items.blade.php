@extends('superadmin.layouts.masterlayouts')

@section('content')
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
    Orders Items
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
            <th scope="col">No#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Retailer Price</th>
            <th scope="col">Ord. Qty</th>
            <th scope="col">Discount(%)</th>
            <th scope="col">Amount</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col">No#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Retailer Price</th>
            <th scope="col">Ord. Qty</th>
            <th scope="col">Discount(%)</th>
            <th scope="col">Amount</th>
          </tr>
        </tfoot>
        <tbody>
          <?php
          use App\Orderitem;
          $orderdata=Orderitem::all();
          ?>
          @if (count($orderdata)>0)
          @foreach($orderdata as $orderdatas)
          @if($orderdatas->ordid == $id)

          <tr>
           <td>{{$orderdatas->pid}}</td>
           <td>{{$orderdatas->pname}}</td>
           <td>{{$orderdatas->rprice}}</td>
           <td>{{$orderdatas->ordqty}}</td>
           <td>{{$orderdatas->discount}}</td>
           <td>{{$orderdatas->amount}}</td>
         </tr>
         @endif
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