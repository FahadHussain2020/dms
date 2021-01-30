<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\Superadmin;
use Illuminate\Support\Facades\DB;
session_start();

class CreateadminsController extends Controller
{
    public function viewadmin()
    {
        $admins=Admin::all();
        return view('superadmin/view_admin',['admins'=>$admins]);
    } 

    public function addadmin(Request $request){
        $this->validate($request,[
            'first-name' => 'required|alpha',
            'last-name' => 'required|alpha',
            'gender' => 'required',
            'address' => 'required',
            'cnic' => 'min:13|max:13',
            'mobile' => 'min:11|max:11',
        ]);
        $admins= new Admin;
        $admins->fname = $request->input('first-name');
        $admins->lname = $request->input('last-name');
        $admins->paswd = "admin123";
        $admins->gender = $request->input('gender');
        $admins->address = $request->input('address');
        $admins->cnic = $request->input('cnic');
        $admins->mobile = $request->input('mobile');
        $admins->save();
        return redirect()->back()->with('success', ['successfully']); 

    }


    public function editadmin(Request $request){
        $this->validate($request,[
            'first-name' => 'required|alpha',
            'last-name' => 'required|alpha',
            'address' => 'required',
            'cnic' => 'required|min:13|max:13',
            'mobile' => 'required|min:11|max:11',
        ]);
            if (isset($_POST['reset1']))
            {
                $var1=$_POST['first-name'];
                $var2=$_POST['last-name'];
                $var3=$_POST['address'];
                $var4=$_POST['cnic'];
                $var5=$_POST['mobile'];
                $var6=$_POST['reset1'];
                DB::table('admins')
                ->where('id',$var6)
                ->limit(1)
                ->update(array(
                'fname' => $var1,
                'lname' => $var2,
                'address' => $var3,
                'cnic' => $var4,
                'mobile' => $var5,
                ));
                return redirect()->back()->with('info','Updated Successfull!y'); 
            }
            else
            if (isset($_POST['reset2']))
            {
                $var6=$_POST['reset2'];
                DB::table('admins')
                ->where('id',$var6)
                ->limit(1)
                ->update(array(
                'paswd' => 'admin123'));
                return redirect()->back()->with('info','Password Reset Successfull!y'); 
            }
        
    }

    public function deleteadmin($id){
        Admin::where('id',$id)
         ->delete();
        return redirect('/superadmin/viewadmin')->with('info','Admin Deleted Successfull!y');

    }
    
    public function profilepassword(){
       
        $var=$_SESSION['myValue'];
        $admins=Admin::all();
        $var1=$_POST['password'];
        $var2=$_POST['confirm_password'];
        $var3=$_POST['password1'];
            foreach($admins as $admin)
           {
               if($admin->id==$var && $admin->paswd==$var3)
               {
                   DB::table('admins')->where('id',$var)->limit(1)->update(array(
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
    public function updatesettingadmin(Request $request){
        $this->validate($request,[
            'first-name' => 'required|alpha',
            'last-name' => 'required|alpha',
            'address' => 'required',
            'cnic' => 'min:13|max:13',
            'mobile' => 'min:11|max:11',
        ]);
        $var=$_SESSION['myValue'];
                $var1=$_POST['first-name'];
                $var2=$_POST['last-name'];
                $var3=$_POST['address'];
                $var4=$_POST['cnic'];
                $var5=$_POST['mobile'];
                DB::table('admins')
                ->where('id',$var)
                ->limit(1)
                ->update(array(
                'fname' => $var1,
                'lname' => $var2,
                'address' => $var3,
                'cnic' => $var4,
                'mobile' => $var5,
                ));
       return redirect('admin')->withErrors(['Admin Update Successfully']);

    }

}
