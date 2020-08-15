<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
}

public function saveCategory(Request $request){
             $this->validate($request,[
                'cat_nam'=>'required|alpha',
                 'cat_des'=>'required',
                 'cat_image'=>'required|image',
                 'status'=>'required',


             ]);
             $categoryImage= $request->file('cat_image');
             $imageName=$categoryImage->getClientOriginalName();
             $directory='upload_img/cat_img/';
             $imageUrl=$directory.$imageName;
             $categoryImage->move($directory,$imageName);

           $category = new Category();
           $category->cat_nam = $request->cat_nam;
           $category->cat_des = $request->cat_des;
           $category->cat_image = $imageUrl;
           $category->status=$request->status;
           $category->save();
           return  redirect('/add-category')->with('message','Category Added successfully');


}
public function viewCategory(){
        $categories=Category::all();
        return view('admin.category.view-category',[
            'category'=>$categories,
        ]);
}
public function publishedCategory($id){
    $category=Category::find($id);
    $category->status=0;
    $category->save();
    return redirect('/view-category')->with('message','category successfully Unpublished!');

}
    public function unpublishedCategory($id){
        $category=Category::find($id);
        $category->status=1;
        $category->save();
        return redirect('/view-category')->with('message','category successfully published!');

    }
    public function updateCategory(Request $request){
              $category=Category::find($request->id);

        $categoryImage= $request->file('cat_image');
        if($categoryImage){
            unlink($category->cat_image);
            $imageName=$categoryImage->getClientOriginalName();
            $directory='upload_img/cat_img/';
            $imageUrl=$directory.$imageName;
            $categoryImage->move($directory,$imageName);
            $category->cat_nam=$request->cat_nam;
            $category->cat_des=$request->cat_des;
            $category->cat_image = $imageUrl;
            $category->status=$request->status;
            $category->save();
        }

        else{
            $category->cat_nam=$request->cat_nam;
            $category->cat_des=$request->cat_des;
            $category->status=$request->status;
            $category->save();

        }
        return redirect('/view-category')->with('message','Category Updated successfully');


    }
    public function deleteCategory($id){
        $category= Category::find($id);
        unlink($category->cat_image);
        $category->delete();
        return redirect('/view-category')->with('message','Category deleted successfully');

}

}
