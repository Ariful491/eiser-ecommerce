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
            <h1 class="h3 mb-0 text-gray-800 font-weight-bolder border-bottom-primary"> Orders</h1>

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
                            <th>Order NO.</th>
                            <th>Customer Name:</th>
                            <th>Order Total:</th>
                            <th>Order Status:</th>
                            <th>Payment Type:</th>
                            <th>Payment status:</th>
                            <th>Action:</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Order NO.</th>
                            <th>Customer Name:</th>
                            <th>Order Total:</th>
                            <th>Order Status:</th>
                            <th>Payment Type:</th>
                            <th>Payment status:</th>
                            <th>Action:</th>
                        </tr>
                        </tfoot>
                        <tbody>@php($i=1)
                        @foreach( $orders as $order)
                            <tr>
                                <td>{{ $order->id}}</td>
                                <td>{{$order->customers->first_name.' '.$order->customers->last_name}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payments->payment_type}}</td>
                                <td>{{$order->payments->payment_status}}</td>


                                <td>

                                        <a href="{{route('view-order-details',['id'=>$order->id])}}" class="btn btn-outline-primary">
                                            <i class="fas fa-search-plus"></i>
                                        </a>

                                        <a href="" class="btn btn-outline-danger" >
                                            <i class="fas fa-arrow-circle-down" ></i>
                                        </a>

                                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="" onclick="return confirm('are you sure to delete this?') " class="btn btn-outline-primary">
                                        <i class="fas fa-trash"></i>
                                    </a>



                                </td>
                            </tr>
                            <div class="modal fade" id="edit" >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">jjj</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label >Add Category Name:</label>
                                                    <input type="text" class="form-control"   value="" name="cat_nam">
                                                    <input type="hidden" class="form-control"   value="" name="id">


                                                </div>





                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Image :</label>
                                                    <input type="file" class="form-control-file"   name="cat_image">
                                                </div>


                                                <div class="form-group">
                                                    <label  >Publication Status:</label>
                                                    <div class="col-md-9 radio "  >

                                                        <input type="radio" required name="status" value="1" >Published
                                                        <input type="radio" required  name="status"  value="0" >Un-Published
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

