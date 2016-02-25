<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle }}</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    @yield('customStyle')
    @yield('headerJs')
</head>
<body>
    @yield('body')
</body>
    @yield('footerJs')
</html>