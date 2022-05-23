@extends('layouts.admin')
@section('Title')
    Orders
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New orders</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newOrders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->firstName}} {{$order->user->lastName}}</td>
                                <td>${{intval(totalEarning($order->orderDetails))}}</td>
                                <td>
                                    @if($order->status ==1 && $order->acceptedAt !=null) Accepted
                                    @elseif($order->status==0) Pending
                                    @else Refused
                                    @endif
                                </td>
                                <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                                <td>@if($order->updated_at != null){{date('d-m-Y', strtotime($order->updated_at))}}
                                    @else
                                    @endif
                                </td>
                                <td>
                                    <button type="button" data-id="{{$order->id}}" data-action="accept" class="orders btn btn-success">Accept</button>
                                    <button type="button" data-id="{{$order->id}}" data-action="deny" class="orders btn btn-danger">Deny</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    @php
        function totalEarning($orderDetails){
            $total = 0;
                foreach ($orderDetails as $od){
                    $total += ($od->unit_price * $od->quantity) * ((100 - $od->discount)/100);
                }
            return $total;
        }
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders history</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Answered</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ordersHistory as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user->firstName}} {{$order->user->lastName}}</td>
                            <td>${{intval(totalEarning($order->orderDetails))}}</td>
                            <td>
                                @if($order->status ==1 && $order->acceptedAt !=null) Accepted
                                @elseif($order->status==0) Pending
                                @else Refused
                                @endif
                            </td>
                            <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                            <td>@if($order->updated_at != null){{date('d-m-Y', strtotime($order->updated_at))}}
                                @else
                                @endif</td>
                        </tr>
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
