<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
    <title>{{ $pageTitle }}</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    @yield('customStyle')
    @yield('headerJs')
</head>
<body>
    @yield('body')
    @yield('footerJs')
</body>
</html>