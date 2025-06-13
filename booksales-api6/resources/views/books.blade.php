<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>
<body>
    <h1>List of Books</h1>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book['title'] }}</li>
        @endforeach
    </ul>
    <a href="/genres">View Genres</a>
    <a href="/books">View Books</a>
</body>
</html>