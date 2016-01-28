<!DOCTYPE html>
<html>
<head>
    <title>Pages Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">

    <h2>
        @yield('page_title', 'Page Title')
    </h2>
    <hr>
    @yield('content')
</div>
</body>
</html>
