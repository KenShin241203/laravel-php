<!DOCTYPE html>
<html>

<head>
    <title>Danh sách sản phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Thanh điều hướng -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('products.index') }}">Quản lý sản phẩm</a>
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

        <h1>Danh sách sản phẩm</h1>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @auth
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        @endauth
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @auth
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                        @endauth
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>