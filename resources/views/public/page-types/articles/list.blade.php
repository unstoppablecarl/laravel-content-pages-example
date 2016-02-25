@extends('public.layouts.base')


@section('page_title', 'Articles List')


@section('content')

    {{array_get($page->meta, 'content_before_list')}}

<ul>

    @foreach($articles as $article)
<li>
        <a href="{{page_route($page, 'single', $article['id'])}}">{{$article['title']}}</a>
</li>
    @endforeach

</ul>

    {{array_get($page->meta, 'content_after_list')}}

@endsection
