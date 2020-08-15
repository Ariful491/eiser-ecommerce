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



    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bolder border-bottom-primary">ADD BRAND</h1>

        </div>

        {{Form::open(['route'=>'new-brand','enctype'=>'multipart/form-data'])}}
            <div class="form-group">
                {{Form::label('Brand Name :')}}
                {{Form::text('brand_name','',['class'=>'form-control'])}}
                <span class="text-danger">{{$errors->has('brand_name')? $errors->first('brand_name'):''}}</span>
            </div>

            <div class="form-group">
                {{Form::label('Brand Description :')}}
                {{Form::textarea('brand_description','',['class'=>'form-control text-danger','rows'=>'2'])}}
                <span class="text-danger">{{$errors->has('brand_description')? $errors->first('brand_description'):''}}</span>
            </div>

            <div class="form-group">
                {{Form::label('Brand Image :')}}
                {{Form::file('brand_image',['class'=>'form-control-file','id'=>'profile-img'])}}

                <img src="" id="profile-img-tag" width="200px" />
                <span class="text-danger">{{$errors->has('brand_image')? $errors->first('brand_image'):''}}</span>
            </div>
            <div class="form-group">
                {{Form::label('publication status :')}}
                <div class="radio">


                {{Form::radio('status','1')}} Published
                {{Form::radio('status','0')}} Un-Published
                </div>
                <span class="text-danger">{{$errors->has('status')? $errors->first('status'):''}}</span>
            </div>

            {{Form::submit('Add Brand',['class'=>'btn btn-primary btn-block'])}}




        {{Form::close()}}













    </div>
@endsection
