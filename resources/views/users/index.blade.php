<!-- resources/views/users/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Quản lý tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Thanh điều hướng -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('user.products.index') }}">Shop</a>
                <a class="navbar-brand" href="{{ route('products.index') }}">Quản lý sản phẩm</a>
                <a class="navbar-brand" href="{{ route('users.index') }}">Quản lý tài khoản user</a>
                <div class="navbar-nav ms-auto">
                    @auth
                    <span class="nav-item nav-link">Xin chào, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="nav-item">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Đăng xuất</button>
                    </form>
                    @else
                    <a href="{{ route('login') }}" class="nav-link">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="nav-link">Đăng ký</a>
                    @endauth
                </div>
            </div>
        </nav>
        <h1>Quản lý tài khoản người dùng</h1>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Chỉnh sửa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Quay lại</a>
    </div>
</body>

</html>