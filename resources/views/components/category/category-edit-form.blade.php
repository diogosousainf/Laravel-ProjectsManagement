<div class="container">
        <h1>Edit category ({{$category->name}})</h1>
    <form method="post" action="{{ route('category.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
            </div>
            <input type="text" class="form-control" name="name" value={{ $category->name }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
