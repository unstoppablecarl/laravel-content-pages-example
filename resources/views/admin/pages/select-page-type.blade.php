@extends('admin.layouts.base')

@section('page_title', 'Create Page')

@section('content')
    <h3>Select Page Type</h3>

    <ul class="list-group">
    @foreach($pageTypes as $type => $d)

        <li class="list-group-item"><a href="{{action('Admin\PageType@create', $type)}}">{{$type}}</a></li>


    @endforeach
    </ul>

@endsection
