<?php

namespace App\Http\Controllers;
use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
public function addCart(Request $request){
    $products =  Product::find($request->id);
    Cart::add([
        'id'=>$request->id,
        'name'=>$products->product_name,
        'price'=>$products->product_price,
        'qty'=>$request->qty,
        'options' => ['image' => $products->main_image]
    ]);
    return redirect('/cart');
}
public function viewCart(){
    $cartProducts = Cart::content();

    return view('Font-end.public.view-cart',[
        'CartProducts'=>$cartProducts,
    ]);
}

public function deleteCart($id){
    Cart::remove($id);
    return back();

}
public function updateCart(Request $request){
    Cart::update($request->id,$request->qty);
    return back();

}


}
