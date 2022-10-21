$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

$(document).on('click', 'button#update-info', function() {
    var address = $('input#address').val()
    var city = $('input#city').val()
    var phone = $('input#phone').val()
    var name = $('input#name').val()
    if (validate(name, address, city, phone) == true) {
        $.ajax({
            type: "POST",
            url: "/user-info/update",
            data: {
                'address' : address,
                'name' : name,
                'city' : city,
                'phone' : phone
            },
            success: function (response) {
                if (response.status == true) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Đã lưu thông tin !',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi !',
                        text: 'Vui lòng nhập đầy đủ thông tin!'
                    })
                }
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Lỗi !',
            text: 'Vui lòng nhập đầy đủ thông tin!'
        })
    }
})

function validate(name, address, city, phone) {
    var check = true;
    if (name == "" || name == " " || name == null) {
        check = false
    }
    if (address == "" || address == " " || address == null) {
        check = false
    }
    if (city == "" || city == " " || city == null) {
        check = false
    }
    if (phone == "" || phone == " " || phone == null) {
        check = false
    }
    return check;
}