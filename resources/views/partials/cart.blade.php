<div class="desktop_cart">
    <div class="blockcart block-cart cart-preview tiva-toggle">
        <div class="header-cart tiva-toggle-btn">
            <span class="cart-products-count" id="cart-items-number">{{$cart->count()}}</span>
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </div>
        <div class="dropdown-content">
            <div class="cart-content" id="print-Cart">
                <table>
                    <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td class="product-image">
                                <a href="{{route('products.show', ["product" => $item->id])}}">
                                    <img src="{{asset($item->product->productPictures[0]->picture)}}" alt="Product">
                                </a>
                            </td>
                            <td>
                                <div class="product-name">
                                    <a href="{{route('products.show', ["product" => $item->id])}}">{{$item->product->name}}</a>
                                </div>
                                <div>
                                    {{$item->quantity}} x
                                    <span class="product-price">$ {{$item->product->price}}</span>
                                </div>
                                <div class="input-group">
                                    <span class="add mr-2">
                                        <button class="btn cart-remove-item  add-item" data-id="{{$item->product->id}}" data-button-action="add-to-cart">
                                            <span>-</span>
                                        </button>
                                    </span>
                                    <span class="add">
                                        <button class="btn add-to-cart  add-item" data-id="{{$item->product->id}}" data-button-action="add-to-cart">
                                            <span>+</span>
                                        </button>
                                    </span>
                                </div>
                            </td>
                            <td class="action">
                                <a class="remove" data-id="{{$item->product->id}}" href="#">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="total">
                        @php
                            function total($cart){
                                $total = 0;
                                foreach($cart as $item){
                                    $total += $item->product->price * $item->quantity;
                                }
                                return $total;
                            }
                        @endphp
                        <td colspan="2">Total: $ {{total($cart) }}</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="3" class="d-flex justify-content-center">
                            <div class="cart-button">
                                <a href="" id="buy" data-id="{{session('user')->id}}" title="Checkout">Buy</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
