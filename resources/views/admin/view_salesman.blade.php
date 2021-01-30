@extends('admin.layouts.masterlayouts')

@section('content')
<div id="content-wrapper">
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
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
    Salesman</div>
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
        <h6>Salesman not Saved</h6>
      </div></div>
      @endif
        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
          <div class="text-right">
            <a class="btn btn-info btn-lg" type="button" href="#" data-toggle="modal" data-target="#myModaladdsaleman"><i class="fa fa-plus" aria-hidden="true"></i>Add Salesman
            </a></div>
            <br>
            <thead>
              <tr>
                <th scope="col">User Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">CNIC/B-form</th>
                <th scope="col">Gender</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th scope="col">User Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">CNIC/B-form</th>
                <th scope="col">Gender</th>
                <th scope="col">Mobile</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </tfoot>
            <tbody>
              @if (count($salesman)>0)
              @foreach($salesman->all() as $sale)  
              <tr>
               <td>{{$sale->id}}</td>
               <td>{{$sale->fname}}</td>
               <td>{{$sale->lname}}</td>
               <td>{{$sale->cnic}}</td>
               <td>{{$sale->gender}}</td>
               <td>{{$sale->mobile}}</td>
               <td style="width: 400px;">{{$sale->address}}</td> 
               <td>   
                <button class="btn btn-success btn-sm" data-myid="{{$sale->id}}" data-myfname="{{$sale->fname}}" data-mylname="{{$sale->lname}}" data-mycnic="{{$sale->cnic}}" data-mygender="{{$sale->gender}}" data-mymobile="{{$sale->mobile}}" data-myaddress="{{$sale->address}}" data-toggle="modal" data-target="#myModalsalesmanedit"><i class="fas fa-pencil-alt"></i></button> |
                <a href='{{url("/admin/deletesalesman/$sale->id")}}'data-toggle="tooltip"  title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> </a>
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
</div>

<!-- ADD Modal content-->






<div class="modal fade" id="myModaladdsaleman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Create Salesman</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>


      <div class="modal-body">
        <div class="container-fluid">
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Create Salesman</div>
          <div class="card-body">

            <form method="POST"  autocomplete="off" action="{{url('/insertsalesman')}}">
              {{csrf_field()}}

              <div class="form-group">
                <label for="inputfirstname">First Name</label>
                <input type="text" name="first-name"class="form-control" id="inputfname3" placeholder="First Name" required>
                <span id="fname" class="text-danger  font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label for="inputlastname">Last Name</label>
                <input type="text" name="last-name"class="form-control" id="inputlname3" placeholder="Last Name" required>
                <span id="lname" class="text-danger  font-weight-bold"></span>
              </div>   

              <div class="form-group">
                <label for="input gender">Gender</label>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input"name="gender"type="radio" name="gridRadios" id="male" value="male" checked>
                    <label class="form-check-label" for="male">
                      Male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="gender" type="radio" name="gridRadios" id="female" value="female">
                    <label class="form-check-label" for="female">
                      Female
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="inputAddress">Address</label>
                <textarea name="address" class="form-control" id="inputaddress3" placeholder="1234 Main St" required></textarea>
                <span id="address" class="text-danger  font-weight-bold"></span>
              </div>


              <div class="form-group">
                <label for="inputcnic">CNIC</label>
                <input type="number" name="cnic"class="form-control" id="inputcnic3" placeholder="3xxxxxxxxxxxx"required>
                <span id="cnic" class="text-danger  font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label for="inputmobile">Mobile</label>
                <input type="number" name="mobile"class="form-control" id="inputmobile3" value="" placeholder="03xxxxxxxxx"required>
                <span id="mobile" class="text-danger  font-weight-bold"></span>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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






<div class="modal fade" id="myModalsalesmanedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Edit Salesman</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>


      <div class="modal-body">
        <div class="container-fluid">
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Edit Salesman</div>
          <div class="card-body">

            <form method="POST" autocomplete="off" action="{{url('/admin/editsalesman')}}">
              {{csrf_field()}}
              <div class="form-group">
                <label for="inputid">Salesman ID</label>
                <input type="text" name="admin-id"class="form-control" id="inputid4" disabled>
                <span id="fname" class="text-danger  font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label for="inputfirstname">First Name</label>
                <input type="text" name="first-name"class="form-control" id="inputfname4"required>
                <span id="fname" class="text-danger  font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label for="inputlastname">Last Name</label>
                <input type="text" name="last-name"class="form-control" id="inputlname4" required>
                <span id="lname" class="text-danger  font-weight-bold"></span>
              </div>   

              <div class="form-group">
                <label for="inputAddress">Address</label>
                <textarea type="text"name="address" class="form-control" id="inputAddress4" required></textarea>
                <span id="address" class="text-danger  font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label for="inputCity">CNIC</label>
                <input type="number" name="cnic"class="form-control" id="inputcnic4" required>
                <span id="cnic" class="text-danger  font-weight-bold"></span>
              </div>
              <div class="form-group">
                <label for="inputmobile">Mobile</label>
                <input type="number" name="mobile"class="form-control" id="inputmobile4"required>
                <span id="mobile" class="text-danger  font-weight-bold"></span>
              </div>
              <div class="text-center">
                <button id="reset1" name="reset1" type="submit" class="btn btn-primary" value ="1">Update</button>
                <button id="reset2" name="reset2" type="submit" class="btn btn-danger" value="2">Reset Password</button>
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
        bootstrapValidate('#inputfname3','alpha:Only characters are allowed')
        bootstrapValidate('#inputlname3','alpha:Only characters are allowed')
        bootstrapValidate('#inputcnic3','min:13:enter at least 13 characters')
        bootstrapValidate('#inputcnic3','integer:Only numbers are allowed')
        bootstrapValidate('#inputmobile3','min:11:enter at least 11 characters')
        bootstrapValidate('#inputmobile3','integer:Only numbers are allowed')
        bootstrapValidate('#inputcnic3','max:13:Only 13 characters are allowed')
        bootstrapValidate('#inputmobile3','max:11:Only 11 characters are allowed')
        //edit modal
        bootstrapValidate('#inputfname4','alpha:Only characters are allowed')
        bootstrapValidate('#inputlname4','alpha:Only characters are allowed')
        bootstrapValidate('#inputcnic4','min:13:enter at least 13 characters')
        bootstrapValidate('#inputcnic4','integer:Only numbers are allowed')
        bootstrapValidate('#inputmobile4','min:11:enter at least 11 characters')
        bootstrapValidate('#inputmobile4','integer:Only numbers are allowed')
        bootstrapValidate('#inputcnic4','max:13:Only 13 characters are allowed')
        bootstrapValidate('#inputmobile4','max:11:Only 11 characters are allowed')
        


      </script>
      @endsection