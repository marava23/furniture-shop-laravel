<header>
    <!-- header left mobie -->
    <div class="header-mobile d-md-none">
        <div class="mobile hidden-md-up text-xs-center d-flex align-items-center justify-content-around">

            <!-- menu left -->

            <!-- logo -->
            <div class="mobile-logo">
                <a href="index-2.html">
                    <img class="logo-mobile img-fluid" src="{{asset('img/home/logo-mobie.png')}}" alt="Prestashop_Furnitica">
                </a>
            </div>

            <!-- menu right -->
            <div class="mobile-menutop" data-target="#mobile-pagemenu">
                <i class="zmdi zmdi-more"></i>
            </div>
        </div>

    </div>

    <!-- header desktop -->
    <div class="header-top d-xs-none ">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-sm-2 col-md-2 d-flex align-items-center">
                    <div id="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('img/home/logo.png')}}" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>

                <!-- menu -->
                <div class="col-sm-5 col-md-5 align-items-center justify-content-center navbar-expand-md main-menu">
                    <div class="menu navbar collapse navbar-collapse">
                        <ul class="menu-top navbar-nav">
                            @foreach($menu as $m)
                            <li>
                                <a href="{{route($m["route"])}}" class="parent">{{$m["name"]}}</a>
                            </li>
                            @endforeach
                            @if(session()->has('user') && session('user')->role->name=="admin")
                             <li>
                                 <a href="{{route('admin.home')}}" class="parent">Admin panel</a>
                             </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- search and acount -->
                <div class="col-sm-5 col-md-5 d-flex align-items-center justify-content-end" id="search_widget">
                    <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                        <div class="myaccount-title ">
                            <a href="#acount" data-toggle="collapse" class="acount">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                @if(session()->has('user'))
                                <span>{{session('user')->username}}</span>
                                @endif
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div id="acount" class="collapse">
                            <div class="account-list-content">
                                @if(session()->has('user') && session('user')->role->name=="user")
                                    <div>
                                        <a class="login" href="{{route('user.show', ["user" => session('user')->id])}}" rel="nofollow" >
                                            <i class="fa fa-cog"></i>
                                            <span>My Account</span>
                                        </a>
                                    </div>

                                    <div>
                                        <a class="login" id="logout" href="" rel="nofollow">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            <span>Logout</span>
                                        </a>
                                    </div>
                                    @elseif(session()->has('user') && session('user')->role->name=="admin")
                                    <div>
                                        <a class="login" id="logout" href="" rel="nofollow">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            <span>Logout</span>
                                        </a>
                                    </div>
                                @else
                                    <div>
                                        <a class="login" href="{{route('login')}}" rel="nofollow" title="Log in to your customer account">
                                            <i class="fa fa-sign-in"></i>
                                            <span>Sign in</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a class="register" href="{{route('register')}}" rel="nofollow" title="Register Account">
                                            <i class="fa fa-user"></i>
                                            <span>Register Account</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(session()->has('user') && session('user')->role->name=="user")
                        @include('partials.cart')
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up active d-md-none">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Menu</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content">
            <nav>
                <!-- Brand and toggle get grouped for better mobile display -->
                <div id="megamenu" class="nov-megamenu clearfix">
                    <ul class="menu level1">
                        @foreach($menu as $m)
                        <li class="item home-page has-sub">
                            <a href="{{route($m["route"])}}" title="Home">
                                {{$m["name"]}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
