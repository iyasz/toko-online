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

$("#cartPayment").on("click", function () {
    axios({
        method: "GET",
        url: "/cart/checkAddress",
    })
        .then(function (response) {
            if (response.data != 0) {
                window.location.href = "/checkout/review";
            } else {
                window.location.href = "/user/address";
            }
        })
        .catch(function (error) {
            console.log(error);
        });
});

// select 2
$(document).ready(function () {
    $(".select2-data").select2({
        minimumResultsForSearch: -1,
    });

    $(".select2-data-input").on("focus", function () {
        $(this).siblings("select").select2("open");
    });
});

$(".select2-data-input").on("keyup", function () {
    var inputVal = $(this).val();
    $(this).attr("value", inputVal);
});

$(".select2-data").on("select2:select", function (e) {
    // $('#select2-data-input').html('')
    var value = e.params.data.id;
    var selectedText = $(this).find("option:selected").text();
    $("#select2-data-input").val(selectedText).attr("value", selectedText);

    $.ajax({
        type: "GET",
        url: "/user/city/search",
        data: {
            province_id: value,
        },
        success: function (res) {
            $("#select2-city").removeAttr("disabled");
            $("#select2-city").html("");
            console.log(res);
            $.each(res, function (index, value) {
                var select = $("#select2-city");
                var opt = $("<option>", {
                    disabled: true,
                    selected: true,
                    text: "Choose One",
                });
                select.append(opt);
                $.each(value.results, function (i, result) {
                    var option = $("<option>", {
                        value: result.city_id,
                        text: result.city_name,
                    });
                    select.append(option);
                });
            });
        },
    });
});

$("#select2-city").on("change", function () {
    $("#cityTextValue").attr("value", $(this).find("option:selected").text());
});

$(".select2-data").select2({
    minimumResultsForSearch: -1,
});

//end select 2

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

