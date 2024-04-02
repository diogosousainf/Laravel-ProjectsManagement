@extends('master.main')
@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <h1 class="d-flex justify-content-center">Category List</h1>
        <a class="btn btn-primary mb-3" href="{{ route('category.create') }}">New Category</a>
        @component('components.category.category-list', [
            'categories' => $categories,
            ])
        @endcomponent
    </div>
@endsection
