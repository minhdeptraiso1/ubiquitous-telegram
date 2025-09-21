
<header id="header"><!--header-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left" >
                        <a><img src="/Eshopper/images/home/shop_logo_big.png" style="width: 100%; height: 80px;" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <!-- Menu -->
<ul class="nav navbar-nav">
    <li>
        @if(Auth::check())
            <a href="{{ route('feuser.ttusers') }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
        @else
            <a href=""><i class="fa fa-user"></i> Account</a>
        @endif
    </li>
    <li><a href="{{ route('shopingcart.cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
    <li><a href="{{ route('shopingcart.punchorder') }}"><i class="fa fa-shopping-cart"></i> Đơn đã mua</a></li>
    <li>
        @if(Auth::check())
            <a href="{{ route('logout') }}"><i class="fa fa-lock"></i> Logout</a>
        @else
            <a href="{{ route('feuser.login') }}"><i class="fa fa-lock"></i> Login</a>
        @endif
    </li>
</ul>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                   @include('components.main_menu')
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
    </div>
    </div><!--/header-bottom-->
	</header><!--/header-->