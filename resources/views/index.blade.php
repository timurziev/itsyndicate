<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>Itsyndicate</title>
    </head>
    <body>
        <div class="container">
            <form action="{{ route('search') }}" method="get" class="mt-3">
                <input type="text" name="search">
                <button type="submit" class="btn-success">Search</button>
            </form>

            @if(isset($images))
                @foreach($images as $image)
                    <img src="{{ $image['assets']['small_thumb']['url'] }}" alt="">
                @endforeach
            @endif

            <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data" class="mt-5">
                @csrf
                <input type="file" name="file">
                @if(isset($images))
                    @foreach($images as $image)
                        <input type="hidden" value="{{ $image['assets']['small_thumb']['url'] }}" name="images[]">
                    @endforeach
                @endif
                <button type="submit" class="btn btn-success" class="mt-3">Upload</button>
            </form>
        </div>
    </body>
</html>
