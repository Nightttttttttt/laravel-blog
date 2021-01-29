<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Article</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container">

            @if ($errors -> any())
                <div class="alert-warning">
                    <ol>
                        @foreach ($errors -> all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
            <form method="post">
                @csrf
                <div class="form-group">
                    <label class="h5">Article Title</label>
                    <input type="text" class="form-control" name="title" >
                </div>
                <div class="form-group">
                  <label class="h5">Article Body</label>
                  <textarea class="form-control" name="body"></textarea>
                </div>
                <div class="form-group">
                  <label class="h5">Category</label>
                  <select class="form-control" name="category_id">
                      @foreach ($categories as $category)
                      <option value="{{ $category['id']}}"> {{ $category['name']}} </option>
                      @endforeach
                  </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Post Article">
            </form>
        </div>
    @endsection
</body>

</html>
