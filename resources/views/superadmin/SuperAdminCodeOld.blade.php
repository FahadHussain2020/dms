@extends('superadmin.layouts.masterlayouts')

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
					
					<dir class="col-md-3">
						<select name="retailer" id="retailer" class="form-control retailer">
							<option   value="" disabled selected>-----Select Retailer-----</option>
							@foreach ($retailers as $retailer)
							<option value="{{ $retailer->id }}">
								{{ $retailer->name }}
							</option> 
							@endforeach
						</select>
					</dir>
					
					<br>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-1">
								No.
								<input type="text" class="form-control input-sm text-right no" id="no" readonly="">
							</div>
							<div class="col-md-3">
								Product Name
								<select name="pname" id="pname" class="form-control pname" id="pname">
									<option value="" disabled selected> Select Product</option>
									@foreach ($products as $product)
									<option value="{{ $product->id }} " pro-qty="{{ $product->qty }}" ret-price="{{ $product->ret_price }}"  >
										{{ $product->name }}
									</option> 
									@endforeach
								</select>
							</div>
							<div class="col-md-1">
								Product Id
								<input type="text" disabled="" class="form-control input-sm text-center pid" id="pid">
							</div>
							<div class="col-md-2">
								Ret.Price
								<input type="text"   class="form-control input-sm text-center retprice" id="retprice">
							</div>
							<div class="col-md-1">
								Avl.Qty
								<input type="text"  disabled="" class="form-control input-sm text-center avlqty" id="avlqty">
							</div>
							<div class="col-md-1">
								Ord.Qty
								<input type="text" class="form-control input-sm text-center ordqty" id="ordqty">
							</div>
							<div class="col-md-1">
								Discount(%)
								<input type="text" class="form-control input-sm text-center discount" value="0" id="discount">
							</div>
							<div class="col-md-1">
								Amount
								<input type="text" disabled="" name="amount" class="form-control input-sm text-center amount" id="amount">
							</div>
						</div>
					</div>
					<div class="text-left">
						<div class="col-md-2">
							Total 
							<input type="text" name="total" disabled="" class="form-control input-sm text-center total" id="total">
						</div>
					</div>
					<dir class="text-right">
						<div class="col-md-12">
                            
							<input type="text" name="save" id="btnsubmit" value="Add Table Data to Database" class="btn btn-success btm-sm save">

							<a href='#' 
							data-toggle="tooltip"  value="Add Data To Table" class="btn btn-primary btm-sm add_data" name="add_data"  title="Add to Cart"class="btn btn-info btn-md"><i class="fas fa-cart-plus">	Add to Cart </i> <span id="noti" class="badge badge-danger noti" name="noti" value=""><input type="hidden" name="span" class="form-control span" id="span" value=""> </span></a>
						</div>
					</dir>
					<br>
					<table class="table table-hover  table-sm table-striped table-bordered data_table" id="data_table">
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
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--Below JAVASCRIPT JQUERY CODE -->
	<script type="text/javascript">
		$(function() {	
	//set number for adding row
	var set_number = function(){
		var table_len=$('#data_table tbody tr').length+1; 
		$('#no').val(table_len);
	}
	set_number();


	//Add Rows

	$('.add_data').click(function(){
		var no = $('#no').val();
		var pname = $('#pname option:selected').text();
		var pid = $('#pid').val();
		var retprice = $('#retprice').val();
		var avlqty = $('#avlqty').val();
		var ordqty = $('#ordqty').val();
		var discount = $('#discount').val();
		var amount = $('#amount').val();

		$('#data_table tbody:last-child').append(

			'<tr>'+
			'<td  class="text-center">'+no+'</td>'+
			'<td >'+pname+'</td>'+
			'<td class="text-center">'+pid+'</td>'+
			'<td class="text-center">'+retprice+'</td>'+
			'<td class="text-center">'+avlqty+'</td>'+
			'<td class="text-center">'+ordqty+'</td>'+
			'<td class="text-center">'+discount+'</td>'+
			'<td class="text-center">'+amount+'</td>'+
			'<td class=""><a href="#" type="button"  data-toggle="tooltip"  title="Delete Product" class="ibtnDel btn btn-md btn-danger"><i class="fas fa-times"></i></a></td>'+
			'</tr>'	
			);
			//clear input data.....


			//call the function to set number
			set_number();

		});

		//Remove Row
		$("#data_table").on("click", ".ibtnDel", function (event) {
			//to remove amount of this row from total
			var cur=$(this).closest("tr");
			var rap= cur.find('td:eq(7)').text(); 
			var total = parseFloat($('.total').val()) || 0;
			var total=total-rap;
			$('.total').val(total);
			//to remove this row
			$(this).closest("tr").remove();
			//alert(rap);     			
			set_number();
		});


		$('.save').click(function(){
			
			var table_data= [];

			//we will use it to save

			$('#data_table tr').each(function(row,tr){

				//create below array to store all the data per row
				//get only data with value
				if($(tr).find('td:eq(0)').text() == ""){

				}else{
					var sub={


						'no': $(tr).find('td:eq(0)').text(),
						'pname': $(tr).find('td:eq(1)').text(),
						'pid': $(tr).find('td:eq(2)').text(),
						'retprice': $(tr).find('td:eq(3)').text(),
						'avlqty': $(tr).find('td:eq(4)').text(),
						'ordqty': $(tr).find('td:eq(5)').text(),
						'discount': $(tr).find('td:eq(6)').text(),
						'amount': $(tr).find('td:eq(7)').text()
					};
					table_data.push(sub);
					
				}




			});
			//use ajax to insert data to database
			//with sweatalert function also for message popup

			swal({
				title: "SUCCESS!",
				text: "Bill Saved Successfully",
				icon: "success",
				showLoaderOnConfirm: true,
				showCancelButton: true,
				confirmButtonText: 'Yes',
				closeOnConfirm: false,
			});	





		});

	//show PID of product
	$('#pname').on('change', function() {
		$('.pid').val($(this).val());
	});	
	//show PQty of product
	$('#pname').on('change', function() {
		var avlqty=$(this).find('option:selected').attr('pro-qty');
		$('.avlqty').val(avlqty);
	});	
	//show retprice of product
	$('#pname').on('change', function() {
		var retp=$(this).find('option:selected').attr('ret-price');
		$('.retprice').val(retp);
	});
	//get amount by xply order*retprice
	$('.ordqty, .rprice').change(function(){
		var ordqty = parseFloat($('.ordqty').val()) || 0;
		var rprice = parseFloat($('.retprice').val()) || 0;

		$('.amount').val(ordqty * rprice); 

	});

	//get discout
	$('.ordqty, .retprice, .discount').change(function(){

		var ordqty = parseFloat($('.ordqty').val()) || 0;
		var rprice = parseFloat($('.retprice').val()) || 0;
		var discount = parseFloat($('.discount').val()) || 0;
		var latest=ordqty*rprice;
		var newv=(latest*discount)/100;

		$('.amount').val(latest-newv );   
		
	});

	//Get Total
	$('.add_data').click(function(){
		
		$('.amount').each(function(row,tr){
			var amount=$(this).val()-0;
			var total = parseFloat($('.total').val()) || 0;
			total+=amount;
			$('.total').val(total);
		})


		$('#pname').val('');
		$('#pid').val('');
		$('#retprice').val('');
		$('#avlqty').val('');
		$('#ordqty').val('');
		$('#discount').val('0');
		$('#amount').val('');
		
	});

	

});

</script>


@endsection