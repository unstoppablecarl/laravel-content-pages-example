<form method="post" action="{{$action}}" class="form">

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

