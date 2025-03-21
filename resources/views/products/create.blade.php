<!DOCTYPE html>
<html>

<head>
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Thêm sản phẩm mới</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Mô tả</label>
                <textarea name="description" class="form-control"></textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mt-2">
                    <img id="imagePreview" src="" style="max-width: 150px; height: auto;">
                </div>
                <script>
                    document.getElementById('imageInput').addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        const preview = document.getElementById('imagePreview');
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                </script>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>