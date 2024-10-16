<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Update User</h1>
        <form action="{{ route('update') }}" method="POST" class="form-group mt-3">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" value="{{ $user->password }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        <button class="btn btn-secondary" onclick="window.location.href='{{ route('index.User') }}'">View All Users</button>
        <button class="btn btn-secondary" onclick="window.location.href='{{ route('login') }}'">Go to Login</button>
    </div>
</body>
</html>
