<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\Superadmin;
use App\Salesman;
use App\Order;
use Illuminate\Support\Facades\DB;
session_start();
class welcomeController extends Controller
{
    
    public function welcome()
    {
    	return view('welcome');
    }

   public function login(Request $request){
    
       $this->validate($request,[
    		'ID' => 'required',
    		'Password' => 'required',
    		'Role' => 'required',
    	]);
        $superadmins = Superadmin::all();
        $admins = Admin::all();
        $var1=$_POST['ID'];
        $var2=$_POST['Password'];
        $var3=$_POST['Role'];
        if($var3=='1')
        {
         
           foreach($superadmins as $superadmin)
           {
               if($superadmin->id==$var1 && $superadmin->paswd==$var2)
               {
          
                   $_SESSION['myValue']=$var1;
                   $_SESSION['myRole']=$var3;
                   $data=Salesman::all();
                   $data1=Order::all();
                   return view('superadmin')->with('data',$data)->with('data1',$data1);
               }
            }
               
               {
                    return redirect()->back()->withErrors(['Invalid ID and Password']);
               }
           
        }
        else
        if($var3=='2')
        {   
           foreach($admins as $admin)
           {
               if($admin->id==$var1 && $admin->paswd==$var2)
               {
                   $data=Salesman::all();
                   $data1=Order::all();
                   $_SESSION['myValue']=$var1;
                   $_SESSION['myRole']=$var3;
                   $_SESSION['myPassword']=$var2;
                   return view('admin')->with('data',$data)->with('data',$data)->with('data1',$data1);
               }
            }
               
               {
                   return redirect()->back()->withErrors(['Invalid ID and Password']);
               }
           
        }
    }


     public function superadmin()
    {
        $data=Salesman::all();
        $data1=Order::all();
        return view('superadmin')->with('data',$data)->with('data',$data)->with('data1',$data1);
    }    
     public function admin()
    {
        $data=Salesman::all();
        $data1=Order::all();
        return view('admin')->with('data',$data)->with('data',$data)->with('data1',$data1);
    }    
    public function logout()
    {
    	if(session_destroy())
        {
            return view('welcome');
        }
           
    }
    
}
