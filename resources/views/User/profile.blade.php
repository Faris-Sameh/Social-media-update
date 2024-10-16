<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">User Profile</h1>

        <!-- User Info Table -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Post Section -->
        <h2>Posts:</h2>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $post->image }}" class="card-img-top" alt="Post Image" style="max-height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <p class="card-text"><small>Created on: {{ $post->created_at }}</small></p>
                            <form action="{{ route('delete.post', $post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Buttons -->
        <div class="text-center mt-4">
            <button class="btn btn-primary" onclick="window.location.href='{{ route('posts.create') }}'">Create Post</button>
            <button class="btn btn-secondary" onclick="window.location.href='{{ route('create') }}'">Register</button>
        </div>
    </div>
</body>
</html>
