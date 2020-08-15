<div class="top_menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="float-left">
                    <p>Phone: +01 256 25 235</p>
                    <p>email: info@eiser.com</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="float-right">
                    <ul class="right_side">
                        @if(!Session::get('customerId'))
                        <li>
                            <a href="cart.html">
                                Register
                            </a>
                        </li>
                            @else
                            <li>
                                <a >
                                   Wellcome, {{Session::get('customerName')}}
                                </a>
                            </li>

                        @endif

                        <li>
                            @if(!Session::get('customerId'))
                            <a href="{{route('checkout')}}">
                                login
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="" onclick="document.getElementById('logout-form').submit();">
                                logout
                            </a>
                        </li>
                            <form action="{{route('logout')}}" method="post" id="logout-form">
                                @csrf
                            </form>
                        @endif
                        <li>
                            <a href="contact.html">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
