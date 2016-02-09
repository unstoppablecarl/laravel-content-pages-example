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

    @if(count($errors))

        <div class="alert alert-danger">
            <h4>Errors</h4>
            <ul>
                @foreach($errors->all('<li><strong>:key</strong> :message</li>') as $message)
                    {!! $message !!}
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>
</body>
</html>
