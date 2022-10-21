$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

updateTotalPrice()
updateFinishPrice()
function updateTotalPrice() {
    var sum = 0
    var arr = $('td.total')
    $.each(arr, function(index) {
        sum = sum - (- $(arr[index]).text())
    })
    $('#cart-total').text(sum)
}

$(document).on('change', 'input.input-number', function() {
    var itemID = $(this).attr('cart-id')
    var price = $(this).attr('price')
    var quantity = $(this).val()
    var obj = $(this).parent().parent().next()
    var coupon = $('input#input-coupon').val()
    $.ajax({
        type: "POST",
        url: "/cart/update",
        data: {
            'itemID' : itemID,
            'coupon' : coupon,
            'quantity' : quantity
        },
        success: function (response) {
            if (response.status == true) {
                // update tổng giá
                $(obj).text(quantity * price)
                updateTotalPrice()
                updateDiscount(response.percent)
                updateFinishPrice()
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Vượt quá số lượng hiện có của sản phẩm',
                })
            }
        }
    });
})

$(document).on('click', '.remove-product', function() {
    var itemID = $(this).attr('cart-id')
    var tr = $(this).parent().parent()
    $.ajax({
        type: "POST",
        url: "/cart/delete",
        data: {
            'itemID' : itemID
        },
        success: function (response) {
            if (response.status == true) {
                tr.remove()
                updateTotalPrice()
                updateFinishPrice()
                // window.location.href = "/cart"
            }
        }
    });
})

$(document).on('click', '#apply-coupon', function() {
    var coupon = $('input#input-coupon').val()
    $.ajax({
        type: "POST",
        url: "/cart/apply-coupon",
        data: {
            'coupon' : coupon
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Kích hoạt mã giảm giá',
                // text: 'Vui lòng chọn sản phẩm và nhập đầy đủ thông tin vị trí!',
            })
            updateDiscount(response.percent)
            updateFinishPrice()
        }
    });
})

var chooseOtherPlace = false;
$(document).on('change', 'input[name=other-place]', function() {
    if ($(this).is(":checked")) {
        $('#choose-other-place').removeClass('hidden');
        chooseOtherPlace = true;
    } else {
        $('#choose-other-place').addClass('hidden');
        chooseOtherPlace = false;
    }
})

function updateFinishPrice() {
    $('#total-price').text($('#cart-total').text() - $('#coupon-price').text())
}
function updateDiscount(percent) {
    var price = $('#cart-total').text()
    var discount = price * (percent / 100)
    $('#coupon-price').text(discount)
}

function checkout() {
    var check = true;
    if (chooseOtherPlace == true) {
        var street = $('input#street-input').val()
        var district = $('input#district-input').val()
        var city = $('input#city-input').val()
        if(street == "" || street == null || street == " ") {
            check = false;
        }
        if(district == "" || district == null || district == " ") {
            check = false;
        }
        if(city == "" || city == null || city == " ") {
            check = false;
        }
        if($('#total-price').text() == 0 || $('#total-price').text() == "NAN") {
            check = false;
        }
    } else {
        if($('#total-price').text() == 0 || $('#total-price').text() == "NAN") {
            check = false;
        }
    }
    return check;
}

$('#user-payment').on('click', function (e) {
    if(checkout()) {
        $('#payment-form input[name=street]').val($('input#street-input').val())
        $('#payment-form input[name=district]').val($('input#district-input').val())
        $('#payment-form input[name=city]').val($('input#city-input').val())
        $('#payment-form input[name=total]').val($('#total-price').text())
        $('#payment-form input[name=discount]').val($('#coupon-price').text())
        $('#payment-form input[name=method]').val($('input[name=paymentMethod]:checked').val())
    } else {
        e.preventDefault()
        Swal.fire({
            icon: 'error',
            title: 'Lỗi',
            text: 'Vui lòng chọn sản phẩm và nhập đầy đủ thông tin vị trí!',
        })
    }
})

$('#order-confirm').on('click', function (e) {
    var data = {
        'name' : $('span#cus-name').text(),
        'phone' : $('span#cus-phone').text(),
        'email' : $('span#cus-email').text(),
        'address' : $('span#cus-address').text(),
        'total' : $('span#cus-total').text(),
        'discount' : $('span#cus-discount').text(),
        'content' : $('#cus-content').text(),
    }
    $.ajax({
        type: "POST",
        url: "/add-order",
        data: {
            'data' : data
        },
        success: function (response) {
            if (response.status == true) {
                $('#order-confirm').addClass('hidden');
                $('#return-home').removeClass('hidden');
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: response.message,
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: response.message,
                })
            }
        }
    });
})
$('#return-home').on('click', function (e) {
    window.location.href = "/"
})
$('#cancel').on('click', function (e) {
    window.location.href = "/cart"
})

// =============================================================
//biến user-id
var orderID;
$('.btn-change').on('click', function() {
	//gán biến id cho giá trị cần thay đổi role
	orderID = $(this).attr('data-id');
})

$('#save-user').on('click', function() {
	let state = $('#state').val();
	$.ajax({ //call ajax để gửi data lên server
		url: '/admin/order/change-state',
		type : 'POST',
		data: {
			'state' : state,
			'orderID' : orderID
		},
	})
	.done(function(response) {
		// gửi thành công lên server
		if(response.status) { //nếu server trả về kết quả thành công
			$('#modal-id').modal('toggle');
			//thông báo thành công
			toastr.success(response.message);
			window.location.href = "order";
		} else { //nếu server trả về kết quả thất bại
			//thông báo thất bại
			toastr.error(response.message);
		}
	})
	.fail(function() { // gửi không thành công lên server
		//thông báo thất bại
		toastr.error(response.message);
	})
})