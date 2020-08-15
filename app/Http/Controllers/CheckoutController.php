<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Cart;
use Mail;
use Session;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  public function index(){
      return view('Font-end.public.checkout-registrar');

  }
  public function CheckoutSignUp(Request $request){

      $customer=new Customer();
      $customer->first_name=$request->first_name;
      $customer->last_name=$request->last_name;
      $customer->email=$request->email;
      $customer->phone_number=$request->phone_number;
      $customer->address=$request->address;
      $customer->password=bcrypt($request->password);
      $customer->save();

//      $data=$cutomer->toArray();
//      Mail::send('Font-end.public.welcome-mail',$data,function ($message) use($data){
//      $message->to($data['email']);
//      $message->subject('welcome to Eiser E-commerce');
//      });

      $customerId=$customer->id;
      Session::put('customerId',$customerId);
      Session::put('customerName',$customer->first_name.' '.$customer->last_name);
      return redirect('/checkout/shipping');
  }
  public function shipping(){
      $customer = Customer::find(Session::get('customerId'));
      return view('Font-end.public.shipping',[
          'customer'=>$customer,
      ]);
  }
  public function saveShippingInfo(Request $request){
      $shipping=new Shipping();
      $shipping->full_name=$request->full_name;
      $shipping->email=$request->email;
      $shipping->phone_number=$request->phone_number;
      $shipping->address=$request->address;
      $shipping->save();

      Session::put('shippingId',$shipping->id);
      return redirect('/checkout/payment');

  }
  public function paymentForm(){
      return view('Font-end.public.payment');
  }

  public function orderConform(Request $request){

       $paymentType= $request->payment_type;
       if($paymentType=='cashon'){
           $order= new Order();
           $order->customer_id=Session::get('customerId');
           $order->shipping_id=Session::get('shippingId');
           $order->order_total=Session::get('orderTotal');
           $order->save();

           $payment=new Payment();
           $payment->order_id=$order->id;
           $payment->payment_type=$paymentType;
           $payment->save();

           $cartProducts= Cart::content();
           foreach ($cartProducts as $cartProduct) {
               $orderDetails= new OrderDetail();
               $orderDetails->order_id=$order->id;
               $orderDetails->product_id=$cartProduct->id;
               $orderDetails->product_name=$cartProduct->name;
               $orderDetails->product_price=$cartProduct->price;
               $orderDetails->product_quantity=$cartProduct->qty;
               $orderDetails->save();

           }
           Cart::destroy();
           return redirect('/checkout/payment/order-conform');



       }
       elseif ($paymentType=='stripe'){
           $order= new Order();
           $order->customer_id=Session::get('customerId');
           $order->shipping_id=Session::get('shippingId');
           $order->order_total=Session::get('orderTotal');
           $order->save();

           $payment=new Payment();
           $payment->order_id=$order->id;
           $payment->payment_type=$paymentType;
           $payment->save();

           $cartProducts= Cart::content();
           foreach ($cartProducts as $cartProduct) {
               $orderDetails= new OrderDetail();
               $orderDetails->order_id=$order->id;
               $orderDetails->product_id=$cartProduct->id;
               $orderDetails->product_name=$cartProduct->name;
               $orderDetails->product_price=$cartProduct->price;
               $orderDetails->product_quantity=$cartProduct->qty;
               $orderDetails->save();

           }
           Cart::destroy();
           return redirect('/checkout/payment/order-conform');
       }
       elseif ($paymentType=='card'){
           $order= new Order();
           $order->customer_id=Session::get('customerId');
           $order->shipping_id=Session::get('shippingId');
           $order->order_total=Session::get('orderTotal');
           $order->save();

           $payment=new Payment();
           $payment->order_id=$order->id;
           $payment->payment_type=$paymentType;
           $payment->save();

           $cartProducts= Cart::content();
           foreach ($cartProducts as $cartProduct) {
               $orderDetails= new OrderDetail();
               $orderDetails->order_id=$order->id;
               $orderDetails->product_id=$cartProduct->id;
               $orderDetails->product_name=$cartProduct->name;
               $orderDetails->product_price=$cartProduct->price;
               $orderDetails->product_quantity=$cartProduct->qty;
               $orderDetails->save();

           }
           Cart::destroy();
           return redirect('/checkout/payment/order-conform');
       }
       elseif ($paymentType=='bkash'){
           $order= new Order();
           $order->customer_id=Session::get('customerId');
           $order->shipping_id=Session::get('shippingId');
           $order->order_total=Session::get('orderTotal');
           $order->save();

           $payment=new Payment();
           $payment->order_id=$order->id;
           $payment->payment_type=$paymentType;
           $payment->save();

           $cartProducts= Cart::content();
           foreach ($cartProducts as $cartProduct) {
               $orderDetails= new OrderDetail();
               $orderDetails->order_id=$order->id;
               $orderDetails->product_id=$cartProduct->id;
               $orderDetails->product_name=$cartProduct->name;
               $orderDetails->product_price=$cartProduct->price;
               $orderDetails->product_quantity=$cartProduct->qty;
               $orderDetails->save();

           }
           Cart::destroy();
           return redirect('/checkout/payment/order-conform');
       }

  }
  public function conformPayment(){
             return view('Font-end.public.conform-payment');
  }




  public function CheckoutlogIn(Request $request){
      $customer = Customer::where('email',$request->email)->first();
      if(password_verify($request->password,$customer->password)){

          Session::put('customerId',$customer->id);
          Session::put('customerName',$customer->first_name.' '.$customer->last_name);
          return redirect('/checkout/shipping');
      }else{
        return redirect('/checkout')->with('message','Invalid password');
      }

  }
  public function logout(){

      Session::forget('customerId');
      Session::forget('customerName');

      return redirect('/');

  }

}
