<!DOCTYPE html>
<html>

<head>
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
            </div>
            <div class="mb-3">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                <div class="mt-2">
                    <img id="imagePreview"
                        src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}"
                        alt="{{ $product->name }}"
                        style="max-width: 150px; height: auto;">
                </div>
                <script>
                    // JavaScript để preview ảnh khi chọn file mới
                    document.getElementById('imageInput').addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        const preview = document.getElementById('imagePreview');

                        if (file) {
                            // Đọc file và hiển thị preview
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        } else {
                            // Nếu không chọn file mới, giữ ảnh cũ
                            preview.src = "{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/150' }}";
                        }
                    });
                </script>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>