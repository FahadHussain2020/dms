

<!DOCTYPE html>
<html>
<head>
  <title>Superadmin-admin</title>
  @include('/superadmin/partials/header')
</head>
<body>

@include('/superadmin/partials/nav')

@include('/superadmin/partials/sidebar')
   
@yield('content')

@include('/superadmin/partials/footer')
 <script src="{{asset('js/apps.js')}}"></script>
  <script>
$('#myModalcedit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var cname = button.data('mycname') 
    var cstatus = button.data('mycstatus') 
  
    var modal = $(this)
    modal.find('.modal-body #inputcid').val(id);
    modal.find('.modal-body #inputedit').val(id);
    modal.find('.modal-body #inputcname').val(cname);
    modal.find('.modal-body #inputcstatus').val(cstatus);
})
      
$('#myModaladminedit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var fname = button.data('myfname')
    var lname = button.data('mylname')
    var cnic = button.data('mycnic')
    var gender = button.data('mygender')
    var mobile = button.data('mymobile')
    var address = button.data('myaddress') 
  
    var modal = $(this)
    modal.find('.modal-body #inputid2').val(id);
    modal.find('.modal-body #reset1').val(id);
    modal.find('.modal-body #reset2').val(id);
    modal.find('.modal-body #inputfname2').val(fname);
    modal.find('.modal-body #inputlname2').val(lname);
    modal.find('.modal-body #inputcnic2').val(cnic);
    modal.find('.modal-body #inputgender2').val(gender);
    modal.find('.modal-body #inputmobile2').val(mobile);
    modal.find('.modal-body #inputAddress2').val(address);
})

$('#myModalsalesmanedit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var fname = button.data('myfname')
    var lname = button.data('mylname')
    var cnic = button.data('mycnic')
    var gender = button.data('mygender')
    var mobile = button.data('mymobile')
    var address = button.data('myaddress') 
  
    var modal = $(this)
    modal.find('.modal-body #inputid4').val(id);
    modal.find('.modal-body #reset1').val(id);
    modal.find('.modal-body #reset2').val(id);
    modal.find('.modal-body #inputfname4').val(fname);
    modal.find('.modal-body #inputlname4').val(lname);
    modal.find('.modal-body #inputcnic4').val(cnic);
    modal.find('.modal-body #inputgender4').val(gender);
    modal.find('.modal-body #inputmobile4').val(mobile);
    modal.find('.modal-body #inputAddress4').val(address);
})
      
    $('#myModalsupplieredit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var fname = button.data('myname')
    var mobile = button.data('mymobile')
    var address = button.data('myaddress')
    var category = button.data('mycategory') 
  
    var modal = $(this)
    modal.find('.modal-body #inputdsid').val(id);
    modal.find('.modal-body #reset1').val(id);

    modal.find('.modal-body #inputsname').val(fname);
    modal.find('.modal-body #inputccontact').val(mobile);
    modal.find('.modal-body #inputsaddress').val(address);
    modal.find('.modal-body #inputscategory').val(category);
})
      
    $('#myModalproductedit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var fname = button.data('myname')
    var pur_price = button.data('mypur_price')
    var ret_price = button.data('myret_price')
    var qty = button.data('myqty')
    var supplier = button.data('mysupplier')
    var category = button.data('mycategory') 
  
    var modal = $(this)
    modal.find('.modal-body #inputpid').val(id);
    modal.find('.modal-body #create1').val(id);
    modal.find('.modal-body #inputpname').val(fname);
    modal.find('.modal-body #inputpcategory').val(category);
    modal.find('.modal-body #inputpsupplier').val(supplier);
    modal.find('.modal-body #inputpurchaserate').val(pur_price);
    modal.find('.modal-body #inputretailrate').val(ret_price);
    modal.find('.modal-body #inputquantity').val(qty);
})
      
    $('#myModalretaileredit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('myid') 
    var fname = button.data('myfname')
    var mobile = button.data('mymobile')
    var address = button.data('myarea') 
    var bal_due = button.data('mybal_due') 
  
    var modal = $(this)
    modal.find('.modal-body #inputid').val(id);

    modal.find('.modal-body #inputname').val(fname);
    modal.find('.modal-body #inputretcontact').val(mobile);
    modal.find('.modal-body #inputretarea').val(address);
    modal.find('.modal-body #inputbaldue').val(bal_due);
    modal.find('.modal-body #create1').val(id);
})

        </script>
</body>
</html>
	

