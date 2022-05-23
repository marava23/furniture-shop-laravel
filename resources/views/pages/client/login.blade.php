@extends('layouts.user')
@section('bodyTag')
    class="user-login blog"
@endsection
@section('content')
    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
            <div id="main">
                <div class="container">
                    <h1 class="text-center title-page">Log In</h1>
                    <div class="login-form">
                        <form id="customer-form" action="{{route('login')}}" method="post">
                            @csrf
                            <div>
                                <input type="hidden" name="back" value="my-account">
                                <div class="form-group no-gutters">
                                    <input class="form-control" name="email" type="email" placeholder=" Email" value="{{ old('email') ?? ""}}">
                                </div>
                                <div class="form-group no-gutters">
                                    <div class="input-group js-parent-focus">
                                        <input class="form-control js-child-focus js-visible-password" name="password" type="password" value="" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="text-center no-gutters">
                                    <input type="hidden" name="submitLogin" value="1">
                                    <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                        Sign in
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="no-gutters text-center">
                            <div class="forgot-password">
                                <a href="{{route('register')}}" rel="nofollow">
                                    Don't have account? Register
                                </a>
                            </div>
                        </div>
                        @include('partials.messages')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
