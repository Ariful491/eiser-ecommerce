@extends('Font-end.master')
@section('body')
    <div class="container">

        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  text-center"><h4 class="text-success" style="

    font-family: Heebo, sans-serif;">Dear, Mr. {{Session::get('customerName')}}<br>Provide your shipping information !</h4>
                        <small class="text-danger">*If you want ot change shipping address please change this form.</small>
                    </div>

                    <div class="card-body">
                        <form action="{{route('new-shipping')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Full Name : </label>
                                <input type="text" required class="form-control" name="full_name" value="{{$customer->first_name.' '.$customer->last_name}}">
                            </div>

                            <div class="form-group">
                                <label>Enter your email address : </label>
                                <input type="email" required class="form-control" value="{{$customer->email}}" name="email" >
                            </div>
                            <div class="form-group">
                                <label>Enter your Phone number : </label>
                                <input type="text" required class="form-control" value="{{$customer->phone_number}}" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label>Address : </label>
                                <textarea type="email" required class="form-control" name="address">{{$customer->address}}</textarea>
                            </div>

                            <div class="form-group text-center">

                                <button type="submit" class="btn btn-lg btn-outline-success ">Save  Shipping Info</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>

    </div>
@endsection
