<html>

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h1>掲示板のテスト</h1>
    @foreach($boards as $board)
    <h3>{{ $board->title }}</h3>
    <p>{{ $board->content }}</p>
    @endforeach

</body>

</html>