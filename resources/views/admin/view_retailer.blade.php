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
    Retaillers
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
        <h6>Retailer not Saved</h6>
      </div></div>
      @endif
      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <div class="text-right">
         <a class="btn btn-info btn-lg" type="button" href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i>Add Retailler
         </a></div>
         <br>
         <thead>
          <tr>
            <th scope="col">Retailler Id</th>
            <th scope="col">Retailler Name</th>
            <th scope="col">Retailler Area</th>
            <th scope="col">Retailler Contact</th>
            <th scope="col">Balance Due</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th scope="col">Retailler Id</th>
            <th scope="col">Retailler Name</th>
            <th scope="col">Retailler Area</th>
            <th scope="col">Retailler Contact</th>
            <th scope="col">Balance Due</th>
            <th scope="col">Action</th>
          </tr>
        </tfoot>
        <tbody>
          @if (count($retailers)>0)
          @foreach($retailers as $retailer)
          <tr>
           <td>{{$retailer->id}}</td>
           <td>{{$retailer->name}}</td>
           <td>{{$retailer->area}}</td>
           <td>{{$retailer->contact}}</td>
           <td>{{$retailer->bal_due}}</td>
           <td>
            
             <button class="btn btn-success btn-sm" data-myid="{{$retailer->id}}" data-myfname="{{$retailer->name}}" data-myarea="{{$retailer->area}}"  data-mymobile="{{$retailer->contact}}" data-mybal_due="{{$retailer->bal_due}}" data-toggle="modal" data-target="#myModalretaileredit"><i class="fas fa-pencil-alt"></i></button>|
             <a href='{{url("/admin/deleteretailer/$retailer->id")}}' data-toggle="tooltip"  title="Delete"class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
           </td>
           @endforeach
           @endif
         </tr> 
       </tbody>
     </table>
   </div>
 </div>
</div>
</div>
</body>
</html>
<!-- Modal content-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Create Retailler</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Create Retailer</div>
            <div class="card-body">
              <form method="POST" autocomplete="off" action='{{url("/admin/createretailer")}}'>
                {{csrf_field()}}
                <div class="form-group">
                 <label for="inputfirstname">Retailler Name</label>
                 <input type="text" name="retailler-name"class="form-control" id="inputname1" placeholder="Retailler Name" required>
                 <span id="retname" class="text-danger  font-weight-bold"></span>
               </div>
               <div class="form-group">
                 <label for="inputfirstname">Retailler Area</label>
                 <input type="text" name="retailler-area"class="form-control" id="inputretarea" placeholder="Retailler Area" required>
                 <span id="retarea" class="text-danger  font-weight-bold"></span>
               </div>
               <div class="form-group">
                 <label for="inputfirstname">Retailler Contact</label>
                 <input type="number" name="retailler-contact"class="form-control" id="inputretcontact1" placeholder="Retailler Area" required>
                 <span id="retarea" class="text-danger  font-weight-bold"></span>
               </div>
               <div class="form-group">
                 <label for="inputfirstname">Balance Duw</label>
                 <input type="text"  name="balance-due"class="form-control" id="inputbaldue1" placeholder="Balance Due" required>
                 <span id="retarea" class="text-danger  font-weight-bold"></span>
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



<!-- edit modal content-->
<div class="modal fade" id="myModalretaileredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Update Retailler</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Update Retailer</div>
            <div class="card-body">
              <form method="POST" autocomplete="off" action='{{url("/admin/updateretailer")}}'>
                {{csrf_field()}}
                <div class="form-group">
                 <label for="inputfirstname">Retailler ID</label>
                 <input type="text" name="retailler-id"class="form-control" id="inputid" disabled>
                 <span id="retname" class="text-danger  font-weight-bold"></span>
               </div>
               <div class="form-group">
                 <label for="inputfirstname">Retailler Name</label>
                 <input type="text" name="retailler-name"class="form-control" id="inputname" required>
                 <span id="retname" class="text-danger  font-weight-bold"></span>
               </div>
               <div class="form-group">
                 <label for="inputfirstname">Retailler Area</label>
                 <input type="text" name="retailler-area"class="form-control" id="inputretarea" required>
                 <span id="retarea" class="text-danger  font-weight-bold"></span>
               </div>
               <div class="form-group">
                 <label for="inputfirstname">Retailler Contact</label>
                 <input type="number" name="retailler-contact"class="form-control" id="inputretcontact" required>
                 <span id="retarea" class="text-danger  font-weight-bold"></span>
               </div>
               <div class="form-group">
                 <label for="inputfirstname">Balance Dew</label>
                 <input type="text"  name="balance-due"class="form-control" id="inputbaldue" required>
                 <span id="retarea" class="text-danger  font-weight-bold"></span>
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
        //add modal
        
        bootstrapValidate('#inputbaldue1','integer:Only numbers are allowed')
        bootstrapValidate('#inputretcontact1','integer:Only numbers are allowed')
        bootstrapValidate('#inputretcontact1','max:11:Only 11 number are allowed')
        bootstrapValidate('#inputretcontact1','min:11:Only 11 number are allowed')

        //edit modal
        bootstrapValidate('#inputbaldue','integer:Only numbers are allowed')
        bootstrapValidate('#inputretcontact','integer:Only numbers are allowed')
        bootstrapValidate('#inputretcontact','max:11:Only 11 characters are allowed')
        bootstrapValidate('#inputretcontact','min:11:Only 11 number are allowed')
        

      </script>

      @endsection