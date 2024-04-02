<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Details</th>
        <th scope="col">Category</th>
        <th scope="col">Project</th>
        <th scope="col"class="d-flex justify-content-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->details }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->project->name }}</td>

            <td class="d-flex justify-content-center">
                <a class="btn btn-primary mr-2" href="{{ route('product.show', $product->id) }}">Show</a>
                <a class="btn btn-success mr-2" href="{{ route('product.edit', $product->id) }}">Edit</a>
                <form method="post" action="{{route('product.destroy', $product->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
