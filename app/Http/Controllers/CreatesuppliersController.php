<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use App\Cat_sup;
use Illuminate\Support\Facades\DB;
session_start();

class CreatesuppliersController extends Controller
{
    public function viewsupplier(){

       $suppliers=Supplier::all();
       $categories=Category::all();
        $var3=$_SESSION['myRole'];
        if($var3=='1')
        {
             return view('superadmin/view_supplier')->with('suppliers',$suppliers)->with('categories',$categories);
        }
        else
 
        if($var3=='2')
        {
            return view('admin/view_supplier')->with('suppliers',$suppliers)->with('categories',$categories);
        }
       
   }
   public function createsupplier(Request $request){
      $this->validate($request,[
        'supplier-name' => 'required',
        'supplier-address' => 'required',
        'category' => 'required',
        'supplier-contact' => 'min:11|max:11',
      ]);
    $var1=$_POST['supplier-name'];
    $var2=$_POST['supplier-address'];
    $var3=$_POST['supplier-contact'];
    $var4=$_POST['category'];
    //$var5=DB::table('categories')->where('id',$var4)->pluck('cname');
    
    DB::table('suppliers')
    ->limit(1)
    ->insert(
        ['sname' => $var1,
        'saddress' => $var2,
        'scontact' =>$var3,
        'scategory' =>$var4
    ]);
    //below is pivit table insertion
     $id = DB::getPdo()->lastInsertId();;
      DB::table('cat_sups')
    ->limit(1)
    ->insert(
        ['Cat_id' => $var4,
        'sups_id' => $id,
    ]);
    

    return redirect()->back()->with('success', ['successfully']); 
    
   }
    public function updatesupplier(Request $request){
      $this->validate($request,[
        'supplier-name' => 'required',
        'supplier-address' => 'required',
        'supplier-contact' => 'min:11|max:11',
      ]);

     $var1=$_POST['supplier-name'];
     $var2=$_POST['supplier-address'];
     $var3=$_POST['supplier-contact'];
     $var4=$_POST['reset1'];
     DB::table('suppliers')
     ->where('id',$var4)
     ->limit(1)
     ->update(array(
            'sname' => $var1,
            'saddress' => $var2,
            'scontact' => $var3));
        return redirect()->back()->with('info','Supplier Updated  Successfull!y'); 
        
     
    }
public function deletesupplier($id){
  Supplier::where('id',$id)
  ->delete();
  return redirect('/superadmin/viewsupplier')->with('info','Supplier Deleted Successfull!y');
}
    
}