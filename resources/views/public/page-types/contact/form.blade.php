@extends('public.layouts.base')


@section('page_title', 'Contact')


@section('content')

    {{$page->content}}
    
    <form method="POST" action="{{action('Contact@formPost')}}">

        <input type="hidden" name="_token" value="{{csrf_token()}}" />

        <label>Name</label>
        <input type="text" name="name" />

        <button type="submit">Submit</button>

    </form>
@endsection
