@extends('layouts.user')
@section('bodyTag')
    id="product-detail"
@endsection
@section('content')
    <div class="main-content">
        <div id="wrapper-site">
            <div id="content-wrapper">
                <div id="main">
                    <div class="page-home">

                        <!-- breadcrumb -->
                        <div class="container">
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-8 col-lg-9 col-md-9">
                                        <div class="main-product-detail">
                                            <h2>{{ strtoupper($product->name) }}</h2>
                                            <div class="product-single row">
                                                <div class="product-detail col-xs-12 col-md-5 col-sm-5">
                                                    <div class="page-content" id="content">
                                                        <div class="images-container">
                                                            <div class="js-qv-mask mask tab-content border">
                                                                @foreach($product->productPictures as $index => $picture)
                                                                <div id="item{{$index}}" class="tab-pane fade @if($index==0) active in show @endif">
                                                                    <img src="{{asset($picture->picture)}}" alt="{{$product->name}}">
                                                                </div>
                                                                @endforeach
                                                                <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                                                                    <i class="fa fa-expand"></i>
                                                                </div>
                                                            </div>
                                                            <ul class="product-tab nav nav-tabs d-flex">
                                                                @foreach($product->productPictures as $index => $picture)
                                                                <li class=" @if($index==0) active @endif col">
                                                                    <a href="#item{{$index}}" data-toggle="tab" @if($index==0) aria-expanded="true" class="active show" @endif>
                                                                        <img src="{{asset($picture->picture)}}" alt="{{$product->name}}">
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                            <div class="modal fade" id="product-modal" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <div class="modal-body">
                                                                                <div class="product-detail">
                                                                                    <div>
                                                                                        <div class="images-container">
                                                                                            <div class="js-qv-mask mask tab-content">
                                                                                                @foreach($product->productPictures as $index => $picture)
                                                                                                <div id="modal-item{{$index}}" class="tab-pane fade @if($index==0) active in show @endif">
                                                                                                    <img src="{{asset($picture->picture)}}" alt="{{$product->name}}">
                                                                                                </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                            <ul class="product-tab nav nav-tabs">
                                                                                                @foreach($product->productPictures as $index => $picture)
                                                                                                <li @if($index==0) class="active" @endif>
                                                                                                    <a href="#modal-item{{$index}}" data-toggle="tab" @if($index==0) class=" active show" @endif>
                                                                                                        <img src="{{asset($picture->picture)}}" alt="{{$product->name}}">
                                                                                                    </a>
                                                                                                </li>
                                                                                                @endforeach
                                                                                            </ul>
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
                                                <div class="product-info col-xs-12 col-md-7 col-sm-7">
                                                    <div class="detail-description">
                                                        <div class="price-del">
                                                            <span class="price">${{intval($product->price)}}</span>
                                                        </div>
                                                        <p class="description">{{$product->description}}</p>
                                                        <div class="has-border cart-area">
                                                            <div class="product-quantity">
                                                                <div class="qty">
                                                                    <div class="input-group">
                                                                        <span class="add">
                                                                            <button class="btn btn-primary add-to-cart  add-item" data-id="{{$product->id}}" data-button-action="add-to-cart" type="submit">
                                                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                                <span>Add to cart</span>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <p class="product-minimal-quantity">
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review">
                                                <ul class="nav nav-tabs">
                                                    <li>
                                                        <a data-toggle="tab" href="#description" >Description</a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#tag">Product Tags</a>
                                                    </li>
                                                    <li >
                                                        <a data-toggle="tab" href="#review" class="active show">Reviews ({{$product->reviews->count()}})</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div id="description" class="tab-pane fade">
                                                        <p>{{$product->description}}
                                                        </p>
                                                    </div>

                                                    @include('partials.reviews')
                                                    <div id="tag" class="tab-pane fade in">
                                                        @foreach($product->productTags as $tag)
                                                        <p># {{strtoupper($tag->tag->name)}}</p>
                                                        @endforeach
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
        </div>
    </div>
@endsection
