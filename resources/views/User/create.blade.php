<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Register</h1>
        <form action="{{ route('store') }}" method="POST" class="form-group mt-3">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <br>
        <button class="btn btn-secondary" onclick="window.location.href='{{ route('index.User') }}'">View All Users</button>
        <button class="btn btn-secondary" onclick="window.location.href='{{ route('login') }}'">Go to Login</button>
        @if (Auth::check())
        <p>Logged in as {{ Auth::user()->name }}.</p>
        <a href="{{ route('posts.create') }}" class="btn btn-info">View Posts</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-2">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        @endif
    </div>
</body>
</html>
