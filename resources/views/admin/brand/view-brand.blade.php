@extends('admin.master')

@section('body')
    @if(Session::get('message'))

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif





    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bolder border-bottom-primary"> brand</h1>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL NO.</th>
                            <th>Category Name:</th>
                            <th>Category Description:</th>
                            <th>Category Image:</th>
                            <th>Publication Status:</th>
                            <th>Action:</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>SL NO.</th>
                            <th>Category Name:</th>
                            <th>Category Description:</th>
                            <th>Category Image:</th>
                            <th>Publication Status:</th>
                            <th>Action:</th>
                        </tr>
                        </tfoot>
                        <tbody>@php($i=1)
                        @foreach( $brand as $brands)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{$brands->brand_name}}</td>
                                <td>{{$brands->brand_description}}</td>
                                <td>

                                    <img src="{{asset($brands->brand_image)}}" height="80px" width="120px"/>
                                </td>
                                <td>{{$brands->status==1?'Published':'Un-Published'}}</td>
                                <td>
                                    @if($brands->status==1)

                                        <a href="{{route('published-brand',['id'=>$brands->id])}}" class="btn btn-outline-primary">
                                            <i class="fas fa-arrow-circle-up"></i>
                                        </a>
                                    @else
                                        <a href="{{route('unpublished-brand',['id'=>$brands->id])}}" class="btn btn-outline-danger" >
                                            <i class="fas fa-arrow-circle-down" ></i>
                                        </a>
                                    @endif
                                    <a href="" data-toggle="modal" data-target="#edit{{$brands->id}}" class="btn btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('delete-brand',['id'=>$brands->id])}}" onclick="return confirm('are you sure to delete this?') " class="btn btn-outline-primary">
                                        <i class="fas fa-trash"></i>
                                    </a>



                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{$brands->id}}" >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('update-brand')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label >Add Brand Name:</label>
                                                    <input type="text" class="form-control"   value="{{$brands->brand_name}}" name="brand_name">
                                                    <input type="hidden" class="form-control"   value="{{$brands->id}}" name="id">


                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Add Brand Description:</label>
                                                    <textarea type="text" class="form-control"    name="brand_description">{{$brands->brand_description}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"> prev. Image :</label>
                                                    <img src="{{asset($brands->brand_image)}}" width="100%">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Image :</label>
                                                    <input type="file" class="form-control-file"   name="brand_image">
                                                </div>


                                                <div class="form-group">
                                                    <label  >Publication Status:</label>
                                                    <div class="col-md-9 radio "  >

                                                        <input type="radio" required name="status" value="1" {{$brands->status==1?'Checked':' '}} >Published
                                                        <input type="radio" required  name="status"  value="0" {{$brands->status==0?'Checked':' '}}>Un-Published
                                                    </div>


                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="btn" value="Update Category" >
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        @endforeach
                        </tbody>
                    </table>
                </div>





            </div>
        </div>

    </div>


    <!-- Button trigger modal -->


    <!-- Modal -->


@endsection

