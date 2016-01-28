@extends('admin.layouts.base')

@section('breadcrumbs')
    @parent
    <li><a href="{{action('Admin\PageType@create', $page)}}">Create</a></li>
@append

@section('page_title', 'Create Page')


@section('content')

    @include('admin.page-types.basic.form', [
    'action' => action('Admin\PageType@createPost', $pageType),
    'submitBtn' => 'Create'
    ])




@endsection
