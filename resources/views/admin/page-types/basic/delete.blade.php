@extends('admin.layouts.base')

@section('breadcrumbs')
    @parent
    <li><a href="{{action('Admin\PageType@delete', $page)}}">Delete</a></li>
@append

@section('page_title', 'Delete Page #' . $page->id)

@section('content')

    <form method="post" action="{{action('Admin\PageType@deletePost', $page)}}" class="form">
        <h4>Are you sure you want to delete Page #{{$page->id}}</h4>

        <table class="table" style="width:auto">
            <tbody>
            <tr>
                <th>Id</th>
                <td>{{$page->id}}</td>
            </tr>
            <tr>
                <th>Page Type</th>
                <td>{{$page->page_type}}</td>
            </tr>
            <tr>
                <th>Path</th>
                <td>{{$page->path}}</td>
            </tr>
            <tr>
                <th>Content</th>
                <td>{{$page->content}}</td>
            </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-danger">
            Delete
        </button>
    </form>




@endsection
