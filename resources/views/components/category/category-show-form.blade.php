<div class="container">
    <h1>Category ({{$category->name}})</h1>
    <form method="post" action="">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
            </div>

            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ $category ? $category->name : old('name') }}" disabled aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default">

            @error('name')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
    </form>
</div>
