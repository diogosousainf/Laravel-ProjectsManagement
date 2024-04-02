<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('category.show', $category->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">Edit</a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </tr>
    @endforeach
    </tbody>
</table>
