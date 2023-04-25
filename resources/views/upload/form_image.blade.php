<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Upload</title>
    </head>
    <body>
        <form action="{{ route('upload_image') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <button type="submit">Enviar</button>
        </form>

<br><br><br>
        @if ($images)
            @foreach ($images as $image)
                <img src="{{ url('storage/' . $image->path) }}" alt="{{ $image->filename }}"><br>
            @endforeach
        @endif
    </body>
</html>