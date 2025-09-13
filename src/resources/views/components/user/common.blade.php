<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザ</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="user">
    <x-user.header />
    {{ $slot }}
    <x-user.footer />
</body>
</html>