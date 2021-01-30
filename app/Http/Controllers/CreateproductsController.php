<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Supplier;
use App\Product;
session_start();

class CreateproductsController extends Controller
{
    public function viewproduct(){
        $categories = Category::where('cstatus', 'active')->get();
        $products=Product::all();
        $suppliers= DB::table('suppliers')
        ->select('*')
        ->get();
        $var3=$_SESSION['myRole'];
        if($var3=='1')
        {
            return view('superadmin/view_product',compact('categories','products','suppliers'));
        }
        else
 
        if($var3=='2')
        {
            return view('admin/view_product',compact('categories','products','suppliers'));
        }
        
    }

    public function categporySuppliers(Request $request)
    {
        $response   = array('status' => '', 'message' => "", 'data' => array());


        $supplier   = Supplier::where('scategory', '=', $request->cname)
        ->orderBy('sname', 'ASC')->get();

        $response['status']     = 'success';
        $response['data']       = [ 
            'supplier'  => $supplier
        ];

        return $response;
    }

    public function createproduct(Request $request){
        $this->validate($request,[
            'product-name' => 'required',
            'purchase-price' => 'required|numeric',
            'retail-price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
        ]);
        $var1=$_POST['product-name'];
        $var2=$_POST['purchase-price'];
        $var3=$_POST['retail-price'];
        $var4=$_POST['quantity'];
        $var5=$_POST['category'];
        $var6=DB::table('categories')->where('cname',$var5)->pluck('id');
        $var7=$_POST['supplier'];
        $destiantionPath=public_path('/productImage');
        if ($request->file('image')) 
        {
            
            $image = time()."-".$request->file('image')->getClientOriginalName();
            $image_url = $request->file('image')->move( $destiantionPath, $image);
        
        }
    
    // DB::table('products')
    // ->limit(1)
    // ->insert(
    //     ['name' => $var1,
    //     'pur_price' => $var2,
    //     'ret_price' =>$var3,
    //     'qty' =>$var4,
    //     'category' =>$var5,
    //     'supplier' =>$var7,
    // ]);
    $data = array(
        'name' => $var1,
        'pur_price' => $var2,
        'ret_price' =>$var3,
        'qty' =>$var4,
        'category' =>$var5,
        'supplier' =>$var7,
        'pImage' => $image
                            );
        DB::table('products')->insert($data);  
     return redirect()->back()->with('success', ['successfully']); 


    }
    public function deleteproduct($id){
        Product::where('id',$id)
        ->delete();
        return redirect()->back()->with('success', ['Product Deleted Successfull!y']);
}
     public function updateproduct(Request $request){
        $this->validate($request,[

            'purchase-price' => 'required|numeric',
            'retail-price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

     $var1=$_POST['purchase-price'];
     $var2=$_POST['retail-price'];
     $var3=$_POST['quantity'];
     $var4=$_POST['create1'];
     $destiantionPath=public_path('/productImage');
        if ($request->file('image')) 
        {
            
            $image = time()."-".$request->file('image')->getClientOriginalName();
            $image_url = $request->file('image')->move( $destiantionPath, $image);
        
        }
     DB::table('products')
     ->where('id',$var4)
     ->limit(1)
     ->update(array(
            'pur_price' => $var1,
            'ret_price' => $var2,
            'qty' => $var3,
            'pImage' => $image,
        ));
        return redirect()->back()->with('info','Product Updated  Successfull!y'); 
        
     
    }
    
}
