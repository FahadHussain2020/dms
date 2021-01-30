<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Salesman;
use App\Supplier;
use App\Product;
use App\Retailer;
use App\Order;
use App\Orderitem;
session_start();
class CreateordersController extends Controller
{
      public function createordr(Request $request)
    {
        $total = $request->total;
        $data = array(
                'rname' => $request->retailer,
                'rtotal' => $total,
                );
                DB::table('orders')->insert($data);

                $id = DB::getPdo()->lastInsertId();

                 $data2 = array(
                'ordid' => $id,
                'pid' => $request->productid,
                'pname' => $request->pname,
                'rprice' => $request->rprice,
                'ordqty' => $request->oqty,
                'amount' => $total,
                );
                DB::table('orderitems')->insert($data2);


            return redirect()->route('orderpage');
    }
    public function getproductbyid($name)
    {
        $dat = DB::table('products')
        ->select('*')
        ->where('name',$name)
        ->first();
        $data = json_decode(json_encode($dat), true);
        return $data;
    }
    public function orderpage(){
    	$products=Product::all();
    	$retailers=Retailer::all();
       $var3=$_SESSION['myRole'];
       if($var3=='1')
       {
        return view('superadmin/take_order',compact('products','retailers'));
    }
    else

        if($var3=='2')
        {
            return view('admin/take_order',compact('products','retailers'));
        }

    }

    public function save(){

        $this->output->set_content_type('application/json');
        echo json_encode(array('check' => 'check'));
    }


    public function vieworder(){
        $order=Order::all();
        $var3=$_SESSION['myRole'];
        if($var3=='1')
       {
        return view('superadmin/view_order')->with('order',$order);
    }
    else

        if($var3=='2')
        {
            return view('admin/view_order')->with('order',$order);
        }

        
    }

     public function deleteorder($id){
        Order::where('ordid',$id)
         ->delete();
        return redirect()->back()->with('info','Delete Successfull!y'); 

    }
    public function vieworderitem($id){
        $var3=$_SESSION['myRole'];
        if($var3=='1')
       {
         return view('superadmin/order_items')->with('id',$id);
    }
    else

        if($var3=='2')
        {
             return view('superadmin/order_items')->with('id',$id);
        }
       
    }

}
