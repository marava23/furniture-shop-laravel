@extends('layouts.user')
@section('bodyTag')
    class="user-acount"
@endsection
@section('content')
    <div class="main-content">
        <div class="wrap-banner">
            <div class="acount head-acount">
                <div class="container">
                    <div id="main">
                        <h1 class="title-page">My Account</h1>
                        <div class="content" id="block-history">
                            <table class="std table">
                                <tbody>
                                <tr>
                                    <th class="first_item">My Name :</th>
                                    <td>{{$user->firstName . " " . $user->lastName}}</td>
                                </tr>
                                <tr>
                                    <th class="first_item">Email :</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th class="first_item">Username :</th>
                                    <td>{{$user->username}}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="order">
                            <h4>Order
                                <span class="detail">History</span>
                            </h4>
                            <div class="content" id="block-history">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Accepted at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->orders as $order)
                                        <tr>
                                            <th scope="col">{{$order->id}}</th>
                                            <th scope="col">
                                                @if($order->status ==1 && $order->acceptedAt !=null) Accepted
                                                @elseif($order->status==0) Pending
                                                @else Refused
                                                @endif
                                            </th >
                                            <th scope="col">
                                                @if($order->acceptedAt !== null) {{date('d-m-Y', strtotime($order->acceptedAt))}}
                                                @endif
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Product name</td>
                                            <td>Quantity</td>
                                            <td>Price per unit</td>
                                            <td>Discount</td>
                                        </tr>
                                    @foreach($order->orderDetails as $detail)
                                        <tr>
                                            <td>{{$detail->name}}</td>
                                            <td>{{$detail->quantity}}</td>
                                            <td>{{$detail->unit_price}}</td>
                                            <td>{{$detail->discount}} %</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
