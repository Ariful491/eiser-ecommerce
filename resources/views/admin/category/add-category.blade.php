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
            <h1 class="h3 mb-0 text-gray-800 font-weight-bolder border-bottom-primary">ADD CATEGORY</h1>

        </div>


        <form action="{{route('new-category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Add Category Name:</label>
                <input type="text" class="form-control"   placeholder="Enter category name" name="cat_nam">

                <span class="text-danger" >{{$errors->has('cat_nam') ? $errors->first('cat_nam'):'' }}</span>

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Add Category Description:</label>
                <textarea type="text" class="form-control"    placeholder="Enter category description" name="cat_des"></textarea>
                <span class="text-danger" >{{$errors->has('cat_des') ? $errors->first('cat_des'):'' }}</span>

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Image :</label>
                <input type="file" class="form-control-file"   name="cat_image">
                <span class="text-danger" >{{$errors->has('cat_image') ? $errors->first('cat_image'):'' }}</span>
            </div>


            <div class="form-group">
                <label  >Publication Status:</label>
                          <div class="col-md-9 radio "  >

                              <input type="radio"  name="status" value="1" >Published
                              <input type="radio"   name="status"  value="0">Un-Published


                          </div>
                <span class="text-danger" >{{$errors->has('status') ? $errors->first('status'):'' }}</span>

            </div>



            <button type="submit" name="btn" class="btn btn-primary ">Add Category</button>
        </form>








    </div>
    @endsection
