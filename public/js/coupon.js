$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

// khi click vào button edit brand
$('.btn-edit-class').on('click', function() {
	// lấy các thuộc tính của nhãn hiệu được gán trong thuộc tính của button edit
	let couponID = $(this).attr('coupon-id')
	let code = $(this).attr('code')
	let des = $(this).attr('des')
	let percent = $(this).attr('percent')
	let quantity = $(this).attr('quantity')
	let start = $(this).attr('start')
	let expired = $(this).attr('expired')
	// gán data của brand vào modal chỉnh sửa brand
	$('#class-modal input[name="couponID"]').val(couponID)
	$('#class-modal input[name="couponCode"]').val(code)
	$('#class-modal input[name="couponDes"]').val(des)
	$('#class-modal input[name="percent"]').val(percent)
	$('#class-modal input[name="quantity"]').val(quantity)
	$('#class-modal input[name="start"]').val(start)
	$('#class-modal input[name="expired"]').val(expired)
})

// khi click vào button delete
$('.btn-delete-class').on('click', function() {
    Swal.fire({
        title: 'Xác nhận xóa mã giảm giá?',
        showCancelButton: true,
        confirmButtonText: `Xóa`,
        cancelButtonText: `Hủy`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            //lấy id danh mục để xóa
            let couponID = $(this).attr('coupon-id')
            // dùng ajax để xóa class
            $.ajax({
                url: '/admin/coupon/delete',
                type: 'POST',
                data: {
                    couponID: couponID
                },
            })
            .done(function(response) {
                // gửi thành công lên server
                if(response.status) { //nếu server trả về kết quả thành công
                    //thông báo thành công
                    toastr.success(response.message);
                    window.setTimeout(function(){ window.location.href = "/admin/coupon"; }, 1000);
                } else { //nếu server trả về kết quả thất bại
                    //thông báo thất bại
                    toastr.error(response.message);
                }
            })
            .fail(function() {
                //thông báo thất bại
                toastr.error(response.message);
            })
        }
    })
	
})