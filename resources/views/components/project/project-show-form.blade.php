<div class="container ">
    <h1 class="mb-5">Show Project ({{$project->name}})</h1>
    <form method="post" action="">
        @csrf
        <div class="input-group mb-5">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
            </div>

            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ $project ? $project->name : old('name') }}" disabled aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default">

            @error('name')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="form-group mb-5">
            <div class="input-group-prepend">
                <span class="input-group-text mb-2" id="inputGroup-sizing-default">Associated Products</span>
            </div>
            <div>
                <ul>
                    @foreach($project->products as $product)
                        <li>{{ $product->id }} - {{ $product->name }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </form>
</div>
