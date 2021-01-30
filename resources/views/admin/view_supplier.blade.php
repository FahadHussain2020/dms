@extends('admin.layouts.masterlayouts')

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
    Suppliers
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
        <h6>Supplier not Saved</h6>
      </div></div>
      @endif
    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
      <div class="text-right">
       <a class="btn btn-info btn-lg" type="button" href="#" data-toggle="modal" data-target="#myModaladdsupplier"><i class="fa fa-plus" aria-hidden="true"></i>Add Supplier
       </a></div>
       <br>
       <thead>
        <tr>
          <th scope="col">Supplier Id</th>
          <th scope="col">Supplier Name</th>
          <th scope="col">Supplier Address</th>
          <th scope="col">Supplier Contact</th>
          <th scope="col">Supplier Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th scope="col">Supplier Id</th>
          <th scope="col">Supplier Name</th>
          <th scope="col">Supplier Address</th>
          <th scope="col">Supplier Contact</th>
          <th scope="col">Supplier Category</th>
          <th scope="col">Action</th>
        </tr>
      </tfoot>
      <tbody>
        <tr>
          @if (count($suppliers)>0)
          @foreach($suppliers as $supplier)
          <td>{{$supplier->id}}</td>
          <td>{{$supplier->sname}}</td>
          <td style="width: 380px;">{{$supplier->saddress}}</td>
          <td>{{$supplier->scontact}}</td>
          @if (count($categories)>0)
          @foreach($categories as $category)
          @if($supplier->scategory == $category->id)
          <td>{{$category->cname}}</td>
          
          <td>
           <button class="btn btn-success btn-sm" data-myid="{{$supplier->id}}" data-myname="{{$supplier->sname}}"  data-mymobile="{{$supplier->scontact}}" data-myaddress="{{$supplier->saddress}}" data-mycategory="{{$category->cname}}"data-toggle="modal" data-target="#myModalsupplieredit"><i class="fas fa-pencil-alt"></i></button>|
           <a href='{{url("/admin/deletesupplier/$supplier->id")}}' data-toggle="tooltip"  title="Delete"class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
         </td>
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
<!-- ADD Modal content-->






<div class="modal fade" id="myModaladdsupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Create Supplier</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>


      <div class="modal-body">
        <div class="container-fluid">
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Create Supplier</div>
          <div class="card-body">

            <form method="POST" autocomplete="off" action='{{url("/admin/createsupplier")}}'>
              {{csrf_field()}}
              <div class="form-group">
               <select name="category" id="category" class="form-control input-lg-dynamic " data-dependent="state">
                <option value="" disabled selected>Select Category</option>
                @foreach ($classname_array as $data) 
                @if($data->cstatus == "active")    
                <option value="{{ $data->id }}">

                  {{ $data->cname }}

                </option>   
                @endif                                           
                @endforeach
              </select>

            </div>
            <div class="form-group">
             <label for="inputfirstname">Supplier Name</label>
             <input type="text" name="supplier-name"class="form-control" id="inputsname1" placeholder="Supplier Name"required>
           </div>
           <div class="form-group">
             <label for="inputfirstname">Supplier Address</label>
             <textarea  name="supplier-address" class="form-control" id="inputsaddress" placeholder="1234 Main St"required> </textarea>
           </div>
           <div class="form-group">
             <label for="inputfirstname">Supplier Contact</label>
             <input type="number"   name="supplier-contact" class="form-control" id="inputccontact1" placeholder="Supplier Contact"required>
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



<!-- Edit Modal content-->






<div class="modal fade" id="myModalsupplieredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Edit Supplier</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Edit Admin</div>
          <div class="card-body">

            <form method="POST" autocomplete="off" action="{{url('/admin/editsupplier')}}">
              {{csrf_field()}}
              <div class="form-group">
                <label for="inputsid">Supplier ID</label>
                <input type="text" name="supplier-id"class="form-control" id="inputdsid" disabled>
              </div>
              <div class="form-group">
                <label for="inputscategory">Supplier category</label>
                <input type="text" name="supplier-category"class="form-control" id="inputscategory" disabled>
              </div>
              <div class="form-group">
                <label for="inputfirstname">Supplier Name</label>
                <input type="text" name="supplier-name"class="form-control" id="inputsname"required>
              </div>
              <div class="form-group">
                <label for="inputfirstname">Supplier Address</label>
                <textarea  name="supplier-address" class="form-control" id="inputsaddress"required> </textarea>
              </div>
              <div class="form-group">
                <label for="inputfirstname">Supplier Contact</label>
                <input type="number" name="supplier-contact"class="form-control" id="inputccontact" required>
              </div>
              <div class="text-center">
                <button id="reset1" name="reset1" type="submit" class="btn btn-primary" value ="1">Update</button>
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
        //add modal

        bootstrapValidate('#inputccontact1','min:11:enter at least 11 characters')
        bootstrapValidate('#inputccontact1','max:11:Only 11 characters are allowed')
        bootstrapValidate('#inputccontact1','integer:Only numbers are allowed')

        //edit modal
   bootstrapValidate('#inputccontact','max:11:Only 11 characters are allowed')
     bootstrapValidate('#inputccontact','min:11:enter at least 11 characters')
        bootstrapValidate('#inputccontact','integer:Only numbers are allowed')
      </script>
      @endsection