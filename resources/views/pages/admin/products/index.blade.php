@extends('layouts.admin')
@section('Title')
    Products
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.products.create')}}" class="btn btn-primary">Add new product</a>
                    <div class="card-tools">
                        <div class="input-group ">
                            <form action="{{route('admin.products.index')}}" method="get">
                                <div class="input-group-append">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Sold</th>
                                <th>Total profit</th>
                                <th>Reviews</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                function totalProfit($orders){
                                   $total = 0;
                                   foreach ($orders as $order){
                                       $total += ($order->unit_price * $order->quantity) * ((100 - $order->discount)/100);
                                   }
                                   return $total;
                               }
                            @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}} </td>
                                    <td>{{strlen($product->description) > 50 ? substr($product->description,0,50)."..." : $in}} </td>
                                    <td>{{$product->category->name}}</td>
                                    <td>${{$product->price}}</td>
                                    <td>{{$product->orderDetails->sum('quantity')}}</td>
                                    <td>${{intval(totalProfit($product->orderDetails))}}</td>
                                    <td>{{$product->reviews->count()}}</td>
                                    <td><a href="{{route('admin.products.edit', ["product" => $product->id])}}">Edit</a></td>
                                    <td><button type="button" data-id="{{$product->id}}" class="btn btn-danger prod-del">Delete</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links('pagination::bootstrap-4')}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
