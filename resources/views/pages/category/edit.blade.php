@extends('master.main')
@section('content')
    @component('components.category.category-edit-form', ['category' => $category])
    @endcomponent
@endsection
