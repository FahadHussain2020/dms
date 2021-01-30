<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Category;
use App\Salesman;
use App\Supplier;
use App\Product;
use App\Retailer;
use App\Order;
use App\Orderitem;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    APIs Start
        public $successStatus = 200;

        public function getorderbyId($name)
        {
            // $id = $request->id;
            $orders = DB::table('orders')
            ->select('orders.*','orderitems.*')
            ->leftjoin('orderitems', 'orderitems.ordid', '=', 'orders.ordid')
            ->where('orders.rname',$name)
            ->get();
            if($orders){
            return response()->json(['success' => $orders], $this-> successStatus);
            }
            else{
            return response()->json(['error'=>'No Data'], 401);
            }

        }

        public function getorderbyordid($id)
        {
            // $id = $request->id;
            $orders = DB::table('orderitems')
            ->select('*')
            ->where('ordid',$id)
            ->get();
            if($orders){
            return response()->json(['success' => $orders], $this-> successStatus);
            }
            else{
            return response()->json(['error'=>'No Data'], 401);
            }

        }

        public function createordr(Request $request)
        {

                    $payload = json_decode(request()->getContent(), true);
                    $data = array(
                        'rname' => $payload['rid'],
                        'rtotal' => $payload['bill'],
                        );
                        DB::table('orders')->insert($data);
                        $id = DB::getPdo()->lastInsertId();
                        $count =  $payload['count'];
                        for($i = 0; $i < $count; $i++)
                        {
                                $data2= array(
                                    'ordid' => $id,
                                    'pid' => $payload[$i]['id'],
                                    'pname' => $payload[$i]['name'],
                                    // 'pImage' => $payload[$a]['img'],
                                    'rprice' =>$payload[$i]['price'],
                                    'cat_name' =>$payload[$i]['mname'],
                                    'ordqty' => $payload[$i]['amount'],
                                    // 'amount' => $total[$i],
                                );

                                DB::table('orderitems')->insert($data2);
                       }

                    // $var = $payload[$a]['mname'];
                    // return $var;
                    return response()->json(['Success' =>  'Order Success'],$this-> successStatus);

        }

        public function getBreverages()
        {
            $Breverages = 'Breverages';
            $Breverages = DB::table('categories')
            // ->join('products', 'products.id', '=', 'orderitems.pid')
            ->join('products', 'products.category', '=', 'categories.id')
			->select('categories.*','products.*')
            ->where('categories.cname', $Breverages)
            ->get();
            if($Breverages)
            {
                 return response()->json(['Beverages' => $Breverages],$this-> successStatus);
            }
            else
            {
                return response()->json(['error'=>'No Data'], 401);
            }
        }

        public function getMedicine()
        {
            $Medicine = 'Medicine';
            $Medicine = DB::table('categories')
            // ->join('products', 'products.id', '=', 'orderitems.pid')
            ->join('products', 'products.category', '=', 'categories.id')
			->select('categories.*','products.*')
            ->where('categories.cname', $Medicine)
            ->get();
            if($Medicine)
            {
                 return response()->json(['Medicine' => $Medicine],$this-> successStatus);
            }
            else
            {
                return response()->json(['error'=>'No Data'], 401);
            }
        }

        public function getCosmetics()
        {
            $Cosmetics = 'Cosmetics';
            $Cosmetics = DB::table('categories')
            // ->join('products', 'products.id', '=', 'orderitems.pid')
            ->join('products', 'products.category', '=', 'categories.id')
			->select('categories.*','products.*')
            ->where('categories.cname', $Cosmetics)
            ->get();
            if($Cosmetics)
            {
                 return response()->json(['Cosmetics' => $Cosmetics],$this-> successStatus);
            }
            else
            {
                return response()->json(['error'=>'No Data'], 401);
            }
        }

        public function getusers()
        {
            $users = DB::table('admins')
            ->select('*')
            ->get();
            if($users){
            return response()->json(['success' => $users], $this-> successStatus);
            }
            else{
            return response()->json(['error'=>'No Data'], 401);
            }
        }
        public function getuserbyId($id)
        {
            // $id = $request->id;
            $user = DB::table('admins')
            ->select('*')
            ->where('uId',$id)
            ->first();
            if($user){
            return response()->json(['success' => $user], $this-> successStatus);
            }
            else{
            return response()->json(['error'=>'No Data'], 401);
            }
        }
        public function updateuser($id)
        {
            // $id = $request->id;
            $user = DB::table('admins')
            ->select('*')
            ->where('id',$id)
            ->first();
            if($user){
                $update = DB::table('admins')
                ->where('id', $id)
                ->update([
                    'address' => $request->address,
                    'password' => $request->password,
                    'mobile' => $request->mobile,
                ]);
            return response()->json(['success' => 'Profile Updated'], $this-> successStatus);
            }
            else{
            return response()->json(['error'=>'No User Exist'], 401);
            }
        }
        // public function getorders(Request $request)
        public function getorders($id)
        {
            // $id = $request->rid;
            $orders = DB::table('orders')
            ->select('orders.*','orderitems.*')
            ->leftjoin('orderitems', 'orderitems.ordid', '=', 'orders.ordid')
            ->leftjoin('products', 'products.id', '=', 'orderitems.pid')
            ->where('orders.rname','=',$id)
            ->get();
            if($orders)
            {
                 return response()->json(['orders' => $orders],$this-> successStatus);
            }
            else
            {
                return response()->json(['error'=>'No Data'], 401);
            }
        }
        public function loginuser(Request $request)
        {

            $validator = Validator::make($request->all(), [

                'userId' => ['required'],
                // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                // 'password' => ['required', 'string', 'min:8'],

            ]);
            if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
            }
            $userId = $request->userId;
            // $password = $request->password;

            $user = DB::table('admins')
            ->select('*')
            ->where('uid', $userId)
            ->first();
            $registeredId=$user->id;
            // $registeredpwd=$user->password;
            // $id['User_Id']=$user->id;


            if($registeredId){
            return response()->json(['success' => $user], $this-> successStatus);
            // if($registeredpwd == $password){
            // return response()->json(['success' => $user], $this-> successStatus);
            // }
            // else{
            // return response()->json(['error'=>'Invalid Username and Password'], 401);

            // }
            }
            else{
            return response()->json(['error'=>'No User Exist'], 401);

            }
        }

        // public function registeruser(Request $request)
        // {

        //     $validator = Validator::make($request->all(), [
        //         'name' => ['required', 'string', 'max:255'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //         'password' => ['required', 'string', 'min:8'],

        //     ]);
        //     if ($validator->fails()) {
        //     return response()->json(['error'=>$validator->errors()], 401);
        //     }
        //     $data = array(
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $request->password,
        //                     );
        //         if($data)
        //         {
        // 		DB::table('users')->insert($data);
        // 		return response()->json(['message' => 'User Registered Successfully'], $this-> successStatus);
        // 		}
        // 		else
        // 		{
        // 		return response()->json(['error'=>'Data not Inserted, Please try again'], 401);
        // 		}
        // }
//    APIs End
}
