<!DOCTYPE html>
<html>
<head>
    <title>Authors</title>
</head>
<body>
    <h1>List of Authors</h1>
    <ul>
        @foreach ($authors as $author)
            <li>{{ $author['id'] }} - {{ $author['name'] }}</li>
            <li>{{ $author['email'] }}</li>
        @endforeach
    </ul>
    <a href="/genres">View Genres</a>
    <a href="/books">View Books</a>
</body>
</html>
