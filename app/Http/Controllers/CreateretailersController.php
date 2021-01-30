<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Retailer;
session_start();
class CreateretailersController extends Controller
{
  public function viewretailer(){

    $retailers=Retailer::all();
    $var3=$_SESSION['myRole'];
    if($var3=='1')
    {
      return view('superadmin/view_retailer')->with('retailers',$retailers);
    }
    else
      if($var3=='2')
      {
        return view('admin/view_retailer')->with('retailers',$retailers);
      }
      
    }

    public function createretailer(Request $request){
      $this->validate($request,[
        'retailler-name' => 'required',
        'retailler-area' => 'required',
        'retailler-contact' => 'max:11|min:11',
        'balance-due' => 'required',
      ]);
      $var1=$_POST['retailler-name'];
      $var2=$_POST['retailler-area'];
      $var3=$_POST['retailler-contact'];
      $var4=$_POST['balance-due'];


      DB::table('retailers')
      ->limit(1)
      ->insert(
       ['name' => $var1,
       'area' => $var2,
       'contact' =>$var3,
       'bal_due' =>$var4
     ]);
      return redirect()->back()->with('success', ['successfully']); 

    }

    public function deleteretailer($id){
      Retailer::where('id',$id)
      ->delete();
      return redirect('/superadmin/viewretailer')->with('info','Retailer Deleted Successfull!y');

    }
    public function updateretailer(Request $request){
      $this->validate($request,[
        'retailler-name' => 'required',
        'retailler-area' => 'required',
        'retailler-contact' => 'min:11|max:11',
        'balance-due' => 'required',
      ]);

      $var1=$_POST['retailler-name'];
      $var2=$_POST['retailler-area'];
      $var3=$_POST['retailler-contact'];
      $var4=$_POST['balance-due'];
      $var5=$_POST['create1'];
      DB::table('retailers')
      ->where('id',$var5)
      ->limit(1)
      ->update(array(
        'name' => $var1,
        'area' => $var2,
        'contact' => $var3,
        'bal_due' => $var4));
      return redirect()->back()->with('info','Retailer Updated daniyal Successfull!y'); 
    }
  }
