<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories=Category::where('status','1')->get();
        $brands=Brand::where('status','1')->get();

        return view('admin.product.add-product',[
            'category'=>$categories,
            'brand'=>$brands,
        ]);

    }
    protected function  Product_validate($request){
        $this->validate($request,[
            'main_image'=>'required|image',
            'imagefile'=>'required',
            'product_name'=>'required',
            'cat_id'=>'required',
            'Brand_id'=>'required',
            'product_price'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'product_size'=>'required',
            'Product_qty'=>'required',
            'status'=>'required',
        ]);
    }

    protected function  mainImageUpload($request){
        $productImage= $request->file('main_image');
        $ext='.'.$request->main_image->getClientOriginalExtension();
//        $imageName=str_replace($ext,time().$ext,$request->main_image->getClientOriginalName());
//        $imageName=str_replace($ext,rand(1,3000).$ext,$request->main_image->getClientOriginalName());
        $imageName=str_replace($ext,date('d-m-Y-h').$ext,$request->main_image->getClientOriginalName());
        $imageName=str_replace($ext,'arif'.time().$ext,$request->main_image->getClientOriginalName());
//        $imageName=$productImage->getClientOriginalName();
        $directory='upload_img/Product/main-image/';
        $imageUrl=$directory.$imageName;
        $productImage->move($directory,$imageName);
        return $imageUrl;
    }
 protected  function MultiplaImageWithSave($request, $imageUrl){

     foreach ($request->file('imagefile') as $image ){
         $imageName2=$image->getClientOriginalName();
         $directory2='upload_img/Product/gallery/';
         $imageUrl2=$directory2.$imageName2;
         $image->move($directory2,$imageName2);
         $data[] = $imageUrl2;

     }
     $product= new Product();
     $product->product_name=$request->product_name;
     $product->cat_id=$request->cat_id;
     $product->Brand_id=$request->Brand_id;
     $product->product_price=$request->product_price;
     $product->short_description=$request->short_description;
     $product->long_description=$request->long_description;
     $product->product_size=$request->product_size;
     $product->Product_qty=$request->Product_qty;
     $product->main_image=$imageUrl;
     $product->imagefile=json_encode($data);
     $product->status=$request->status;
     $product->save();
 }
    public function add_product(Request $request){
        $this->Product_validate($request);
        $imageUrl=$this->mainImageUpload($request);
        $this->MultiplaImageWithSave($request,$imageUrl);
        return back()->with('message','add product successfully');



    }





    public function view_product(){
//        $products=Product::all();

        $products=DB::table('products')
                           ->Join('categories','categories.id','=','products.cat_id')
                           ->Join('brands','brands.id','=','products.Brand_id')
                           ->select('cat_nam','brand_name','products.*')
                           ->get();
//        return $products;

        $categories=Category::where('status','1')->get();
        $brands=Brand::where('status','1')->get();

        return view('admin.product.view-product',[
            'product'=>$products,
            'category'=>$categories,
            'brand'=>$brands,
        ]);
    }
    public function published_product($id){
   $product= Product::find($id);
    $product->status=0;
    $product->save();


   return back()->with('message','product unpublished successfully');
    }
    public function unpublished_product($id){
   $product= Product::find($id);
    $product->status=1;
    $product->save();
   return back()->with('message','product published successfully');
    }

    public function update_product(Request $request){
        $product=Product::find($request->id);
        $productImage= $request->file('main_image');
        $productGallery= $request->file('imagefile');
        if($productGallery){
            foreach (json_decode($product->imagefile) as $img){

                unlink($img);

            }
            if($productImage)
            {
                unlink($product->main_image);
                $ext='.'.$request->main_image->getClientOriginalExtension();
                $imageName=str_replace($ext,'arif'.time().$ext,$request->main_image->getClientOriginalName());
                $directory='upload_img/Product/main-image/';
                $imageUrl=$directory.$imageName;
                $productImage->move($directory,$imageName);

                foreach ($productGallery as $image ){
                    $imageName2=$image->getClientOriginalName();
                    $directory2='upload_img/Product/gallery/';
                    $imageUrl2=$directory2.$imageName2;
                    $image->move($directory2,$imageName2);
                    $data[] = $imageUrl2;

                }

                $product->product_name=$request->product_name;
                $product->cat_id=$request->cat_id;
                $product->Brand_id=$request->Brand_id;
                $product->product_price=$request->product_price;
                $product->short_description=$request->short_description;
                $product->long_description=$request->long_description;
                $product->product_size=$request->product_size;
                $product->Product_qty=$request->Product_qty;
                $product->main_image=$imageUrl;
                $product->imagefile=json_encode($data);
                $product->status=$request->status;
                $product->save();
            }
            else
                {
//                    foreach (json_decode($product->imagefile) as $img){
//                    unlink($img);
//                }
                    foreach ($productGallery as $image ){
                        $imageName2=$image->getClientOriginalName();
                        $directory2='upload_img/Product/gallery/';
                        $imageUrl2=$directory2.$imageName2;
                        $image->move($directory2,$imageName2);
                        $data[] = $imageUrl2;
                    }

                    $product->product_name=$request->product_name;
                    $product->cat_id=$request->cat_id;
                    $product->Brand_id=$request->Brand_id;
                    $product->product_price=$request->product_price;
                    $product->short_description=$request->short_description;
                    $product->long_description=$request->long_description;
                    $product->product_size=$request->product_size;
                    $product->Product_qty=$request->Product_qty;
                    $product->imagefile=json_encode($data);
                    $product->status=$request->status;
                    $product->save();
            }
        }
            elseif($productImage){
                unlink($product->main_image);

                $ext='.'.$request->main_image->getClientOriginalExtension();
                $imageName=str_replace($ext,'arif'.time().$ext,$request->main_image->getClientOriginalName());
                $directory='upload_img/Product/main-image/';
                $imageUrl=$directory.$imageName;
                $productImage->move($directory,$imageName);


                $product->product_name=$request->product_name;
                $product->cat_id=$request->cat_id;
                $product->Brand_id=$request->Brand_id;
                $product->product_price=$request->product_price;
                $product->short_description=$request->short_description;
                $product->long_description=$request->long_description;
                $product->product_size=$request->product_size;
                $product->Product_qty=$request->Product_qty;
                $product->main_image=$imageUrl;
                $product->status=$request->status;
                $product->save();

            }
        else{

            $product->product_name=$request->product_name;
            $product->cat_id=$request->cat_id;
            $product->Brand_id=$request->Brand_id;
            $product->product_price=$request->product_price;
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
            $product->product_size=$request->product_size;
            $product->Product_qty=$request->Product_qty;
            $product->status=$request->status;
            $product->save();

            }
            return redirect('/view-product')->with('message','update product successfully');
        }
        public function deleted_product($id){
        $product=Product::find($id);
        foreach (json_decode($product->imagefile) as $img){
                unlink($img);
            }
        unlink($product->main_image);

        $product->delete();
            return back()->with('message',' product Deleted successfully');
        }


}

