$(document).ready(function() {
    $('.addToWishlist').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'prod_id': product_id
            },
            success: function(response) {
                console.log(response);
            }
        });
    });

    $('.addToCart').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty_input').val();

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty
            },
            success: function(response) {
                console.log(response);
                window.location.assign('/cart');
            }
        });
    });
    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty_input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty_input').val(value);
        }
    });
    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty_input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty_input').val(value);
        }
    });

    $('.changeQuantity').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty_input').val();

        $.ajax({
            method: "POST",
            url: "/update-cart",
            data: {
                'product_id': product_id,
                'product_qty': qty
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
    var path = window.location.href;
    $('li a').each(function() {
        if (this.href === path) {
            $(this).addClass('active');
        }
    });

});