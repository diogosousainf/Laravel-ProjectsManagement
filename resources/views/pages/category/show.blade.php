@extends('master.main')
@section('content')
    @component('components.category.category-show-form', ['category' => $category])
    @endcomponent
@endsection
