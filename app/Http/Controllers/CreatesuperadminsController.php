<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\Superadmin;
use Illuminate\Support\Facades\DB;
session_start();
class CreatesuperadminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function update()
    {
        
       //$var1=$_POST['sadmin-id'];
        DB::table('superadmins')
       // ->where('id', $var1)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array(
            'fname' => $_POST['first-name'],
            'lname' => $_POST['last-name'],
            'address' => $_POST['address'],
            'cnic' => $_POST['cnic'],
            'paswd' => $_POST['password'],
            'mobile' => $_POST['mobile'])); 
           //  $_SESSION['myValue']=$var1;
            $superadmins = Superadmin::all();
            $admins = Admin::all();
            return view('superadmin')->with('superadmins',$superadmins)->with('admins',$admins);
    
    }
    public function updatepassword()
    {
        
       //$var1=$_POST['sadmin-id'];
        DB::table('superadmins')
       // ->where('id', $var1)  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array(
            'paswd' => $_POST['password2']));
           //  $_SESSION['myValue']=$var1;
            $superadmins = Superadmin::all();
            $admins = Admin::all();
            return view('superadmin')->with('superadmins',$superadmins)->with('admins',$admins);
    
    }
     public function profilepassword(){
       
        $var=$_SESSION['myValue'];
        $superadmins=Superadmin::all();
        $var1=$_POST['password'];
        $var2=$_POST['confirm_password'];
        $var3=$_POST['password1'];
            foreach($superadmins as $superadmin)
           {
               if($superadmin->id==$var && $superadmin->paswd==$var3)
               {
                   DB::table('superadmins')->where('id',$var)->limit(1)->update(array(
                   'paswd' => $var2));
                   if(session_destroy())
                   {
                   return redirect('/')->withErrors(['Password Reset Successfully']);
                   }
               }
                else
                    if($admin->id==$var && $admin->paswd!=$var3)
                {
                    if(session_destroy())
                   {
                   return redirect('/')->withErrors(['Old Password is incorrect ']);
                   }
                }
          }
        

    }
    
}




