<form method="post" action="{{$action}}" class="form">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <label>Path</label>
    <input type="text" class="form-control" name="path" value="{{$page->path}}">
    <br>

    <label>Content</label>
    <input type="text" class="form-control" name="content" value="{{$page->content}}">
    <br>

    <button type="submit" class="btn btn-default">
        {{$submitBtn or 'Submit'}}
    </button>
</form>

