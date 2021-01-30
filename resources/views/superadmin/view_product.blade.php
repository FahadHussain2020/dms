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
			<i class="fas fa-table"></i>
			Products
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
        <h6>Product not Saved</h6>
      </div></div>
      @endif
				<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
					<div class="text-right">
						<a class="btn btn-info btn-lg" type="button" href="#" data-toggle="modal" data-target="#myModaladdproduct"><i class="fa fa-plus" aria-hidden="true"></i>Add Product
						</a></div>
						<br>
						<thead>
							<tr>
								<th scope="col">Product Id</th>
								<th scope="col">Product Name</th>
								<th scope="col">Purchase Price</th>
								<th scope="col">Retail Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Supplier </th>
								<th scope="col">Category </th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th scope="col">Product Id</th>
								<th scope="col">Product Name</th>
								<th scope="col">Purchase Price</th>
								<th scope="col">Retail Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Supplier </th>
								<th scope="col">Category </th>
								<th scope="col">Action</th>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								@if (count($products)>0)
								@foreach($products as $product)
								<td>{{$product->id}}</td>
								<td>{{$product->name}}</td>
								<td>{{$product->pur_price}}</td>
								<td>{{$product->ret_price}}</td>
								<td>{{$product->qty}}</td>
								@if (count($suppliers)>0)
								@foreach($suppliers as $supplier)
								@if($product->supplier == $supplier->id)
								<td>{{$supplier->sname}}</td>
								
								@if (count($categories)>0)
								@foreach($categories as $category)
								@if($product->category == $category->id)
								<td>{{$category->cname}}</td>
								
								<td>
									<button class="btn btn-success btn-sm" data-myid="{{$product->id}}" data-myname="{{$product->name}}"  data-mypur_price="{{$product->pur_price}}" data-myret_price="{{$product->ret_price}}" data-mycategory="{{$category->cname}}" data-myqty="{{$product->qty}}" data-mysupplier="{{$supplier->sname}}" data-toggle="modal" data-target="#myModalproductedit"><i class="fas fa-pencil-alt"></i></button>|
									<a href='{{url("/superadmin/deleteproduct/$product->id")}}' data-toggle="tooltip"  title="Delete"class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
								</td>
								@endif
								@endforeach
								@endif
								@endif
								@endforeach
								@endif
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
<!-- Modal content-->
<div class="modal fade" id="myModaladdproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h3 class="modal-title w-100"  id="exampleModalLabel">Create Product</h3>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="card mb-3">
						<div class="card-header">
							<i class="fas fa-table"></i>
						Create Product</div>
						<div class="card-body">
							<form method="POST" autocomplete="off" action='{{url("/superadmin/createproduct")}}'>
								{{csrf_field()}}
								<div class="form-group">
									<select name="category"class="form-control category" id="category" class="form-control input-lg-dynamic " data-dependent="state">
										<option value="" disabled selected>Select Category</option>
										@foreach ($categories as $category) 

										<option value="{{ $category->id }}">

											{{ $category->cname }}

										</option>   

										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select name="supplier" class="form-control supplier" id="supplier" class="form-control input-lg-dynamic " data-dependent="state">
										<option value="" disabled selected>Select Fahad</option>
										@foreach ($suppliers as $row)
										<option value="{{ $row->id }}">{{$row->sname}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="inputfirstname">Product Name</label>
									<input type="text" name="product-name"class="form-control" id="inputpname1" placeholder="Product Name">
								</div>
								<div class="form-group">
									<label for="inputfirstname">Purchase Price</label>
									<input type="text" name="purchase-price"class="form-control" id="inputpurchaserate1" placeholder="Purchase Rate">
								</div>
								<div class="form-group">
									<label for="inputfirstname">Retail Price</label>
									<input type="text" name="retail-price"class="form-control" id="inputretailrate1" placeholder="Retail Rate">
								</div>
								<div class="form-group">
									<label for="inputfirstname">Quantity</label>
									<input type="text" name="quantity"class="form-control" id="inputquantity1" placeholder="Quantity">
								</div>
								<div class="text-center">
									<button id="create1" name="create1" type="submit" class="btn btn-primary" >Create</button>
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								</div>
							</form>   
						</div>
					</div>
				</div>  
			</div>
		</div>
	</div>
</div>



<!-- edit Modal content-->
<div class="modal fade" id="myModalproductedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h3 class="modal-title w-100"  id="exampleModalLabel">Update Product</h3>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="card mb-3">
						<div class="card-header">
							<i class="fas fa-table"></i>
						Update Product</div>
						<div class="card-body">
							<form method="POST" autocomplete="off" action='{{url("/superadmin/updateproduct")}}'>
								{{csrf_field()}}

								<div class="form-group">
									<label for="inputfirstname">Product ID</label>
									<input type="text" name="product-id"class="form-control" id="inputpid" disabled>
								</div>
								<div class="form-group">
									<label for="inputfirstname">Product Name</label>
									<input type="text" name="product-name"class="form-control" id="inputpname"disabled>
								</div>
								<div class="form-group">
									<label for="inputfirstname">Product Category</label>
									<input type="text" name="product-category"class="form-control" id="inputpcategory" disabled>
								</div>
								<div class="form-group">
									<label for="inputfirstname">Product Supplier</label>
									<input type="text" name="product-supplier"class="form-control" id="inputpsupplier" disabled >
								</div>
								<div class="form-group">
									<label for="inputfirstname">Purchase Price</label>
									<input type="text" name="purchase-price"class="form-control" id="inputpurchaserate">
								</div>
								<div class="form-group">
									<label for="inputfirstname">Retail Price</label>
									<input type="text" name="retail-price"class="form-control" id="inputretailrate">
								</div>
								<div class="form-group">
									<label for="inputfirstname">Quantity</label>
									<input type="text" name="quantity"class="form-control" id="inputquantity">
								</div>
								<div class="text-center">
									<button id="create1" name="create1" type="submit" class="btn btn-primary" >Create</button>
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								</div>
							</form>   
						</div>
					</div>
				</div>  
			</div>
		</div>
	</div>
</div>




<script>
	$('.category').change(function () {

		form = $(this).closest('form');
		node = $(this);
		node_to_modify = '.supplier';
		var cname = $(this).val();
		var request = "cname=" + cname;

		if (cname !== '') {
			$.ajax({
				type: "GET",
				url: "{{ route('ajax.category.supplier') }}",
				data: request,
				dataType: "json",
				cache: true,
				success: function (response) {


					var html = "";
					$.each(response.data.supplier, function (i, obj) {
						html += '<option value="' + obj.id + '">' + obj.sname + '</option>';
					});
					$(node_to_modify).html(html);
					$(node_to_modify).prepend("<option value='' selected>Select Supplier</option>");

				},
				error: function () {
					alert('Something Went Wrong');
				}
			});
		} else {
			$(node_to_modify).html("<option value='' selected>Select Supplier</option>");
		}

	});

</script>

<script>
        //add modal

        bootstrapValidate('#inputpname1','alpha:Only characters are allowed')
        bootstrapValidate('#inputquantity1','integer:Only numbers are allowed')
        bootstrapValidate('#inputpurchaserate1','integer:Only numbers are allowed')
        bootstrapValidate('#inputretailrate1','integer:Only numbers are allowed')

        //edit modal

        bootstrapValidate('#inputquantity','integer:Only numbers are allowed')
        bootstrapValidate('#inputpurchaserate','integer:Only numbers are allowed')
        bootstrapValidate('#inputretailrate','integer:Only numbers are allowed')
        
        

    </script>


    @endsection