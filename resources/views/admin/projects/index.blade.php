@extends("layouts.app")

@section("content")
    <div class="container">
        <h3>Progetti</h3>

        <button type="button" class="btn btn-primary" href=" {{ route('admin.projects.create')}}">Aggiungi</button>

        <table class="table">
            <thead>
                <tr>
                    <td>Titolo</td>
                    <td>Immagine</td>
                    <td>Descrizione</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->image }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $post->id)}}"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection