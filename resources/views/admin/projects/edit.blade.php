@extends('layouts.app')

@section("content")

<div class="container">
    <h1>Modifica il progetto</h1>

    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
        @csrf()
        @method('put')

        {{-- titolo --}}
        <div class="mb-3">
            <label class="form-label">Titolo</label><input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- immagine --}}
        <div class="mb-3">
            <label class="form-label">Immagine</label><input type="text" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $project->image) }}">
            @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- descrizione --}}
        <div class="mb-3">
            <label class="form-label @error('description') is-invalid @enderror">Description</label>
                <textarea class="form-control" name="description">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>
        
        <a class="btn btn-secondary" href="{{ route("admin.projects.index") }}">Annulla</a>
        <button class="btn btn-primary">Aggiorna</button>
    </form>
</div>

@endsection