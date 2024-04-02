@extends('master.main')
@section('content')
    @component('components.project.project-create-form', ['products' => $products])
    @endcomponent
@endsection
