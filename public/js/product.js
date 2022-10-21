$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

// khi click vào button edit category
$('.btn-edit-class').on('click', function() {
	// lấy các thuộc tính của danh mục được gán trong thuộc tính của button edit
	let productID = $(this).attr('product-id')
	let name = $(this).attr('name')
	let des = $(this).attr('des')
	let price = $(this).attr('price')
	let quantity = $(this).attr('quantity')
	let brandID = $(this).attr('brand-id')
    let categoryArr = $(this).attr('category-id')
    let arr = categoryArr.split(",")
	// gán data của category vào modal chỉnh sửa category
	$('#class-modal input[name="productID"]').val(productID)
	$('#class-modal input[name="productName"]').val(name)
	$('#class-modal textarea[name="productDes"]').val(des)
    $('#class-modal input[name="quantity"]').val(quantity)
    $('#class-modal select[name="brandID"]').val(brandID)
	$('#class-modal input[name="price"]').val(price)
    $('#class-modal input[name="productFile"]').attr('required', false)
    $.each(arr, function(index) {
        $('#class-modal input[value="'+ arr[index] +'"]').prop('checked', true)
    })
})

$('.btn-add-quantity').on('click', function() {
	// lấy các thuộc tính của danh mục được gán trong thuộc tính của button edit
	let productID = $(this).attr('product-id')
	// gán data của category vào modal chỉnh sửa category
	$('#class-modal-1 input[name="productID"]').val(productID)
})

// khi click vào button delete
$('.btn-delete-class').on('click', function() {
    Swal.fire({
        title: 'Xác nhận xóa sản phẩm?',
        showCancelButton: true,
        confirmButtonText: `Xóa`,
        cancelButtonText: `Hủy`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            //lấy id danh mục để xóa
            let productID = $(this).attr('product-id')
            // dùng ajax để xóa class
            $.ajax({
                url: '/admin/product/delete',
                type: 'POST',
                data: {
                    productID: productID
                },
            })
            .done(function(response) {
                // gửi thành công lên server
                if(response.status) { //nếu server trả về kết quả thành công
                    //thông báo thành công
                    toastr.success(response.message);
                    window.setTimeout(function(){ window.location.href = "/admin/product"; }, 1000);
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