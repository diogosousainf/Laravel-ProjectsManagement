@extends('master.main')
@section('content')
    @component('components.product.product-create-form', ['categories' => $categories, 'projects' => $projects])
    @endcomponent
@endsection
