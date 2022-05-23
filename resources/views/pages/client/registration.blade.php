@extends('layouts.user')
@section('bodyTag')
    class="user-register blog"
@endsection
@section('content')
    <div>
        <div class="main-content">
            <div id="wrapper-site">
                <div class="container">
                    <div class="row">
                        <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                            <div id="main">
                                <div id="content" class="page-content">
                                    <div class="register-form text-center">
                                        <h1 class="text-center title-page">Create Account</h1>
                                        <form action="{{route('register')}}" id="customer-form" class="js-customer-form" method="POST" >
                                            @csrf
                                            <div>
                                                <div class="form-group">
                                                    <div>
                                                        <input class="form-control" name="firstname" type="text" placeholder="First name" value="{{old('firstname') ?? ""}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <input  class="form-control" name="lastname" type="text" placeholder="Last name" value="{{old('lastname') ?? ""}}" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <input class="form-control" name="username" type="text" placeholder="Username" value="{{old('username') ?? ""}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <input class="form-control" name="email" type="email" placeholder="Email" value="{{old('email') ?? ""}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <div class="input-group js-parent-focus">
                                                            <input class="form-control js-child-focus js-visible-password" name="password" type="password" placeholder="Password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div>
                                                    <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                                        Create Account
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="no-gutters text-center">
                                            <div class="forgot-password">
                                                <a href="{{route('form.login')}}" rel="nofollow">
                                                    Already have account? Log In.
                                                </a>
                                            </div>
                                        </div>
                                        @include('partials.messages')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
