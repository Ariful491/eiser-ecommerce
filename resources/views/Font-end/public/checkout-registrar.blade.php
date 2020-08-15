@extends('Font-end.master')
@section('title')
    checkout-registrar||
    @endsection
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  text-center"><h4 class="text-success" style="

    font-family: Heebo, sans-serif;">if you a new member here,<br>please registrar checkout !</h4> </div>
                <div class="card-body">
                    <form action="{{route('checkout-sign-up')}}" method="post">
                        @csrf
                              <div class="form-group">
                                  <label>First Name : </label>
                                  <input type="text" required class="form-control" name="first_name">
                              </div>
                              <div class="form-group">
                                  <label>Last Name : </label>
                                  <input type="text" required class="form-control" name="last_name">
                              </div>
                              <div class="form-group">
                                  <label>Enter your email address : </label>
                                  <input type="email" required class="form-control" name="email">
                              </div>
                              <div class="form-group">
                                  <label>Enter your Phone number : </label>
                                  <input type="text" required class="form-control" name="phone_number">
                              </div>
                              <div class="form-group">
                                  <label>Address : </label>
                                  <textarea type="text" required class="form-control" name="address"></textarea>
                              </div>
                              <div class="form-group">
                                  <label>password : </label>
                                  <input type="password" required class="form-control" name="password">
                              </div>
                              <div class="form-group text-center">

                                  <button type="submit" class="btn btn-lg btn-outline-success ">Registration</button>
                              </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-success text-center"><h4 class="text-success" style="font-family: Heebo, sans-serif">Already a Member?<br>Login Hare!</h4></div>
                <div class="card-body">
                    <form action="{{route('check-login')}}" method="post">
                        @csrf


                        <div class="form-group">
                            <label>Enter your email address : </label>
                            <input type="email" required class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>password : </label>
                            <input type="password"  class="form-control" name="password">
                            <small class="text-danger">{{Session::get('message')}}</small>
                        </div>
                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-lg btn-outline-success ">Log In</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
