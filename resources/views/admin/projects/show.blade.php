@extends("layouts.app")

@section("content")
    <div class="container">
        <h3>{{ $project->title }}</h3>
        <img src="{{ $project->image }}" alt="">
        <p>{{ $project->description }}</p>
        <button type="button" class="btn btn-warning btn-aggiungi mb-3"><a href="{{ route('admin.projects.edit', $project->slug) }}">Modifica</a></button>
        <button type="button" class="btn btn-danger btn-aggiungi mb-3"><a href="{{ route('admin.projects.create') }}">Elimina</a></button>
    </div>
@endsection