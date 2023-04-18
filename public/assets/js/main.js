function decrementQtyProduct() {
    var currentVal = $('#qtyProduct').val();
    var currentVal = $('#qtyBarang').val();

    if (currentVal > 1) {
        $('#qtyProduct').val(currentVal - 1);
        $('#qtyBarang').val(currentVal - 1);
    }
}

function incrementQtyProduct() {
    var currentVal = $('#qtyBarang').val();
    var currentVal = $('#qtyProduct').val();
    $('#qtyProduct').val(parseInt(currentVal) + 1);
    $('#qtyBarang').val(parseInt(currentVal) + 1);
    
}


$('#wishlistBtn').on('click', function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/wishlist/store",
        data: {
            id_barang: location.pathname.split("/")[2]
        },
        success: function(e){
            console.log(e)
            $('#wishlistBtn').addClass('active');
            $('#imgWishlist').attr('src', `/assets/img/maskot/wishlist_active.svg`);
            $('#wishlistBtn').attr('id', 'wishlistRemove');
        },
    })
})

$('#cartAdd').on('click', function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/cart",
        data: {
            id_barang: location.pathname.split("/")[2],
            qtyProduct: $('#qtyProduct').val(),
        },
        success: function(e){
            window.location.href="/cart"
        },
    })
})

$('#wishlistRemove').on('click', function(){
    console.log("ini remove")
})

$(document).ready(function() {
    $('#qtyProduct').on('input', function() {
      $('#qtyBarang').val($(this).val());
    });
  });
