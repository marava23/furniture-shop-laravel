@foreach($products as $product)
    <div class="item text-center col-md-4">
        <div class="product-miniature js-product-miniature item-one first-item">
            <div class="thumbnail-container border">
                <a href="{{route('products.show', ["product" => $product->id])}}">
                    @if($product->productPictures->count() >= 2)
                    <img class="img-fluid image-cover" src="{{asset($product->productPictures[0]->picture)}}"
                         alt="{{$product->name}}">
                    <img class="img-fluid image-secondary" src="{{asset($product->productPictures[1]->picture)}}"
                         alt="{{$product->name}}">
                    @elseif($product->productPictures->count() == 1)
                        <img class="img-fluid image-cover" src="{{asset($product->productPictures[0]->picture)}}"
                             alt="{{$product->name}}">
                        <img class="img-fluid image-secondary" src="{{asset('img/product/2.jpg')}}"
                             alt="{{$product->name}}">
                    @elseif($product->productPictures->count() == 0)
                        <img class="img-fluid image-cover" src="{{asset('img/product/1.jpg')}}"
                             alt="{{$product->name}}">
                        <img class="img-fluid image-secondary" src="{{asset('img/product/2.jpg')}}"
                             alt="{{$product->name}}">
                    @endif
                </a>
            </div>
            <div class="product-description">
                <div class="product-groups">
                    <div class="product-title">
                        <a href="">{{$product->name}}</a>
                    </div>
                    <div class="product-group-price">
                        <div class="product-price-and-shipping">
                            <span class="price">${{ intval($product->price)}}</span>
                        </div>
                    </div>
                </div>
                <div class="product-buttons d-flex justify-content-center">
                    <div class="formAddToCart" >
                        <a data-id="{{$product->id}}"  class="add-to-cart" href="#" >
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
