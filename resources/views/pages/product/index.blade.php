@extends('master.main')
@section('content')
    <div class="container">
        <h1 class="d-flex justify-content-center">Product List</h1>

        <a class="btn btn-primary mb-3" href="{{ route('product.create') }}">New Product</a>
        @component('components.product.product-list', [
            'products' => $products,
            ])
        @endcomponent
    </div>
@endsection
