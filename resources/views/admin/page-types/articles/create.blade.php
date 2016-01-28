@extends('admin.page-types.basic.create')

@section('content')

    @include('admin.page-types.basic.form', [
    'action' => action('Admin\PageType@createPost', $pageType),
    'submitBtn' => 'Create'
    ])




@endsection
