<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Create a Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="form-group mt-3">
            @csrf
            <div class="form-group">
                <input type="file" class="form-control" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
            <a href="{{ route('view.profile', ['id' => auth()->id()]) }}" class="btn btn-info">View Profile</a>
        </form>
        <h2 class="mt-5">Recent Posts</h2>
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="list-group-item">
                    <strong>{{ $post->user->name }}</strong> <br>
                    <span>Posted at {{ $post->created_at->format('H:i:s d-m-Y') }}</span>
                    <br>
                    <img src="{{ $post->image }}" alt="Post Image" class="img-fluid" style="max-width: 500px;">
                    <span>Likes: {{ $post->likeCount() }}</span>
                    <form action="{{ route('like.post', $post->id) }}" method="POST" class="mt-2">
                        @csrf
                        @if($post->likes->where('user_id', auth()->id())->count())
                            <button type="submit" class="btn btn-danger">Dislike</button>
                        @else
                            <button type="submit" class="btn btn-success">Like</button>
                        @endif
                    </form>
                    @if (auth()->id() == $post->user_id)
                    <form action="{{ route('delete.post', $post->id ) }}" method="post" class="mt-2">
                    @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
