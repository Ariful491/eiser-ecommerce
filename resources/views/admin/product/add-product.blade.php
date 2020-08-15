@extends('admin.master')
@section('body')
    <div class="container-fluid">
    @if(Session::get('message'))

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bolder border-bottom-primary">ADD PRODUCT</h1>

        </div>


        {{Form::open(['route'=>'new-product','enctype'=>'multipart/form-data'])}}
        <div class="form-group">
            {{Form::label('Product Name:')}}
            {{Form::text('product_name','',['class'=>'form-control'])}}
            <span class="text-danger">{{$errors->has('product_name')?$errors->first('product_name'):''}}</span>





        </div>
        <div class="form-group">
            {{Form::label('Category Name:')}}
           <select name="cat_id" class="form-control">
               <option>---SELECT CATEGORY--- </option>
               @foreach($category as $categories)
               <option value="{{$categories->id}}">{{$categories->cat_nam}}</option>
                   @endforeach

           </select>
            <span class="text-danger">{{$errors->has('cat_id')?$errors->first('cat_id'):''}}</span>
        </div>
        <div class="form-group">
            {{Form::label('Brand Name:')}}
           <select name="Brand_id" class="form-control">
               <option>---SELECT BRAND NAME--- </option>
               @foreach($brand as $brands)
                   <option value="{{$brands->id}}">{{$brands->brand_name}}</option>
               @endforeach

           </select>
            <span class="text-danger">{{$errors->has('Brand_id')?$errors->first('Brand_id'):''}}</span>
        </div>

        <div class="form-group">
            {{Form::label('Product Price:')}}
            {{Form::text('product_price','',['class'=>'form-control'])}}
            <span class="text-danger">{{$errors->has('product_price')?$errors->first('product_price'):''}}</span>
        </div>

        <div class="form-group">
            {{Form::label('Product Short description:')}}
            {{Form::textarea('short_description','',['class'=>'form-control','rows'=>'2','placeholder'=>'product description'])}}
            <span class="text-danger">{{$errors->has('short_description')?$errors->first('short_description'):''}}</span>
        </div>
        <div class="form-group">
            {{Form::label('Product long description:')}}
            {{Form::textarea('long_description','',['class'=>'form-control','id'=>'editor'])}}
            <span class="text-danger">{{$errors->has('long_description')?$errors->first('long_description'):''}}</span>
        </div>

        <div class="form-group">
            {{Form::label('Product Size:')}}
            <select name="product_size" class="form-control">
                <option>---SELECT PRODUCT SIZE--- </option>
                <option value="xl">XL</option>
                <option value="l">L</option>
                <option value="m">M</option>
                <option value="s">S</option>

            </select>
            <span class="text-danger">{{$errors->has('product_size')?$errors->first('product_size'):''}}</span>
        </div>
    <div class="form-group">
            {{Form::label('Product quantity:')}}
            {{Form::number('Product_qty','',['class'=>'form-control'])}}
        <span class="text-danger">{{$errors->has('Product_qty')?$errors->first('Product_qty'):''}}</span>
        </div>
        <div class="form-group">
            {{Form::label('Product image:')}}
           <input type="file" name="main_image" class="form-control-file" id="profile-img">
            <img src="" id="profile-img-tag" width="200px" />
            <span class="text-danger">{{$errors->has('main_image')?$errors->first('main_image'):''}}</span>
        </div>
        <div class="form-group">
            {{Form::label('Image Gallery:')}}
           <input type="file" name="imagefile[]" class="form-control-file" multiple id="gallery-photo-add">

            <div class="gallery"  ></div>
            <span class="text-danger">{{$errors->has('imagefile')?$errors->first('imagefile'):''}}</span>

        </div>
        <div class="form-group">
            {{Form::label('publication status :')}}
            <div class="radio">


                {{Form::radio('status','1')}} Published
                {{Form::radio('status','0')}} Un-Published
            </div>
            <span class="text-danger">{{$errors->has('status')? $errors->first('status'):''}}</span>
        </div>

        {{Form::submit('Add Product',['class'=>'btn btn-primary btn-block'])}}



        {{Form::close()}}








    </div>


@endsection
