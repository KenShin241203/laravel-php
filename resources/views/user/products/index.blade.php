<!-- resources/views/user/products/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-image {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('products.index') }}">thegioididong Beta</a>
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
    <div class="container my-5">
        <h1 class="text-center mb-4">Danh sách sản phẩm</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
            <div class="col">
                <div class="card product-card h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: auto; height: auto;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-danger fw-bold">
                            {{ number_format($product->price, 0, ',', '.') }} VNĐ
                        </p>
                        <a href="{{ route('user.products.show', $product->id) }}"
                            class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>