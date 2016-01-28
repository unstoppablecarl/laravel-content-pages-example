@extends('admin.layouts.base')

@section('page_title', 'Pages')

@section('content')

    <table class="table" style="width:auto">

        <thead>
        <tr>
            <th>Id</th>
            <th>Path</th>
            <th>Page Type</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)

            <tr>
                <th>{{$page->id}}</th>
                <td>{{$page->path}}</td>
                <td>{{$page->page_type}}</td>
                <td>
                    <a class="btn btn-default" href="{{action('Admin\PageType@update', $page)}}">Edit</a>
                    <a class="btn btn-default" href="{{action('Admin\PageType@delete', $page)}}">Delete</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <br>

    <a class="btn btn-default" href="{{action('Admin\Pages@selectPageType')}}">Create New Page</a>

@endsection
