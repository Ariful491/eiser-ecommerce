<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class EiserController extends Controller
{
    public function index(){

        $featuresProducts=Product::where('status','1')->take(3)->get();
       $newProducts=Product::orderBy('id','DESC')->where('status','1')->take(4)->get();
        return view('Font-end.public.public',[
            'featureproduct'=>$featuresProducts,
            'newProduct'=>$newProducts,
        ]);
    }
    public function category($id){
        $catproducts= Product::where('status','1')->where('cat_id',$id)->get();

        return view('Font-end.public.category',[
            'product'=>$catproducts,

        ]);
    }
    public function productDetails($id){
        $productDetails=Product::find($id);
        return view('Font-end.public.product-details',[
            'productDetail'=>$productDetails
        ]);
    }
}
