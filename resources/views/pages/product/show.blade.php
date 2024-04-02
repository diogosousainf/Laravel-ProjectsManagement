@extends('master.main')
@section('content')
    @component('components.product.product-show-form'   , ['product' => $product])
    @endcomponent
@endsection
