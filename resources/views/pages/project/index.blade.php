@extends('master.main')
@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <h1 class="d-flex justify-content-center">Project List</h1>
        <a class="btn btn-primary mb-3" href="{{ route('project.create') }}">New Project</a>
        @component('components.project.project-list', [
            'projects' => $projects,
            ])
        @endcomponent
    </div>
@endsection
