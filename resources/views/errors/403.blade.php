<!DOCTYPE html>
<html>

<head>
    <title>403 - Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-danger">403 - Forbidden</h1>
        <p>Bạn không có quyền truy cập trang này.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Quay lại đăng nhập</a>
    </div>
</body>

</html>