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
    

    // $.ajax({

    // })
});

$('.select2-data').on('select2:select', function(e) {
    // $('#select2-data-input').html('')
    var value = e.params.data.id;
    var selectedText = $(this).find('option:selected').text();
    $('#select2-data-input').val(selectedText);
    $('#select2-data-input-value').attr("value", selectedText);

    $.ajax({
        type : 'GET',
        url : '/user/city/search',
        data : {
            province_id : value,
        },
        success: function(res){
            $('#select2-city').removeAttr('disabled');
            $('#select2-city').html('')
            console.log(res)
            $.each(res, function(index, value) {
                var select = $('#select2-city');
                $.each(value.results, function(i, result) {
                    var option = $('<option>', {
                        'value': result.city_name,
                        'text': result.city_name
                    }).on('click', function(){
                        console.log('anime')
                    });
                    select.append(option);
                });
            });
        }
    })
  });

//end select 2

$("#cartPayment").click(function () {
    window.location.href = "/user/address";
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

$('.deleteUserAddress').on('click', function(){
    var idAddress = $('.deleteUserAddress').data('address');
    axios({
        method: "delete",
        url: "/user/address/"+idAddress,
    })
        .then(function (response) {
            window.location.href='/user/address';
            
        })
        .catch(function (error) {
            console.log(error);
        });
})

$('#editUserAddressMain').on('click', function(){
    var idAddress = $('#editUserAddressMain').data('address');
    axios({
        method: "get",
        url: "/user/address/"+idAddress+"/data",
        // data: {
        //     province_id: 1
        // },
    })
        .then(function (response) {
            var res = response.data;
            $('#select2-city').removeAttr('disabled');
            $('#select2-city').html('')
          
            $('input[name="name"]').val(res.name)
            $('#select2-data-input').val(res.province_id)
            $('input[name="province_id"]').attr('value', res.province_id)
            $('textarea[name="street"]').val(res.street)
            $('input[name="zipcode"]').val(res.zipcode)
            $('input[name="telp"]').val(res.telp)
        })
        .catch(function (error) {
            console.log(error);
        });
})

$('.editUserAddress').on('click', function(){
    var idAddress = $(this).data('address');
    axios({
        method: "get",
        url: "/user/address/"+idAddress+"/data",
    })
        .then(function (response) {
            var res = response.data;
            $('#select2-city').removeAttr('disabled');
            $('#select2-city').html('')
          
            $('input[name="name"]').val(res.name)
            $('#select2-data-input').val(res.province_id)
            $('input[name="province_id"]').attr('value', res.province_id)
            $('textarea[name="street"]').val(res.street)
            $('input[name="zipcode"]').val(res.zipcode)
            $('input[name="telp"]').val(res.telp)
            
        })
        .catch(function (error) {
            console.log(error);
        });
})

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
