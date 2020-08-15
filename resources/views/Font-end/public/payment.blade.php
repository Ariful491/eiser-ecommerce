@extends('Font-end.master')
@section('title')
    payment !! part
    @endsection

@section('body')
    <div class="container">

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header  text-center"><h4 class="text-success" style="

    font-family: Heebo, sans-serif;">Dear, Mr. {{Session::get('customerName')}}<br>Provide your payment information !</h4>

                    </div>

                    <div class="card-body ">
                        <form action="{{route('new-order')}}" method="post">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <td>Cash On delivery</td>
                                    <td><input type="radio" name="payment_type" value="cashon"></td>
                                </tr>
                                <tr>
                                    <td>Paypal/stripe</td>
                                    <td><input type="radio" name="payment_type" value="stripe"></td>
                                </tr>
                                <tr>
                                    <td>Credit/debit card</td>
                                    <td><input type="radio" name="payment_type" value="card"></td>
                                </tr>
                                <tr>
                                    <td>bkash</td>
                                    <td><input type="radio" name="payment_type" value="bkash"></td>
                                </tr>
                                <tr>

                                    <td colspan="2" class="text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-success " name="btn" >Order Conform</button>
                                    </td>
                                </tr>

                            </table>


                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>

    </div>
@endsection


