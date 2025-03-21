<!-- resources/views/user/products/show.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Container chính */
        .product-detail-container {
            max-width: 1200px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        /* Ảnh sản phẩm */
        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
        }

        /* Tiêu đề sản phẩm */
        .product-title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        /* Giá sản phẩm */
        .product-price {
            font-size: 1.75rem;
            font-weight: 600;
            color: #dc3545;
            /* Màu đỏ của Bootstrap */
            margin-bottom: 15px;
        }

        /* Mô tả */
        .product-description {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Nút quay lại */
        .btn-back {
            background-color: #6c757d;
            /* Màu xám của Bootstrap */
            border: none;
            padding: 10px 20px;
            font-size: 0.8rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            /* Màu xám của Bootstrap */
            border: none;
            padding: 10px 20px;
            font-size: 0.8rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <div class="container my-5 product-detail-container">

        <div class="row">
            <div class="col-md-6">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400x300' }}"
                    class="product-image"
                    alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h1 class="product-title">{{ $product->name }}</h1>
                <h3 class="product-price">{{ number_format($product->price, 0, ',', '.') }} VNĐ</h3>
                <p class="product-description">{{ $product->description ?? 'Chưa có mô tả' }}</p>
                <a href="#" class="btn btn-primary ">Mua hàng</a>
                <a href="{{ route('user.products.index') }}" class="btn btn-back">Quay lại</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>