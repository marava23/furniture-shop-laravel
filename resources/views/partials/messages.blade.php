@if(session("messages"))
    <div class="alert alert-info font-small text-center server-message mx-auto mt-3 mb-3" role="alert">
        @foreach(request()->session()->get("messages") as $m)
            <span>{{ $m }}</span>
            <br/>
        @endforeach
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger font-small text-center server-message mx-auto mt-3 mb-3" role="alert">
        @foreach($errors->all() as $e)
            <span>{{ $e }}</span>
            <br/>
        @endforeach
    </div>
@endif
