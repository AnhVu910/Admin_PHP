<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spipu\Html2Pdf\Tag\Svg\Rect;
use App\Mail\notificationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 1) {
            return redirect(route('customer'));
        }
        return redirect(route('user'));
        $info = System::where('id', 1)->first();
        return view('admin.system-info', ['info' => $info]);
    }

    public function forgotPass(Request $req)
    {
        // dd($req->all());
        try {
            // send mail to $req->email;
            $user = User::where('email', $req->email)->first();
            if ($user) {
                $data = [
                    'new_password' => 'Abcxyz123',
                ];
                $user->password = Hash::make($data['new_password']);
                $user->save();
                Mail::to($req->email)->send(new notificationMail($data));
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Email không tồn tại trong hệ thống"
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => "Mật khẩu mới đã được gửi vào email của bạn, vui lòng kiểm tra email !"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra, vui lòng thử lại !"
            ]);
        }
        
    }

    public function updateSystem(Request $req)
    {
        // lấy đối tượng
        $info = System::where('id', 1)->first();
        // update thông tin mới
        if(isset($req->url)) $info->url = $req->url;
        if(isset($req->address)) $info->address = $req->address;
        if(isset($req->email)) $info->email = $req->email;
        if(isset($req->phone)) $info->phone = $req->phone;
        if(isset($req->content)) $info->content = $req->content;
        // lưu lại thông tin
        if($info->save()) { //nếu update thành công
            //trả về thông báo thành công cho ajax
            return response()->json([
                'status' => true,
                'message' => "Cập nhật thông tin thành công !"
            ]);
        } else {
            // trả về thông báo thất bại cho ajax
            return response()->json([
                'status' => false,
                'message' => "Cập nhật thông tin thất bại !"
            ]);
        }
    }

    public function changePass(Request $req)
    {
        // dd($req->all());
        $user = Auth::user();
        $currentPassword = $user->password;
        // dd($currentPassword, Hash::make($req->current_password));
        // if (Hash::make($req->current_password) !== $currentPassword) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => "Mật khẩu hiện tại không đúng !"
        //     ]);
        // }
        if(!Hash::check($req->current_password, $currentPassword)){
            return response()->json([
                'status' => false,
                'message' => "Nhập lại mật khẩu chưa đúng !"
            ]);
        }
        if ($req->new_password !== $req->repeat_password) {
            return response()->json([
                'status' => false,
                'message' => "Nhập lại mật khẩu chưa đúng !"
            ]);
        }
        $user->password = Hash::make($req->new_password);
        if ($user->save()) {
            return response()->json([
                'status' => true,
                'message' => "Đổi mật khẩu thành công !"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Cập nhật mật khẩu thất bại !"
            ]);
        }
    }
}
