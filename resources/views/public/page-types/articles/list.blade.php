@extends('public.layouts.base')


@section('page_title', 'Articles List')


@section('content')
<ul>

    @foreach($articles as $article)
<li>

        <a href="{{action('Articles@single', $article['id'])}}">{{$article['title']}}</a>
</li>
    @endforeach

</ul>



@endsection
