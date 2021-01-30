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
    Categories
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
        <h6>Category not Saved</h6>
      </div></div>
      @endif
      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <div class="text-right">
         <a class="btn btn-info btn-lg" type="button" href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>Add Category
         </a></div>
         <br>
         <thead>
          <tr>
            <th scope="col">Category Id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col">Category Id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </tfoot>
        <tbody>
          @if (count($categories)>0)
          @foreach($categories as $category)
          <tr>
           <td>{{$category->id}}</td>
           <td>{{$category->cname}}</td>
           <td style="color:#C70039;">{{$category->cstatus}}</td>
           <td>
             <button class="btn btn-success btn-sm" data-myid="{{$category->id}}" data-mycname="{{$category->cname}}" data-mycstatus="{{$category->cstatus}}" data-toggle="modal" data-target="#myModalcedit"><i class="fas fa-pencil-alt"></i></button>|
             <a href='{{url("/superadmin/deletecategory/$category->id")}}' data-toggle="tooltip"  title="Delete"class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
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
<!-- ADD Modal content-->






<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Create Category</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>


      <div class="modal-body">
        <div class="container-fluid">
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Create Category</div>
          <div class="card-body">

            <form method="POST" autocomplete="off" action={{url('/superadmin/createcategory')}}>
              {{csrf_field()}}
              
              <div class="form-group">
                <label for="inputfirstname">Category Name</label>
                <input type="text" name="category-name"class="form-control" id="inputcname1" placeholder="Category Name"required>
              </div>
              <div class="form-group">
                <label for="inputfirstname">Category Status</label>
                <select name="option_value">
                  <option value="active" name="active">Active</option>
                  <option value="deactive" name="deactive">Deactive</option>
                </select>
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






<div class="modal fade" id="myModalcedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Edit Category</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Edit Category</div>
          <div class="card-body">

            <form method="POST" autocomplete="off" action={{url('/superadmin/editcategory')}}>
              {{csrf_field()}}
              <div class="form-group">
                <label for="inputID">Category ID</label>
                <input type="text" name="category-id"class="form-control" id="inputcid" disabled>
              </div>
              <div class="form-group">
                <label for="inputfirstname">Category Name</label>
                <input type="text" name="category-name"class="form-control" id="inputcname"required>
              </div>
              <div class="form-group">
                <label for="inputfirstname">Category Status</label>
                <input type="text" name="category-status"class="form-control" id="inputcstatus" disabled>
              </div>
              <div class="form-group">
                <select name="option_value">
                  <option value="active" name="active">Active</option>
                  <option value="deactive" name="deactive">Deactive</option>
                </select>
              </div>
              <div class="text-center">
                <button  name="edit-category" type="submit" id="inputedit" class="btn btn-primary" >Update</button>
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
        bootstrapValidate('#inputcname1','alpha:Only characters are allowed')
        //edit modal
        bootstrapValidate('#inputcname','alpha:Only characters are allowed')
        
        
        

      </script>
      @endsection