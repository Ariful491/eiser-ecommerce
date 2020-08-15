@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h4 class="text-success">Order Information For this Order</h4></div>
                    <div class="card-body">
                        <table class="table table-bordered">

                            <tr>
                                <th>Order no:</th>
                                <td>{{$orders->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Total:</th>
                                <td>{{$orders->order_total}}</td>
                            </tr>
                            <tr>
                                <th>Order Status:</th>
                                <td>{{$orders->order_status}}</td>
                            </tr>
                            <tr>
                                <th>Order date:</th>
                                <td>{{$orders->created_at}}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h4 class="text-success">Customer Information For this Order</h4></div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer Name:</th>
                                <td>{{$orders->customers->first_name.' '.$orders->customers->last_name}}</td>
                            </tr>
                            <tr>
                                <th>Phone Number:</th>
                                <td>{{$orders->customers->phone_number}}</td>
                            </tr>
                            <tr>
                                <th>Email Address:</th>
                                <td>{{$orders->customers->email}}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{$orders->customers->address}}</td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>

        </div>


        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h4 class="text-success">Shipping Information For this Order</h4></div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer Name:</th>
                                <td>{{$orders->shipping->full_name}}</td>
                            </tr>
                            <tr>
                                <th>Phone Number:</th>
                                <td>{{$orders->shipping->phone_number}}</td>
                            </tr>
                            <tr>
                                <th>Email Address:</th>
                                <td>{{$orders->shipping->email}}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{$orders->shipping->address}}</td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
    </div>

    <hr>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h4 class="text-success">Payment Information For this Order</h4></div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Payment Type:</th>
                                <td>{{$orders->payments->payment_type}}</td>
                            </tr>
                            <tr>
                                <th>Payment status:</th>
                                <td>{{$orders->payments->payment_status}}</td>
                            </tr>



                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center"><h4 class="text-success">Product Details Information For this Order</h4></div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Serial No:</th>
                                        <th>Product Id:</th>
                                        <th>Product Name:</th>
                                        <th>Product Price:</th>
                                        <th>Product Quantity:</th>
                                        <th>Total Price:</th>

                                    </tr>
                                    @php($i=0)
                                    @foreach($productDetails as $productDetail)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$productDetail->product_id}}</td>
                                        <td>{{$productDetail->product_name}}</td>
                                        <td>{{$productDetail->product_price}}</td>
                                        <td>{{$productDetail->product_quantity}}</td>
                                        <td>{{$productDetail->product_price*$productDetail->product_quantity}}</td>
                                    </tr>
                                        @endforeach




                                </table>
                            </div>
                        </div>
            </div>
    @endsection
