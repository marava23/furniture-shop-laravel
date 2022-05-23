@extends('layouts.admin')
@section('Title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            @php
                function totalProductsSold($orders){
                    $total = 0;
                    foreach ($orders as $order){
                        foreach ($order->orderDetails as $od){
                            $total += $od->quantity;
                        }
                    }
                    return $total;
                }
            @endphp
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{totalProductsSold($orders)}}</h3>
                    <p>Total products sold</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('admin.products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            @php
            function totalEarning($orders){
                $total = 0;
                foreach ($orders as $order){
                    foreach ($order->orderDetails as $od){
                        $total += ($od->unit_price * $od->quantity) * ((100 - $od->discount)/100);
                    }
                }
                return $total;
            }
            @endphp
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>$ {{intval(totalEarning($orders))}}</h3>
                    <p>Total earning</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('admin.orders')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$users->total()}}</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('admin.actions')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$reviews->count()}}</h3>
                    <p>Reviews</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#review-more" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- PRODUCTS WITH MOST PROFIT-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top products</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sold items</th>
                            <th>Total profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $br=1;
                            function totalProfit($orders){
                                $total = 0;
                                foreach ($orders as $order){
                                    $total += ($order->unit_price * $order->quantity) * ((100 - $order->discount)/100);
                                }
                                return $total;
                            }
                        @endphp
                        @foreach($top as $product)
                            <tr>
                                <td>{{$br}}</td>
                                <td>{{$product->name}}</td>
                                <td>${{$product->price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->order_details_sum_quantity}}</td>
                                <td>${{intval(totalProfit($product->orderDetails))}}</td>
                            </tr>
                            @php
                                $br++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- TOP BUYERS AND MOST REVIEWS -->
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top buyers</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Total orders</th>
                            <th>Total spent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $br=1;
                        @endphp
                        @foreach($users as $user)
                        <tr>
                            <td>{{$br}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->orders_count}}</td>
                            <td>${{intval(totalProfit($user->orderDetails))}}</td>
                        </tr>
                            @php
                            $br++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-6">
            <div class="card" id="review-more">
                <div class="card-header">
                    <h3 class="card-title">Products with most reviews</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Reviews</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $br=1;
                        @endphp
                        @foreach($products as $product)
                            <tr>
                                <td>{{$br}}</td>
                                <td>{{$product->name}}</td>
                                <td>${{$product->price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->reviews->count()}}</td>
                            </tr>
                            @php
                                $br++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>


@endsection
