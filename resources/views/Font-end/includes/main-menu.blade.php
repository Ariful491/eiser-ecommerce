
<div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html">
                    <img src="{{asset('/font-end')}}/img/logo.png" alt="" />
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
    <div class="row w-100 mr-0">
        <div class="col-lg-7 pr-0">
            <ul class="nav navbar-nav center_nav pull-right">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>
                @foreach($category as $categories)

                <li class="nav-item">
                    <a class="nav-link" href="{{route('category',['id'=>$categories->id,'name'=>$categories->cat_nam])}}">{{$categories->cat_nam}}</a>
                </li>
                    @endforeach
            </ul>
        </div>

        <div class="col-lg-5 pr-0">
            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                <li class="nav-item">
                    <a href="#" class="icons">
                        <i class="ti-search" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="icons">
                        <i class="ti-shopping-cart"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="icons">
                        <i class="ti-user" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="icons">
                        <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</nav>
</div>
</div>
