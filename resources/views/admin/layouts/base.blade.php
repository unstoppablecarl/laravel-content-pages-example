<!DOCTYPE html>
<html>
<head>
    <title>Pages Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <br>
    <ol class="breadcrumb">
        @section('breadcrumbs')
            <li><a href="{{action('Admin\Pages@index')}}">Pages</a></li>
        @show
    </ol>

    <h2>
        @yield('page_title', 'Page Title')
    </h2>

    @section('page_subheading')
        @if(isset($pageType))
        <h4>
            Page Type: <span class="text-muted">{{$pageType}}</span>
        </h4>
        @endif
    @show

    <hr>
    @yield('content')
</div>
</body>
</html>
