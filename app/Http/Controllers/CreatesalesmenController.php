<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Salesman;
use App\Admin;
use App\Order;
use App\Superadmin;
use Illuminate\Support\Facades\DB;
session_start();
class CreatesalesmenController extends Controller
{
      public function viewsalesman()
    {
    	$salesman=Salesman::all();
              $var3=$_SESSION['myRole'];
        if($var3=='1')
        {
            return view('superadmin/view_salesman',['salesman'=>$salesman]);
        }
        else
 
        if($var3=='2')
        {
            return view('admin/view_salesman',['salesman'=>$salesman]);
        }
    	
    } 
        public function viewsalesmangraph()
    {
        $data=DB::table('salesmen')->get(['fname','profit']);
        $var3=$_SESSION['myRole'];
        if($var3=='1')
        {
            return view('superadmin/graph')->with('data',$data);
        }
        else
 
        if($var3=='2')
        {
            return view('admin/graph')->with('data',$data);
        }
    	
    } 


 

     public function addsalesman(Request $request){
    	$this->validate($request,[
    		'first-name' => 'required|alpha',
    		'last-name' => 'required|alpha',
    		'gender' => 'required',
    		'address' => 'required',
    		'cnic' => 'required|min:13|max:13',
    		'mobile' => 'required|min:11|max:11',
    	]);
    	$salesman= new Salesman;
    	$salesman->fname = $request->input('first-name');
    	$salesman->lname = $request->input('last-name');
        $salesman->paswd = "sale123";
    	$salesman->gender = $request->input('gender');
    	$salesman->address = $request->input('address');
    	$salesman->cnic = $request->input('cnic');
    	$salesman->mobile = $request->input('mobile');
    	$salesman->save();
    	return redirect()->back()->with('info','Salesman Registered Successfull!y'); 

    }


     public function editsalesman(Request $request){
    	 if (isset($_POST['reset1']))
            {
             $this->validate($request,[
    		'first-name' => 'required|alpha',
    		'last-name' => 'required|alpha',
    		'address' => 'required',
    		'cnic' => 'required|min:13|max:13',
    		'mobile' => 'required|min:11|max:11',
    	]);
         }
     if (isset($_POST['reset1']))
            {
                $var1=$_POST['first-name'];
                $var2=$_POST['last-name'];
                $var3=$_POST['address'];
                $var4=$_POST['cnic'];
                $var5=$_POST['mobile'];
                $var6=$_POST['reset1'];
                DB::table('salesmen')
                ->where('id',$var6)
                ->limit(1)
                ->update(array(
                'fname' => $var1,
                'lname' => $var2,
                'address' => $var3,
                'cnic' => $var4,
                'mobile' => $var5,));
                return redirect()->back()->with('info','Updated Successfull!y'); 
            }
        else
        if (isset($_POST['reset2']))
        {
                $var6=$_POST['reset2'];
                DB::table('salesmen')
                ->where('id',$var6)
                ->limit(1)
                ->update(array(
                'paswd' => 'salesman123'));
                return redirect()->back()->with('info','Password Reset Successfull!y'); 
        }
    }

     public function deletesalesman($id){
        Salesman::where('id',$id)
         ->delete();
        return redirect('/superadmin/viewsalesman')->with('info','Salesman Deleted Successfull!y');

    }
       public function salesmangraphvalue(){
           
           $var2=$_POST['year_start'];
           $var4=$_POST['year_end'];
           $data=Salesman::all();
           $data1= Order::whereYear('created_at', '>=', $var2)->whereYear('created_at', '<=', $var4)->get();
        $var3=$_SESSION['myRole'];
        if($var3=='1')
        {
             return view('superadmin')->with('data',$data)->with('data1',$data1);
        }
        else
 
        if($var3=='2')
        {
             return view('admin')->with('data',$data)->with('data1',$data1);
        }
          
       
         

    
}
    

}

