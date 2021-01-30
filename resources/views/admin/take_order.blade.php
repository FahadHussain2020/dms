@extends('admin.layouts.masterlayouts')

@section('content')

<div class="container-fluid">
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
			<i class="far fa-edit"></i>
		Take Order</div>
		<div class="card-body">
			
			<div class="row">
				<div class="panel-body">
					
					<form action="{{route('createorder')}}" method="POST">
						@csrf

						<dir class="col-md-3">
						<select name="retailer" id="retailer" class="form-control retailer">
							<option   value="" disabled selected>-----Select Retailer-----</option>
							@foreach ($retailers as $retailer)
							<option value="{{ $retailer->name }}">
								{{ $retailer->name }}
							</option> 
							@endforeach
						</select>
					</dir>
					
					<br>
					<div class="col-md-12">
						<div class="row">
							<!-- <div class="col-md-1">
								No.
								<input type="text" class="form-control input-sm text-right no" id="no" readonly="">
							</div> -->
							<div class="col-md-3">
								Product Name
								<select name="pname" id="pname" class="form-control pname" id="pname">
									<option value="" disabled selected> Select Product</option>
									@foreach ($products as $product)
									<option value="{{ $product->name }}">
										{{ $product->name }}
									</option> 
									@endforeach
								</select>
							</div>
							<div class="col-md-1">
								Product Id
								<input type="hidden" name="productid" class="form-control input-sm text-center pid" id="pid">
							</div>
							<div class="col-md-2">
								Ret.Price
								<input type="text" name="rprice"  class="form-control input-sm text-center retprice" id="retprice">
							</div>
							<div class="col-md-1">
								Avl.Qty
								<input type="text"  disabled="" value="" class="form-control input-sm text-center avlqty" id="avlqty"  >
							</div>
							<div class="col-md-1">
								Ord.Qty
								<input type="text" name="oqty" class="form-control input-sm text-center ordqty" id="ordqty">
							</div>
							<!-- <div class="col-md-1">
								Discount(%)
								<input type="text" class="form-control input-sm text-center discount" value="0" id="discount">
							</div> -->
							<div class="col-md-1">
								Amount
								<input type="text" name="amnt" disabled="" value="" name="amount" class="form-control input-sm text-center amount" id="amount">
							</div>
						</div>
					</div>
					<div class="text-left">
						<div class="col-md-2">
							Total 
							<input type="text" name="total" class="form-control input-sm text-center total" id="total" value="">
						</div>
					</div>
					<dir class="text-right">
						<div class="col-md-12">
							<input type="text" name="save" id="btnsubmit" value="Print" class="btn btn-success btm-sm save">

							<!-- <a href="" 
							data-toggle="tooltip"  value="Add Data To Table" class="btn btn-primary btm-sm add_data" name="add_data"  title="Add to Cart"class="btn btn-info btn-md"><i class="fas fa-cart-plus">	Add to Cart </i> <span id="noti" class="badge badge-danger noti" name="noti" value=""><input type="hidden" name="span" class="form-control span" id="span" value=""> </span></a> -->

							<button type="submit" class="btn btn-primary btm-sm">
								<i class="fas fa-cart-plus">Add to Cart</i>
								<span id="noti" class="badge badge-danger noti" name="noti" value="">
							</button>
						</div>
					</dir>
						


					</form>
					<br>
					<!-- <table class="table table-hover  table-sm table-striped table-bordered data_table" id="data_table">
						<thead class=" thead thead-light">
							<tr>
								<th class="text-center">No#</th>
								<th >Product Name</th>
								<th class="text-center">Product ID</th>
								<th class="text-center">Retailer Price</th>
								<th class="text-center">Availabe Quantity</th>
								<th class="text-center">Order Quantity</th>
								<th class="text-center">Discount(%)</th>
								<th class="text-center">Amount</th>
							</tr>
						</thead>
						<tbody>		
						</tbody>
					</table> -->
				</div>
			</div>
		</div>
	</div>
	<!--Below JAVASCRIPT JQUERY CODE -->

	<script type="text/javascript">

		$( document ).ready(function() {
	    $(".pname").on('change',function(){
		    var getValue=$(this).val();
		    // alert(getValue);
		    

		    $.ajax({
		    type : 'get',
		    url  : '/admin/getproductbyid/'+getValue,
		    data : {'name':getValue},
		    success: function(res){
		    	console.log('Success');
		    	var purprice = $('.amount').val(res.pur_price);
		    	var avlqty = $('.avlqty').val(res.qty);
		    	var pid = $('.pid').val(res.id);
		    	var retprice = $('.retprice').val(res.ret_price);

		    	$(".ordqty").on('input',function()
		    	{
			    	var a = document.getElementById('ordqty').value;
	        		var b = document.getElementById('retprice').value; 
	       			var myResult = a * b;
	          		document.getElementById('total').value = myResult;
			    	// console.log("calculation");
		    	});	
		      console.log(res);
		    },
		    error: function(res){
		      console.log('Failed');
		      // console.log(res);
		    }
			 });

		   

		  });

	     



	    // endLine
		});
	</script>


@endsection