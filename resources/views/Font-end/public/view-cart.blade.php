@extends('Font-end.master')
@section('title')
    Cart-view your product.
    @endsection
@section('body')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div
                    class="banner_content d-md-flex justify-content-between align-items-center"
                >
                    <div class="mb-3 mb-md-0">
                        <h2>Cart</h2>
                        <p>Very us move be blessed multiply night</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="cart.html">Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sum=0)
                        @foreach($CartProducts as $CartProduct)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img
                                            src="{{$CartProduct->options->image}}"
                                            alt=""
                                            width="80px"
                                        />
                                    </div>
                                    <div class="media-body">
                                        <p>{{$CartProduct->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{$CartProduct->price}}.tk</h5>
                            </td>
                            <td>
                                <form action="{{route('cart-update')}}" method="post">
                                    @csrf


                                <div class="product_count">
                                    <input type="text"  name="qty" id="sst"   value="{{$CartProduct->qty}}" title="Quantity:" class="input-text qty"/>
                                    <input type="hidden"  name="id"   value="{{$CartProduct->rowId}}" >
                                    <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count"
                                        type="button"
                                    >
                                        <i class="lnr lnr-chevron-up"></i>
                                    </button>
                                    <button
                                        onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count"
                                        type="button"
                                    >
                                        <i class="lnr lnr-chevron-down"></i>
                                    </button>

                                </div>
                                <button class="btn btn-outline-success" type="submit" name="btn"><i class="fa fa-edit"></i></button>
                                </form>
                            </td>
                            <td>
                                <h5>Tk. {{$CartProduct->subtotal}}</h5>
                            </td>
                            <td>
                                <a href="{{route('delete-cart',['id'=>$CartProduct->rowId])}}" class="btn btn-outline-danger"><i class="fa fa-trash " ></i></a>
                            </td>
                        </tr>
                            @php($sum+= $CartProduct->subtotal)
                        @endforeach


                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>tk. {{$sum}}</h5>
                                @php(Session::put('orderTotal',$sum))
                            </td>
                        </tr>

                        <tr class="out_button_area">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="checkout_btn_inner">
                                    <a class="gray_btn" href="{{route('index')}}">Continue Shopping</a>
                                    <a class="main_btn" href="{{route('checkout')}}">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->


    @endsection