function reloadUnwishlist() {
    return `  <button id="wishlistBtn" class="btn btn-danger text-black w-100 rounded-1 bg-transparent py-2 wishlist "><img src="/assets/img/maskot/wishlist.svg" id="imgWishlist" width="25px" class="me-1 " alt=""> Wishlist </button>`;
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

$("#wishlistRemove").on("click", function () {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "delete",                                                                
        url: "/unwishlist/store",
        data: {
            id_barang: location.pathname.split("/")[2],
        },
        success: function (e) {
            console.log(e);
            $("#containerWishlist").html(reloadUnwishlist());
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

$(".deleteUserAddress").on("click", function () {
    var idAddress = $(".deleteUserAddress").data("address");
    axios({
        method: "delete",
        url: "/user/address/" + idAddress,
    })
        .then(function (response) {
            window.location.href = "/user/address";
        })
        .catch(function (error) {
            console.log(error);
        });
});

$("#editUserAddressMain").on("click", function () {
    var idAddress = $("#editUserAddressMain").data("address");
    axios({
        method: "get",
        url: "/user/address/" + idAddress + "/data",
    })
        .then(function (response) {
            var res = response.data;
            $("#select2-city").removeAttr("disabled");
            $("#select2-city").html("");

            $('input[name="name"]').val(res.name);
            $("#select2-data-input").val(res.province_id);
            $('input[name="province_id"]').attr("value", res.province_id);
            $('textarea[name="street"]').val(res.street);
            $('input[name="zipcode"]').val(res.zipcode);
            $('input[name="telp"]').val(res.telp);
        })
        .catch(function (error) {
            console.log(error);
        });
});

$(".setMainAddress").on("click", function () {
    var idAddress = $(this).data("address");
    axios({
        method: "put",
        url: "/user/address/" + idAddress,
    })
        .then(function (response) {
            window.location.href = "/user/address";
        })
        .catch(function (error) {
            console.log(error);
        });
});

$(".editUserAddress").on("click", function () {
    var idAddress = $(this).data("address");
    axios({
        method: "get",
        url: "/user/address/" + idAddress + "/data",
    })
        .then(function (response) {
            var res = response.data;
            $("#select2-city").removeAttr("disabled");
            $("#select2-city").html("");

            $('input[name="name"]').val(res.name);
            $("#select2-data-input").val(res.province_id);
            $('input[name="province_id"]').attr("value", res.province_id);
            $('textarea[name="street"]').val(res.street);
            $('input[name="zipcode"]').val(res.zipcode);
            $('input[name="telp"]').val(res.telp);
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

$("#select-courier").on("change", function () {
    $("#select-layanan").attr("disabled", "disabled");
    $("#paymentButtonCheckout").attr("disabled", "disabled");
    $("#shippingFee").html('IDR 0');
    $("#resultAllPayment").html($('#subtotalPayment').text());
    $("#paymentButtonCheckout").attr("value", '');
    $.ajax({
        type: "get",
        url: "/checkout/courier/ongkir",
        data: {
            origin: 78,
            destination: $("#paymentButtonCheckout").data("destination"),
            weight: $("#paymentButtonCheckout").data("weight"),
            courier: $(this).val(),
        },
        success: function (e) {
            $("#shippingFee").removeClass("skeleton-loader");

            // layanan section
            var valueAllService = e.rajaongkir.results[0].costs;
            var selectService = $("#select-layanan");
            $(selectService).html("");

            var opt = $("<option>", {
                disabled: true,
                selected: true,
                text: "Pilih Layanan",
            });
            selectService.append(opt);
            $.each(valueAllService, function (i, result) {
                var option = $("<option>", {
                    value: result.service,
                    text: result.description,
                });
                selectService.append(option);
            });

            $("#select-layanan").removeAttr("disabled");
        },
    });
});

$("#select-layanan").on("change", function () {
    $("#shippingFee").html("");
    $("#shippingFee").addClass("skeleton-loader");
    $("#paymentButtonCheckout").attr("disabled", "disabled");

    $.ajax({
        type: "get",
        url: "/checkout/service/ongkir",
        data: {
            origin: 78,
            destination: $("#paymentButtonCheckout").data("destination"),
            weight: $("#paymentButtonCheckout").data("weight"),
            courier: $('#select-courier').val(),
        },
        success: function (e) {
            $("#shippingFee").removeClass("skeleton-loader");
            console.log($('#select-layanan').val());
            var serviceValue = $('#select-layanan').val()
            var valueOFService = e.rajaongkir.results[0].costs
            console.log(valueOFService);

            $.each(valueOFService, function(index, item) {
                if (item.service == serviceValue ) {
                  console.log(item.description);

                  var number = item.cost[0].value;
                  const formattedNumberFee = number.toLocaleString();
                  $("#shippingFee").html("IDR " + formattedNumberFee);
                  $("#shippingFee").attr("data-value", number);
      
                  result = $("#resultAllPayment").data("value") + number;
                  const formattedNumberResult = result.toLocaleString();
                  $("#paymentButtonCheckout").attr("value", result);
                  $("#resultAllPayment").html("IDR " + formattedNumberResult);
                  $("#paymentButtonCheckout").removeAttr("disabled");

                }
              });
        },
    });
});

$('#paymentButtonCheckout').on('click', function(){
    axios({
        method: "post",
        url: "/checkout/review",
        data: {
            weight: $(this).data('weight'),
            destination_id: $(this).data('destination'),
            courier_id: $('#select-courier').val(),
            layanan: $('#select-layanan').val(),
            address_id: $(this).data('address'),
            total_price: $('#resultAllPayment').data('value'),
            note: $('#noteCheckout').val(),
        },
    })
        .then(function (response) {
            console.log(response);
            window.location.href="/checkout/thanks"
            
        })
        .catch(function (error) {
            console.log(error);
        });
})

$("#deleteAllProductFromCart").on("click", function () {
    if(confirm('Apakah kamu ingin menghapus semua produk di Cart?')){
        axios({
            method: "delete",
            url: "/cart/remove/all",
    })
        .then(function (response) {
            console.log(response);
            window.location.href = "/cart";
        })
        .catch(function (error) {
            console.log(error);
        });
    }
});

$(document).ready(function () {
    $("#qtyProduct").on("input", function () {
        $("#qtyBarang").val($(this).val());
    });
});
