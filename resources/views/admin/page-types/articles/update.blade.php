@extends('admin.page-types.basic.update')

@section('content')

    @include('admin.page-types.articles.form', [
    'action' => action('Admin\PageType@updatePost', $page),
    'submitBtn' => 'Update'
    ])

    <hr>
    <a class="btn btn-danger" href="{{action('Admin\PageType@delete', $page)}}">Delete This Page</a>
@endsection
