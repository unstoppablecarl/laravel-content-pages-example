<form method="post" action="{{$action}}" class="form">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <label>Path</label>
    <input type="text" class="form-control" name="path" value="{{$page->path}}">
    <br>

    <label>Content</label>
    <input type="text" class="form-control" name="content" value="{{$page->content}}">
    <br>

    <label>Content Before List</label>
    <textarea class="form-control" name="meta[content_before_list]">{{array_get($page->meta, 'content_before_list')}}</textarea>
    <br>

    <label>Content After List</label>
    <textarea class="form-control" name="meta[content_after_list]">{{array_get($page->meta, 'content_after_list')}}</textarea>
    <br>

    <button type="submit" class="btn btn-default">
        {{$submitBtn or 'Submit'}}
    </button>
</form>

