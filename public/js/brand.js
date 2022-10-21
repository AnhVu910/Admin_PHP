$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

// khi click vào button edit brand
$('.btn-edit-class').on('click', function() {
	// lấy các thuộc tính của nhãn hiệu được gán trong thuộc tính của button edit
	let brandID = $(this).attr('brand-id')
	let brandName = $(this).attr('name')
	let des = $(this).attr('des')
	// gán data của brand vào modal chỉnh sửa brand
	$('#class-modal input[name="brandID"]').val(brandID)
	$('#class-modal input[name="brandName"]').val(brandName)
	$('#class-modal input[name="brandDes"]').val(des)
})

// khi click vào button delete
$('.btn-delete-class').on('click', function() {
    Swal.fire({
        title: 'Xác nhận xóa nhãn hiệu?',
        showCancelButton: true,
        confirmButtonText: `Xóa`,
        cancelButtonText: `Hủy`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            //lấy id danh mục để xóa
            let brandID = $(this).attr('brand-id')
            // dùng ajax để xóa class
            $.ajax({
                url: '/admin/brand/delete',
                type: 'POST',
                data: {
                    brandID: brandID
                },
            })
            .done(function(response) {
                // gửi thành công lên server
                if(response.status) { //nếu server trả về kết quả thành công
                    //thông báo thành công
                    toastr.success(response.message);
                    window.setTimeout(function(){ window.location.href = "/admin/brand"; }, 1000);
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