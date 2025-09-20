<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理</title>
    @vite(['resources/scss/app.scss', 'resources/js/app/admin.js'])
</head>
<body class="admin">
    <x-admin.header />
    {{ $slot }}
</body>
</html>