<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Yêu cầu đăng nhập cho tất cả phương thức
    }

    // Hiển thị danh sách người dùng có role user hoặc employee
    public function index()
    {
        $users = User::whereIn('role', ['user', 'employee'])->get();
        return view('users.index', compact('users'));
    }

    // Hiển thị form chỉnh sửa role
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Cập nhật role
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,employee',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Role đã được cập nhật!');
    }
}
