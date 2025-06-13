<!DOCTYPE html>
<html>
<head>
    <title>Genres</title>
</head>
<body>
    <h1>List of Genres</h1>
    <ul>
        @foreach ($genres as $genre)
            <li>{{ $genre['id'] }} - {{ $genre['name'] }}</li>
            <li>{{ $genre['description'] }}</li>
        @endforeach
    </ul>
    <a href="/authors">View Authors</a>
    <a href="/books">View Books</a>
</body>
</html>
