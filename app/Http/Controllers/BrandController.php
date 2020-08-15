<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.add-brand');
    }
    public function addBrand(Request $request){
        $this->validate($request,[
            'brand_name'=>'required',
            'brand_description'=>'required',
            'status'=>'required',
            'brand_image'=>'required|image',
        ]);


        $brand= new Brand();

        $brandImage= $request->file('brand_image');
        $imageName=$brandImage->getClientOriginalName();
        $directory='upload_img/brandImage/';
        $imageUrl=$directory.$imageName;
//        $brandImage->move($directory,$imageName);
        Image::make($brandImage)->resize(120,80)->save($imageUrl);

        $brand->brand_name= $request->brand_name;
        $brand->brand_description= $request->brand_description;
        $brand->brand_image= $imageUrl;
        $brand->status= $request->status;
        $brand->save();
        return redirect('/add-brand')->with('message','Add Brand Successfully');

    }
    public function viewBrand(){
        $brands=Brand::all();
        return view('admin.brand.view-brand',[
            'brand'=>$brands,
        ]);
    }
    public function publishedBrand($id){
        $brand=Brand::find($id);
        $brand->status=0;
        $brand->save();

        return redirect('/view-brand')->with('message','Brand Unpublished successfully');
    }
    public function unpublishedBrand($id){
        $brand=Brand::find($id);
        $brand->status=1;
        $brand->save();

        return redirect('/view-brand')->with('message','Brand published successfully');
    }
    public function updatedBrand(Request $request){
        $brand=Brand::find($request->id);
        $brandImage=$request->file('brand_image');
        if($brandImage){
            unlink($brand->brand_image);
            $imageName=$brandImage->getClientOriginalName();
            $directory='upload_img/brandImage/';
            $imageUrl=$directory.$imageName;
            $brandImage->move($directory,$imageName);

            $brand->brand_name= $request->brand_name;
            $brand->brand_description= $request->brand_description;
            $brand->brand_image= $imageUrl;
            $brand->status= $request->status;
            $brand->save();



        }else{
            $brand->brand_name= $request->brand_name;
            $brand->brand_description= $request->brand_description;
            $brand->status= $request->status;
            $brand->save();
        }
        return redirect('/view-brand')->with('message','updated brand successfully');


    }
    public function deleteBrand($id){
        $brand=Brand::find($id);
        unlink($brand->brand_image);
        $brand->delete();
        return redirect('/view-brand')->with('message','deleted brand successfully');
    }


}
