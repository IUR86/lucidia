<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>契約相手</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="user">
    <x-counterparty.header />
    {{ $slot }}
    <x-counterparty.footer />
</body>
</html>