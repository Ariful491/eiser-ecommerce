<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   public  function index(){
       $orders= Order::with('customers','payments')->get();
//       return $orders;

       return view('admin.order.orders',[
           'orders'=>$orders,
       ]);
   }
   public function viewOrder($id){
       $orders= Order::with('customers','payments','shipping')->find($id);

       $productDetails= OrderDetail::where('order_id',$id)->get();

       return view('admin.order.view-orders',[
           'orders'=>$orders,
           'productDetails'=>$productDetails,
       ]);
   }
}
