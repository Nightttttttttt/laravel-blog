<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article Detail</title>
</head>

<body>
    @extends('layouts.app')
    @section('content')



        <div class="container">
            @if (session('info'))
                <div class="alert alert-info alert-dismissible fade-show">{{ session('info') }}
                    <div class="close" data-dismiss="alert">&times;</div>
                </div>
            @endif

            <div class="card mb-2">
                <div class="card-body">
                    <div class="card-title h5">
                        {{ $article->title }}
                    </div>
                    <div class="card-subtitle text-muted small">
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                    <div class="card-text h6" style="line-height: 2;white-space:pre-line;">
                        {{ $article->body }}
                    </div>
                    <a class="btn btn-danger mt-2" href="{{ url("/articles/delete/$article->id") }}">Delete</a>
                </div>
            </div>

            <ul class="list-group mb-2">
                <li class="list-group-item active">
                    Comments({{ count($article->comments) }})
                </li>

                @foreach ($article->comments as $comment)
                    <li class="list-group-item">{{ $comment->content }}
                        <a href="{{ url("/comments/delete/$comment->id") }}" class="close">&times;</a>
                        <div class="small">By {{ $comment->user->name }}, {{ $comment->created_at->diffForHumans() }}</div>
                    </li>
                @endforeach
            </ul>

            @auth
                <form action="{{ url('/comments/add') }}" method="post">
                    @csrf
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <textarea name="content" cols="30" rows="3" class="form-control mb-2"
                        placeholder="Enter your comment here"></textarea>
                    <input type="submit" value="Post Comment" class="btn btn-secondary">
                </form>
            @endauth


        </div>

    @endsection

</body>

</html>
