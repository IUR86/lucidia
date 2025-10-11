<!DOCTYPE html>
<html lang="jp">
<head>
    <x-user.meta :meta_service="$metaService" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/scss/app.scss', 'resources/js/app/user.js'])
</head>
<body class="user">
    <x-user.header />
    {{ $slot }}
    <x-user.footer />
    <x-common.layout.loader />
</body>
</html>