@extends('layouts.app')

@section("content")

<div class="container">
    <h1>Nuovo Progetto</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf()

        <div class="mb-3"><label class="form-label">Titolo</label><input type="text" class="form-control" name="title"></div>
        <div class="mb-3"><label class="form-label">Immagine</label><input type="text" class="form-control" name="image"></div>
        <div class="mb-3"><label class="form-label">Descrizione</label><textarea class="form-control" name="description"></textarea></div>

        <button class="btn btn-primary">Crea</button>
    </form>
</div>

@endsection