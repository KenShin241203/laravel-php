<!-- resources/views/users/edit.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Chỉnh sửa Role - {{ $user->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Chỉnh sửa Role cho {{ $user->name }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Email</label>
                <input type="text" class="form-control" value="{{ $user->email }}" disabled>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>