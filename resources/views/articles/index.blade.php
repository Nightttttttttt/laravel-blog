<!DOCTYPE html>
<html>

<head>
    <title>Article List</title>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <div class="container">

            @if (session('info'))
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				{{session('info')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>

            @endif
            {{ $articles->links() }}
            @foreach ($articles as $article)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="card-title h5">
                            {{ $article->title }}
                        </div>
                        <div class="card-subtitle h7 text-muted">
                            {{ $article->created_at->diffForHumans() }}
                        </div>
                        <div class="card-text p" style="line-height: 2;white-space:pre-line;">
                            {{ \Illuminate\Support\Str::limit($article->body, 200, $end = '...') }}
                        </div>
                        <a class=" card-link" href="{{ url("/articles/detail/$article->id") }}">See More</a>
                    </div>
                </div>
            @endforeach
        </div>

    @endsection
</body>

</html>
