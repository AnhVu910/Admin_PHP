<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        $users = User::select('id', 'name', 'email', 'role')->whereIn('role', [1,2])->orderBy('role', 'ASC')->get();
        return view('admin.user', ['users' => $users]);
    }

    public function customerList()
    {
        $users = User::select('*')->whereIn('role', [3])->orderBy('role', 'ASC')->get();
        return view('admin.customer', ['users' => $users]);
    }

    public function changeRole(Request $req)
    {
        //lấy đối tượng cần phân quyền
        $user = User::where('id', $req->user)->first();
        // cập nhật quyền mới
        $user->role = $req->role;
        // lưu lại thông tin
        if($user->save()) { //nếu update role thành công
            //trả về thông báo thành công cho ajax
            return response()->json([
                'status' => true,
                'message' => "Phân quyền thành công !"
            ]);
        } else {
            // trả về thông báo thất bại cho ajax
            return response()->json([
                'status' => false,
                'message' => "Phân quyền thất bại !"
            ]);
        }
    }

    public function delete(Request $req)
    {
        $user = User::where('id', $req->userID)->first();
        if(isset($user->id)) {
            User::where('id', $req->userID)->delete();
            return response()->json([
                'status' => true,
                'message' => "Xóa người dùng thành công !"
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => "Xóa người dùng thất bại !"
            ]);
        }
    }

    public function edit(Request $req)
    {
        // dd($req->all());
        $user = User::where('id', $req->user_id)->first();
        if (isset($req->password) && !empty($req->password)) {
            $user->password = Hash::make($req->password);
        }
        $user->name = $req->name;
        $user->role = $req->role;
        if ($user->save()) {
            return response()->json([
                'status' => true,
                'message' => "Cập nhật thành công !"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Cập nhật thất bại !"
            ]);
        }
    }
    public function customerEdit(Request $req)
    {
        $user = User::where('id', $req->user_id)->first();
        $user->name = $req->name;
        $user->address = $req->address;
        $user->identify_code = $req->identify_code;
        $user->customer_note = $req->customer_note;
        if ($user->save()) {
            return response()->json([
                'status' => true,
                'message' => "Cập nhật thành công !"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Cập nhật thất bại !"
            ]);
        }
    }
    public function add(Request $req)
    {
        // dd($req->all());
        $user1 = User::where('email', $req->email)->first();
        if ($user1) {
            return response()->json([
                'status' => false,
                'message' => "Người dùng đã tồn tại !"
            ]);
        }
        $user = [
            'name' => $req->name,
            'email' => $req->email,
            'role' => $req->role,
            'password' => Hash::make($req->password),
        ];
        if (User::create($user)) {
            return response()->json([
                'status' => true,
                'message' => "Thêm mới thành công !"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Thanh mới thất bại !"
            ]);
        }
    }
    public function customerAdd(Request $req)
    {
        $user1 = User::where('email', $req->email)->first();
        if ($user1) {
            return response()->json([
                'status' => false,
                'message' => "Khách hàng đã tồn tại !"
            ]);
        }
        $user = [
            'name' => $req->name,
            'email' => $req->email,
            'role' => 3,
            'password' => Hash::make(12345678),
            'address' => $req->address,
            'customer_note' => $req->customer_note,
            'identify_code' => $req->identify_code,
            // 'customer_code' => Hash::make(12345678),
        ];
        $newUser = User::create($user);
        if ($newUser) {
            $newUser->customer_code = "KH" . $newUser->id;
            $newUser->save();
            return response()->json([
                'status' => true,
                'message' => "Thêm mới thành công !"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Thanh mới thất bại !"
            ]);
        }
    }
}
