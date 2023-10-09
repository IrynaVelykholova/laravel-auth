@extends("layouts.app")

@section("content")
    <div class="container">
        <h3>{{ $project->title }}</h3>
        <img src="{{ $project->image }}" alt="">
        <p>{{ $project->description }}</p>

    </div>
@endsection