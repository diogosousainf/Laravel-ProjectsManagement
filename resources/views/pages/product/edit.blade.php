@extends('master.main')
@section('content')
    @component('components.product.product-edit-form', ['product' => $product , 'categories' => $categories, 'projects' => $projects])
    @endcomponent
@endsection
