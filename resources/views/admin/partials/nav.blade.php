   
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

  <a class="navbar-brand mr-1" href="{{URL('admin')}}">DMS-Owner-Portal</a>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>
     <?php
       // session_start();
        $var=$_SESSION['myValue'];
      use App\Admin;
      $admins = Admin::all();
      if (count($admins)>0)
      {
        foreach($admins as $admin)  
        {
            if($admin->id==$var)
            {
          ?>


  <!-- Navbar -->
  <ul class="navbar-nav class=d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
   

    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <i class="fas fa-address-card"> {{$admin->fname}} {{$admin->lname}} (Admin) </i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#settingsModal">Profile Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepassword">Change Password</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logoutModal">Logout</a>
      </div>
    </li>
  </ul>
    <?php
    }
    }
    }
    ?>
</nav>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        
                <a href='{{url("logout")}}' class="btn btn-primary">Logout </a>
        
      </div>
    </div>
  </div>
</div>
<!-- Change Password-->
<!DOCTYPE html>
<html>
<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="examplechangepassword" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examplechangepassword">Change Password</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
   

          <div class="modal-body">
            <div class="container-fluid">
              <div class="card mb-3">
               <div class="card-header">
                <i class="fas fa-table"></i>
                Change Password
              </div>
              <div class="card-body">
             <form method="POST" autocomplete="off" action="{{url('/admin/profilepassword')}}">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="inputpassword">Enter Old Password</label>
                  <input type="password" class="form-control" id="password1" name="password1" size="10" required>
                </div>
                <div class="form-group">
                  <label for="inputpassword">Enter New Password</label>
                  <input type="password" placeholder="Password" id="password" name="password" class="form-control" size="10"  required>
                </div>
                <div class="form-group">
                  <label for="inputpassword">Confirm Password</label>
                  <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" class="form-control"  size="10" required>
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

<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
    

</html> 






<!-- Settings Modal-->
<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h3 class="modal-title w-100" id="exampleModalLabel">Profile-Settings</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
        <?php
       // session_start();
        $var=$_SESSION['myValue'];
      $admins = Admin::all();
      if (count($admins)>0)
      {
        foreach($admins as $admin)  
        {
            if($admin->id==$var)
            {
          ?>

          <div class="modal-body">
            <div class="container-fluid">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-table"></i>
                Update-Super Admin</div>
                <div class="card-body">
                 <form method="POST" action="{{url('/admin/updateadminsetting')}}" autocomplete="off" >
                  {{csrf_field()}}
               
                  <div class="form-group">
                   <label for="inputid">User ID</label>
                   <input type="text" name="sadmin-id"class="form-control" id="sadmin-id" value="{{$admin->id}}"
                   size="10" disabled>
                 </div> 

                 <div class="form-group">
                   <label for="inputfirstname">First Name</label>
                   <input type="text" name="first-name" class="form-control" id="inputfname" value="{{$admin->fname}}"size="10">
                 </div>

                 <div class="form-group">
                   <label for="inputlastname">Last Name</label>
                   <input type="text" name="last-name"class="form-control" id="input" value="{{$admin->lname}}">
                 </div>  
                 <div class="form-group">
                   <label for="inputpassword">Password</label>
                   <input type="password" name="password" class="form-control" id="inputpassword" value="{{$admin->paswd}}" class="pa" size="10" >
                 </div>
                 <div class="form-group">
                   <label for="inputCity">CNIC</label>
                   <input type="text" name="cnic"class="form-control" id="inputcnic" value="{{$admin->cnic}}">
                 </div>  
                <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text"  name="address" class="form-control" id="inputaddress1" value="{{$admin->address}}"> 
                <span id="address" class="text-danger  font-weight-bold"></span>
              </div>
                       <div class="form-group">
                <label for="inputmobile">Mobile</label>
                <input type="text" name="mobile"class="form-control" id="inputmobile1" value="{{$admin->mobile}}">
                <span id="mobile" class="text-danger  font-weight-bold"></span>
              </div>
                 <div class="text-center">
                  <input type="submit" class="btn btn-primary" name="saupdate" value="Update" >
                  
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>  

      </div>
      <?php
    }
  }
        }

  ?>
</div>
</div>
</div>