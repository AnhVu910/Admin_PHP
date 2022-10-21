$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

// khi click vào button edit category
$('.btn-edit-class').on('click', function() {
	// lấy các thuộc tính của danh mục được gán trong thuộc tính của button edit
	let categoryID = $(this).attr('category-id')
	let categoryName = $(this).attr('name')
	let des = $(this).attr('des')
	// gán data của category vào modal chỉnh sửa category
	$('#class-modal input[name="categoryID"]').val(categoryID)
	$('#class-modal input[name="categoryName"]').val(categoryName)
	$('#class-modal input[name="categoryDes"]').val(des)
	$('#class-modal input[name="categoryFile"]').attr('required', false)
})

// khi click vào button delete
$('.btn-delete-class').on('click', function() {
    Swal.fire({
        title: 'Xác nhận xóa danh mục?',
        showCancelButton: true,
        confirmButtonText: `Xóa`,
        cancelButtonText: `Hủy`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            //lấy id danh mục để xóa
            let categoryID = $(this).attr('category-id')
            // dùng ajax để xóa class
            $.ajax({
                url: '/admin/category/delete',
                type: 'POST',
                data: {
                    categoryID: categoryID
                },
            })
            .done(function(response) {
                // gửi thành công lên server
                if(response.status) { //nếu server trả về kết quả thành công
                    //thông báo thành công
                    toastr.success(response.message);
                    window.setTimeout(function(){ window.location.href = "/admin/category"; }, 1000);
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