<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus maxlength="20"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Mật khẩu" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" maxlength="15"/>
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" id="btn-forgot">
                        {{ __('Quên mật khẩu?') }}
                    </a>
                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a> --}}
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Đăng nhập hệ thống') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>

    <div class="modal fade" id="modal-forgot">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              {{-- <h4 class="modal-title">Quên mật khẩu</h4> --}}
            </div>
            <div class="modal-body">
             <form method="POST" id="forgot-form" action={{ route('forgot-password') }}>
              @csrf
                <div class="form-group">
                    <label for="">Nhập địa chỉ email để nhận mật khẩu mới</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
             </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-save" id="btn-confirm">Nhận mật khẩu mới qua email này</button>
            </div>
          </div>
        </div>
      </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('../js/toastr.min.js')}}"></script>
    <script>
        $('#btn-forgot').click(function() {
            $('#modal-forgot').modal('toggle');
        })
        $('#btn-confirm').click(function() {
            // $('#modal-forgot').modal('toggle');

            $.ajax({ //call ajax để gửi data lên server
                url: $('#forgot-form').attr('action'),
                type : 'POST',
                data: {
                    email : $('#forgot-form input[name=email]').val(),
                    _token : $('#forgot-form input[name=_token]').val()
                },
            })
            .done(function(response) {
                // gửi thành công lên server
                if(response.status) { //nếu server trả về kết quả thành công
                    $('#modal-forgot').modal('toggle');
                    //thông báo thành công
                    alert(response.message);
                } else { //nếu server trả về kết quả thất bại
                    //thông báo thất bại
                    alert(response.message);
                }
            })
            .fail(function() { // gửi không thành công lên server
                //thông báo thất bại
                // toastr.error(response.message);
            })
        })
    </script>
</x-guest-layout>
