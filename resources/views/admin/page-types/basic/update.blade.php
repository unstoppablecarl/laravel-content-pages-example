@extends('admin.layouts.base')

@section('breadcrumbs')
    @parent
    <li><a href="{{action('Admin\PageType@update', $page)}}">Update</a></li>
@append

@section('page_title', 'Update Page #' . $page->id)


@section('content')

    @include('admin.page-types.basic.form', [
    'action' => action('Admin\PageType@updatePost', $page),
    'submitBtn' => 'Update'
    ])

    <hr>
    <a class="btn btn-danger" href="{{action('Admin\PageType@delete', $page)}}">Delete This Page</a>

@endsection
