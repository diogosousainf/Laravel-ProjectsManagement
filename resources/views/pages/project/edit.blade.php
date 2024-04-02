@extends('master.main')
@section('content')

    @component('components.project.project-edit-form', ['project' => $project , 'products' => $products]) )
    @endcomponent

@endsection
