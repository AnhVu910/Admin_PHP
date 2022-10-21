$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

//biến user-id
var userID;
$('.btn-change').on('click', function() {
	//gán biến id cho giá trị cần thay đổi role
	userID = $(this).attr('data-id');
})

$('.btn-edit').on('click', function() {
	var data = JSON.parse($(this).attr('data-user'));
	$modal = $('#modal-edit')
	$('#modal-edit input[name=name]').val(data.name)
	$('#modal-edit input[name=user_id]').val(data.id)
	$('#modal-edit input[name=email]').val(data.email)
	$('#modal-edit select[name=role]').val(data.role)

	$modal.modal("toggle")
})
$('.btn-edit-customer').on('click', function() {
	var data = JSON.parse($(this).attr('data-user'));
	$modal = $('#modal-edit-customer')
	$('#modal-edit-customer input[name=name]').val(data.name)
	$('#modal-edit-customer input[name=user_id]').val(data.id)
	$('#modal-edit-customer input[name=email]').val(data.email)
	$('#modal-edit-customer input[name=address]').val(data.address)
	$('#modal-edit-customer input[name=identify_code]').val(data.identify_code)
	$('#modal-edit-customer textarea[name=customer_note]').val(data.customer_note)

	$modal.modal("toggle")
})
$('#btn-add-user').on('click', function() {
	$modal = $('#modal-add')

	$modal.modal("toggle")
})
$('#btn-add-customer').on('click', function() {
	$modal = $('#modal-add-customer')

	$modal.modal("toggle")
})
$('#save-user-edit').on('click', function() {
	// $('#edit-form').submit()
	$.ajax({ //call ajax để gửi data lên server
		url: $('#edit-form').attr('action'),
		type : 'POST',
		data: {
			role: $('#modal-edit select[name=role]').val(),
			name: $('#modal-edit input[name=name]').val(),
			password: $('#modal-edit input[name=password]').val(),
			user_id: $('#modal-edit input[name=user_id]').val(),
		},
	})
	.done(function(response) {
		// gửi thành công lên server
		if(response.status) { //nếu server trả về kết quả thành công
			$('#modal-edit').modal('toggle');
			//thông báo thành công
			toastr.success(response.message);
			window.setTimeout(function() {
				window.location.href = "user";
			}, 2000)
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
$('#save-customer-edit').on('click', function() {
	// $('#edit-form').submit()
	$.ajax({ //call ajax để gửi data lên server
		url: $('#edit-form-customer').attr('action'),
		type : 'POST',
		data: {
			name : $('#modal-edit-customer input[name=name]').val(),
			user_id : $('#modal-edit-customer input[name=user_id]').val(),
			address : $('#modal-edit-customer input[name=address]').val(),
			identify_code : $('#modal-edit-customer input[name=identify_code]').val(),
			customer_note : $('#modal-edit-customer textarea[name=customer_note]').val(),
		},
	})
	.done(function(response) {
		// gửi thành công lên server
		if(response.status) { //nếu server trả về kết quả thành công
			$('#modal-edit-customer').modal('toggle');
			//thông báo thành công
			toastr.success(response.message);
			window.setTimeout(function() {
				window.location.href = "customer";
			}, 2000)
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

$('#store-user').on('click', function() {
	// $('#edit-form').submit()
	$.ajax({ //call ajax để gửi data lên server
		url: $('#add-form').attr('action'),
		type : 'POST',
		data: {
			role: $('#modal-add select[name=role]').val(),
			name: $('#modal-add input[name=name]').val(),
			email: $('#modal-add input[name=email]').val(),
			password: $('#modal-add input[name=password]').val(),
			user_id: $('#modal-add input[name=user_id]').val(),
		},
	})
	.done(function(response) {
		// gửi thành công lên server
		if(response.status) { //nếu server trả về kết quả thành công
			$('#modal-add').modal('toggle');
			//thông báo thành công
			toastr.success(response.message);
			window.setTimeout(function() {
				window.location.href = "user";
			}, 2000)
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
$('#store-customer').on('click', function() {
	// $('#edit-form').submit()
	$.ajax({ //call ajax để gửi data lên server
		url: $('#add-form-customer').attr('action'),
		type : 'POST',
		data: {
			name: $('#modal-add-customer input[name=name]').val(),
			email: $('#modal-add-customer input[name=email]').val(),
			address: $('#modal-add-customer input[name=address]').val(),
			identify_code: $('#modal-add-customer input[name=identify_code]').val(),
			customer_note: $('#modal-add-customer textarea[name=customer_note]').val(),
		},
	})
	.done(function(response) {
		// gửi thành công lên server
		if(response.status) { //nếu server trả về kết quả thành công
			$('#modal-add-customer').modal('toggle');
			//thông báo thành công
			toastr.success(response.message);
			window.setTimeout(function() {
				window.location.href = "customer";
			}, 2000)
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



$('#save-user').on('click', function() {
	let role = $('#state').val();
	$.ajax({ //call ajax để gửi data lên server
		url: '/admin/user/role',
		type : 'POST',
		data: {
			role: role,
			user: userID
		},
	})
	.done(function(response) {
		// gửi thành công lên server
		if(response.status) { //nếu server trả về kết quả thành công
			$('#modal-id').modal('toggle');
			//thông báo thành công
			toastr.success(response.message);
			window.location.href = "user";
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

$('.delete-user').on('click', function() {
	var userID = $(this).attr('data-id');
	Swal.fire({
		title: 'Bạn chắc chắn xóa người dùng',
		showCancelButton: true,
		confirmButtonText: `Xóa`,
		cancelButtonText: `Huỷ`,
	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			$.ajax({ //call ajax để gửi data lên server
				url: '/admin/user/delete',
				type : 'POST',
				data: {
					userID: userID
				},
			})
			.done(function(response) {
				// gửi thành công lên server
				if(response.status) { //nếu server trả về kết quả thành công
					//thông báo thành công
					toastr.success(response.message);
					// Swal.fire('ĐÃ xóa!', '', 'success')
					window.location.href = "user";
				} else { //nếu server trả về kết quả thất bại
					//thông báo thất bại
					toastr.error(response.message);
				}
			})
			.fail(function() { // gửi không thành công lên server
				//thông báo thất bại
				toastr.error(response.message);
			})
		  	
		}
	})
	// let role = $('#state').val();
	// $.ajax({ //call ajax để gửi data lên server
	// 	url: '/admin/user/role',
	// 	type : 'POST',
	// 	data: {
	// 		role: role,
	// 		user: userID
	// 	},
	// })
	// .done(function(response) {
	// 	// gửi thành công lên server
	// 	if(response.status) { //nếu server trả về kết quả thành công
	// 		$('#modal-id').modal('toggle');
	// 		//thông báo thành công
	// 		toastr.success(response.message);
	// 		window.location.href = "user";
	// 	} else { //nếu server trả về kết quả thất bại
	// 		//thông báo thất bại
	// 		toastr.error(response.message);
	// 	}
	// })
	// .fail(function() { // gửi không thành công lên server
	// 	//thông báo thất bại
	// 	toastr.error(response.message);
	// })
})
$('.delete-customer').on('click', function() {
	var userID = $(this).attr('data-id');
	Swal.fire({
		title: 'Bạn chắc chắn xóa người dùng',
		showCancelButton: true,
		confirmButtonText: `Xóa`,
		cancelButtonText: `Huỷ`,
	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			$.ajax({ //call ajax để gửi data lên server
				url: '/admin/user/delete',
				type : 'POST',
				data: {
					userID: userID
				},
			})
			.done(function(response) {
				// gửi thành công lên server
				if(response.status) { //nếu server trả về kết quả thành công
					//thông báo thành công
					toastr.success(response.message);
					// Swal.fire('ĐÃ xóa!', '', 'success')
					window.location.href = "customer";
				} else { //nếu server trả về kết quả thất bại
					//thông báo thất bại
					toastr.error(response.message);
				}
			})
			.fail(function() { // gửi không thành công lên server
				//thông báo thất bại
				toastr.error(response.message);
			})
		  	
		}
	})
	// let role = $('#state').val();
	// $.ajax({ //call ajax để gửi data lên server
	// 	url: '/admin/user/role',
	// 	type : 'POST',
	// 	data: {
	// 		role: role,
	// 		user: userID
	// 	},
	// })
	// .done(function(response) {
	// 	// gửi thành công lên server
	// 	if(response.status) { //nếu server trả về kết quả thành công
	// 		$('#modal-id').modal('toggle');
	// 		//thông báo thành công
	// 		toastr.success(response.message);
	// 		window.location.href = "user";
	// 	} else { //nếu server trả về kết quả thất bại
	// 		//thông báo thất bại
	// 		toastr.error(response.message);
	// 	}
	// })
	// .fail(function() { // gửi không thành công lên server
	// 	//thông báo thất bại
	// 	toastr.error(response.message);
	// })
})