$(document).ready(function(){
    const base_url = window.location.origin;
    $(".orders").click(function(e){
        const id = $(this).data('id');
        const action = $(this).data('action');
        data = {
            id : id,
            action : action
        }
        updateOrderStatus(data);
    });
    $(".prod-del").click(function(e){
       const id = $(this).data('id');
       removeProduct(id);
    });
    $("#buy").click(function(e){
        e.preventDefault();
        const id = $(this).data('id');
        buy(id);
    });
    $("#logout").click(function(e){
        e.preventDefault();
        logout();
    })
    $(".add-to-cart").click(function(e){
        e.preventDefault();
        const id = $(this).data('id');
        addToCart(id);
    })

    $(".remove").click(function(e){
        e.preventDefault();
        const id = $(this).data('id');
        removeFromCart(id);
    })
    $(".cart-remove-item").click(function(e){
        e.preventDefault();
        const id = $(this).data('id');
        reduceCart(id);
    })
    async function updateOrderStatus(data){
        result = await ajax(base_url + '/admin/orders/' + data.id, "put", data);
        if(result.message === "Success"){
            alert('Successfully updated order!');
            location.reload();
        }
    }
    async function removeProduct(id){
        data = {id : id};
        var result = await ajax(base_url + '/admin/products/' + id , "delete", data);
        if(result.message === "Success"){
            alert('Successfully deleted product!');
            location.reload();
        }
    }
    async function buy(id){
        data = {id : id};
        var result = await ajax(base_url + '/orders', "post", data);
        if(result.message === "Success"){
            alert('Successfully made order!');
            location.reload();
        }
    }
    async function logout(){
        var result =  await ajax(base_url + '/logout', "post", {});
        if(result.message === "Success"){
            alert('Successfully logged out!');
            location.reload();
        }
    }
    async function addToCart(id){
        data = { id : id}
        var result = await ajax( base_url + '/carts',"post", data);
        if(result.message === "Success"){
            alert('Successfully increased/added to cart!');
            location.reload();
        }
    }
    async function removeFromCart(id){
        data = {id : id}
        var result = await ajax(base_url + '/carts/' + id, "delete", data);
        if(result.message === "Success"){
            alert('Successfully removed!');
            location.reload();
        }
    }
    async function reduceCart(id){
        data = {id : id};
        var result = await ajax(base_url + '/carts/' + id, "put", data);
        alert('Successfully reduced!');
        location.reload();
    }
    function printCart(data){
        let number = 0;
        let total = 0;
        let html = "<table> <tbody>";
        for(let item of data){
            number ++;
            total+= item.quantity * item.product.price;
            html+= `
        <tr>
                            <td class="product-image">
                                <a href="${base_url+'/products/' + item.product.id}">
                                    <img src="${item.picture}" alt="Product">
                                </a>
                            </td>
                            <td>
                                <div class="product-name">
                                    <a href="${base_url+'/products/' + item.product.id}">${item.product.name}</a>
                                </div>
                                <div>
                                    ${item.quantity} x
                                    <span class="product-price">$ ${item.product.price}</span>
                                </div>
                                <div class="input-group">
                                <span class="add">
                                    <button class="btn add-to-cart  add-item" data-id="${item.product.id}" data-button-action="add-to-cart" >
                                        <span>+</span>
                                    </button>
                                </span>
                                </div>
                            </td>
                            <td class="action">
                                <a class="remove" data-id="${item.product.id}" href="#">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
        `
        }
        html+= `
                <tr class="total">
                        <td colspan="2">Total: $ ${total}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="d-flex justify-content-center">
                            <div class="cart-button">
                                <a href="product-cart.html" title="View Cart">View Cart</a>
                                <a href="product-checkout.html" title="Checkout">Checkout</a>
                            </div>
                        </td>
                    </tr>
    `;
        html+= "</tbody> </table>";
        $("#cart-items-number").html(number);
        $("#print-Cart").html(html);

        document.querySelector('.remove').addEventListener('click', function(){
            removeFromCart(this.dataset.id);
        })
        document.querySelector('.add-to-cart').addEventListener('click', function(){
            addToCart(this.dataset.id);
        })

    }
    async function ajax(fileName,method, data){
        let returnValue = null;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        await $.ajax({
            url: fileName,
            method: method,
            dataType: 'json',
            data: data,
            success: response => {
                returnValue = response;
            },
            error: err => {
                location.replace(base_url + '/login');
            }
        });

        return returnValue;
    }
})

