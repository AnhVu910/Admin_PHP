$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$('#update-info').on('click', function() {
	let url = $('input#url').val();
	let address = $('input#address').val();
	let email = $('input#email').val();
	let phone = $('input#phone').val();
    let content = $('#content').val();
	$.ajax({ //call ajax để gửi data lên server
		url: '/admin/update-system',
		type : 'POST',
		data: {
			url: url,
			address: address,
			email: email,
			phone: phone,
			content: content
		},
	})
	.done(function(response) {
		// gửi thành công lên server
		if(response.status) { //nếu server trả về kết quả thành công
			//thông báo thành công
			toastr.success(response.message);
			window.location.href = "";
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