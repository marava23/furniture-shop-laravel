@extends('layouts.admin')
@section('Title')
    User actions
@endsection
@section('content')
    @include('partials.messages')
    <form id="actionsForm" class="mt-4 mb-4" action="{{ route('admin.actions') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-12 col-md-5 mb-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">From</span>
                    </div>
                    <input class="form-control" type="date" name="from" @if(request()->has('from')) value="{{ request()->get('from') }}" @endif/>
                </div>
            </div>
            <div class="col-12 col-md-5 mb-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">To</span>
                    </div>
                    <input class="form-control" type="date" name="to" @if(request()->has('to')) value="{{ request()->get('to') }}" @endif/>
                </div>
            </div>
            <div class="col-12 col-md-2 mb-2">
                <input type="submit" value="Filter" class="btn btn-secondary"/>
            </div>
        </div>
    </form>
    <hr/>
    <div class="table-responsive">
        <table id="actionsTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>IP</th>
                <th>Path</th>
                <th>Method</th>
                <th>User</th>
                <th class="large-column">Action</th>
                <th class="large-column">Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($actions as $key=>$a)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $a->ip }}</td>
                    <td>{{ $a->path }}</td>
                    <td>{{ strtoupper($a->method) }}</td>
                    <td>{{ $a->username ? : 'N/A' }}</td>
                    <td>{{ $a->action }}</td>
                    <td>{{ $a->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
