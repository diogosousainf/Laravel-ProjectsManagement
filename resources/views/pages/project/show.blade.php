@extends('master.main')
@section('content')
    @component('components.project.project-show-form' , ['project' => $project , 'products' => $products])  )
    @endcomponent
@endsection
