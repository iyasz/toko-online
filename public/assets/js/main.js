function decrementQtyProduct() {
    var currentVal = $("#qtyProduct").val();

    if (currentVal > 1) {
        $("#qtyProduct").val(currentVal - 1);
    }
}

function incrementQtyProduct() {
    var currentVal = $("#qtyProduct").val();
    $("#qtyProduct").val(parseInt(currentVal) + 1);
}

function showFlashAlert(message, type) {
    $("#alertWishlist").removeClass("d-none alert-success alert-danger");
    $("#alertWishlist").addClass(type);
    $("#alertWishlist").text(message);
    $("#alertWishlist").slideDown();
}

$("#cartPayment").click(function () {
    window.location.href = "/payment";
});

$("#productAuth").click(function () {
    window.location.href = "/auth/login";
});

$(".product-view-details li .info a").on("click", function (e) {
    e.preventDefault();
    window.location.href = this.href + "&category=makanan";
});

function reloadWishlist() {
    return `<button id="wishlistRemove" class="btn btn-primary active text-black w-100 rounded-1 bg-transparent py-2 wishlist "><img src="/assets/img/maskot/wishlist_active.svg" id="imgWishlist" width="25px" class="me-1 " alt=""> Wishlist </button>`;
}

$("#wishlistBtn").on("click", function () {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        url: "/wishlist/store",
        data: {
            id_barang: location.pathname.split("/")[2],
        },
        success: function (e) {
            console.log(e);
            $("#containerWishlist").html(reloadWishlist());
        },
    });
});

$("#cartAdd").on("click", function () {
    axios({
        method: "post",
        url: "/cart",
        data: {
            id_barang: location.pathname.split("/")[2],
            qtyProduct: $("#qtyProduct").val(),
        },
    })
        .then(function (response) {
            window.location.href = "/cart";
        })
        .catch(function (error) {
            console.log(error);
        });
});

$(".addCartFromWishlist").on("click", function () {
    axios({
        method: "post",
        url: "/cart/store",
        data: {
            id_barang: $(this).val(),
        },
    })
        .then(function (response) {
            console.log(response.data);
            if (response.data.length == 0) {
                showFlashAlert(
                    "Item Berhasil Ditambahkan Ke Cart!",
                    "alert-success"
                );
            } else {
                showFlashAlert(
                    "Item Ini Sudah Ada di Keranjangmu",
                    "alert-danger"
                );
            }
        })
        .catch(function (error) {
            console.log(error);
        });
});

// $('.wishlist-add-cart button').on('click', function(){
//     axios({
//         method: 'post',
//         url: '/cart/store',
//         data: {
//             id_barang: $('#id_product_wishlist').val(),
//         }
//       })
//       .then(function (response) {
//           console.log(response.data);
//           response.data.forEach(function(item) {
//               console.log(item); // log each item in the array
//           });

//           if(response.data.length == 0){
//               showFlashAlert('Item Berhasil Ditambahkan Ke Cart!', 'alert-success')
//         }else{
//             showFlashAlert('Item Ini Sudah Ada di Keranjangmu', 'alert-danger')
//           }
//       })
//       .catch(function (error) {
//         console.log(error);
//       });
// })

$("#wishlistRemove").on("click", function () {
    console.log("ini remove");
});

$(document).ready(function () {
    $("#qtyProduct").on("input", function () {
        $("#qtyBarang").val($(this).val());
    });
});
