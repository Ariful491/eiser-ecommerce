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
            <h1 class="h3 mb-0 text-gray-800 font-weight-bolder border-bottom-primary"> Products</h1>

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
                            <th>Product Name:</th>
                            <th>Category Name:</th>
                            <th>Brand Name:</th>
                            <th>Product Price :</th>

                            <th>Product Main Image:</th>
                            <th>publication status:</th>
                            <th>Action:</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>SL NO.</th>
                            <th>Product Name:</th>
                            <th>Category Name:</th>
                            <th>Brand Name:</th>
                            <th>Product Price :</th>

                            <th>Product Main Image:</th>
                            <th>publication status:</th>
                            <th>Action:</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($i=1)
                        @foreach($product as $products)

                            <tr>
                                <td> {{$i++}}</td>
                                <td>{{$products->product_name}}</td>
                                <td>{{$products->cat_nam}}</td>
                                <td>{{$products->brand_name}}</td>
                                <td>{{$products->product_price}}</td>

                                <td><img src="{{asset($products->main_image)}}"  height="100"> </td>
                                <td>{{$products->status==0?'Unpublished':'Published'}}</td>
                                <td>
                                       @if($products->status==1)
                                        <a href="{{route('published-product',['id'=>$products->id])}}" class="btn btn-outline-primary">
                                            <i class="fas fa-arrow-circle-up"></i>
                                        </a>
                                      @elseif($products->status==0)
                                        <a href="{{route('unpublished-product',['id'=>$products->id])}}" class="btn btn-outline-danger" >
                                            <i class="fas fa-arrow-circle-down" ></i>
                                        </a>
                                       @endif
                                    <a href="" data-toggle="modal" data-target="#edit{{$products->id}}" class="btn btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('deleted-product',['id'=>$products->id])}}" onclick="return confirm('are you sure to delete this?') " class="btn btn-outline-primary">
                                        <i class="fas fa-trash"></i>
                                    </a>



                                </td>
                            </tr>


                           @include('admin.includes.update-products')

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
