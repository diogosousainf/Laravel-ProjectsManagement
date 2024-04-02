<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Project Name</th>
        <th scope="col"> Associated Products</th>
        <th scope="col" class="d-flex justify-content-center">Actions</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($projects as $project)
        <tr>
            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->name }}</td>
            <td>
                @foreach($project->products as $product)
                    <p>{{ $product->id }} - {{ $product->name }}</p>
                @endforeach
            </td>
            <td class="d-flex justify-content-center">
                <a class="btn btn-primary mr-2" href="{{ route('project.show', $project->id) }}">Show</a>
                <a class="btn btn-success mr-2" href="{{ route('project.edit', $project->id) }}">Edit</a>
                <form method="post" action="{{route('project.destroy', $project->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
