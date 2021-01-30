<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
session_start();
class CreatecategoriesController extends Controller
{
    public function viewcategory()
    {
        
        $categories=Category::all();
        $var3=$_SESSION['myRole'];
        if($var3=='1')
        {
            return view('superadmin/view_category')->with('categories',$categories);
        }
        else
 
        if($var3=='2')
        {
            return view('admin/view_category')->with('categories',$categories);
        }
    }
    
    public function createcategory(Request $request){
            $this->validate($request,[
            'category-name' => 'required',
            'option_value' => 'required',
        ]);
        $categories= new Category;
        $categories->cname = $request->input('category-name');
        $categories->cstatus = $request->input('option_value');
        $categories->save();
        
        return redirect()->back()->with('success', ['successfully']); 
    
    }
    public function editcategory(Request $request){
            $this->validate($request,[
            'category-name' => 'required',
            'option_value' => 'required',
        ]);
     $var1=$_POST['edit-category'];
     $var2=$_POST['category-name'];
     $var3=$_POST['option_value'];
     DB::table('categories')
     ->where('id',$var1)
     ->limit(1)
     ->update(array(
            'cname' => $var2,
            'cstatus' => $var3));
        return redirect()->back()->with('info','Updated Successfull!y'); 
        
     
    }
     public function deletecategory($id){
        Category::where('id',$id)
         ->delete();
        return redirect()->back()->with('info','Delete Successfull!y'); 

    }
    
    
    
}