function showCart(cart) {
    $("#cart-modal .modal-body").html(cart);
    $("#cart-modal").modal();
    let cartQty = $("#modal-cart-qty").text() ? $("#modal-cart-qty").text() : 0;
    $("#modal-cart-qty").text(cartQty);

    if (cartQty) {
        $('#cart-modal .modal-footer button.btn-cart').removeClass('d-none');
    } else {
        $('#cart-modal .modal-footer button.btn-cart').addClass('d-none');
    }
}

function clearCart(action) {
    $.ajax({
        url: action,
        type: "get",
        success: function (result) {
            let now_location = document.location.pathname;
            if (now_location == '/cart/checkout') {
                location = '/cart/checkout';
            } else {
                showCart(result);
            }
        },
        error: function () {
            alert('error!!!!');
        }
    });
}

function getCart(action) {
    $.ajax({
        url: action,
        type: "get",
        success: function (result) {
            showCart(result);
        },
        error: function () {
            alert("Error");
        },
    });
}

$(function () {
    // Cart
    $(".addtocart").on("submit", function () {
        let form = $(this);
        $.ajax({
            url: form.attr("action"),
            data: form.serialize(),
            type: "post",
            success: function (result) {
                // console.log(result);
                showCart(result);
            },
            error: function (msg) {
                alert("aaaaaaaaaaaaaerrorr!");
                console.log(msg.responseJSON);
                form[0].reset();
            },
        });
        return false;
    });

    $("#cart-modal .modal-body").on("click", ".del-item", function () {
        $.ajax({
            url: $(this).data("action"),
            type: "get",
            success: function (result) {
                let now_location = document.location.pathname;
                if (now_location == '/cart/checkout') {
                    location = '/cart/checkout';
                } else {

                    showCart(result);
                }
            },
            error: function (msg) {
                alert("Alarm!");
            },
        });
    });
});
