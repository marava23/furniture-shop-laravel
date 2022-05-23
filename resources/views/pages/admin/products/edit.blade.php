@extends('layouts.admin')
@section('Title')
    Edit Product
@endsection
@section('content')
    @php
    function tags ($tags){
        $productTags = [];
        foreach ($tags as $tag){
            array_push($productTags, $tag->id);
        }
        return $productTags;
    }
    @endphp
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                @include('partials.messages')
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('admin.products.update', ["product" => $product->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product name</label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="desc" class="form-control">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="number" name="price" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Category</label>
                            <select name="category" class="form-control">
                                @foreach($category as $c)
                                <option value="{{$c->id}}" @if($product->category_id == $c->id) selected @endif>{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Product tags</label><br>
                            @foreach($tags as $tag)
                                <label class="check">
                                    <input type="checkbox" name="tag[]" value="{{$tag->id}}"
                                           @if(in_array($tag->id,tags($product->tags))) checked @endif
                                    >
                                    <span class="checkmark">{{$tag->name}}</span>
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="inputState">Product pictures</label><br>
                            @foreach($product->productPictures as $picture)
                                <div class="form-group">
                                    <img src="{{asset($picture->picture)}}" alt="" class="img-thumbnail" width="150px">
                                    <input type="checkbox" name="picture[]" value="{{$picture->id}}"> Delete
                                </div>
                            @endforeach
                        </div>
                            <div class="form-group">
                                <label for="inputState">Add new picture</label><br>
                                <input type="file" name="image" placeholder="Choose image" id="image">
                            </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>


    </div>
@endsection
