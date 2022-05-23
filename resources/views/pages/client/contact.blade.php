@extends('layouts.user')
@section('bodyTag')
    id="contact" class="blog"
@endsection
@section('content')
    <div class="main-content">
        <div id="wrapper-site">
            <div id="content-wrapper">

                <!-- breadcrumb -->
                <div id="main">
                    <div class="page-home">
                        <div class="container">
                            <h1 class="text-center title-page">Contact Us</h1>
                            <div class="row-inhert">
                                <div class="header-contact">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="item d-flex">
                                                <div class="item-left">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-email"></i>
                                                    </div>
                                                </div>
                                                <div class="item-right d-flex">
                                                    <div class="title">Email:</div>
                                                    <div class="contact-content">
                                                        <a href="mailto:support@domain.com">support@domain.com</a>
                                                        <br>
                                                        <a href="mailto:contact@domain.com">contact@domain.com</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="item d-flex">
                                                <div class="item-left">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-home"></i>
                                                    </div>
                                                </div>
                                                <div class="item-right d-flex">
                                                    <div class="title">Address:</div>
                                                    <div class="contact-content">
                                                        23 Suspendis matti, Visaosang Building
                                                        <br>District, NY Accums, North American
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="item d-flex justify-content-end  last">
                                                <div class="item-left">
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-phone"></i>
                                                    </div>
                                                </div>
                                                <div class="item-right d-flex">
                                                    <div class="title">Hotline:</div>
                                                    <div class="contact-content">
                                                        0123-456-78910
                                                        <br>0987-654-32100
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-contact">
                                    <p class="icon text-center">
                                        <a href="#">
                                            <img src="{{asset('img/other/contact_mess.png')}}" alt="img">
                                        </a>
                                    </p>

                                    <div class="d-flex justify-content-center">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="contact-form">
                                                <form action="{{route('send.email')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-fields">
                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <input class="form-control" name="name" placeholder="Your name"
                                                                @if(session()->has('user')) value="{{session('user')->firstName." ". session('user')->lastName}}"
                                                                       @else value="{{old('name') ?? ""}}"
                                                                @endif>
                                                            </div>
                                                            <div class="col-md-6 margin-bottom-mobie">
                                                                <input class="form-control" name="email" type="email" placeholder="Your email"
                                                                @if(session()->has('user'))
                                                                       value="{{session('user')->email}}"
                                                                @else value="{{old('email') ?? ""}}"
                                                                @endif
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12 margin-bottom-mobie">
                                                                <input class="form-control" name="title" type="text" value="{{old('title') ?? ""}}" placeholder="Subject">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <textarea class="form-control" name="message" placeholder="Message" rows="8"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button class="btn" type="submit" name="submitMessage">
                                                            <img class="img-fl" src="{{asset('img/other/contact_email.png')}}" alt="img">Send message
                                                        </button>
                                                    </div>
                                                </form>
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
        </div>
    </div>
@endsection
