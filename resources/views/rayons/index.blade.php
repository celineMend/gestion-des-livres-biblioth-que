<!-- resources/views/rayons/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rayons</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Liste des Rayons</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('rayons.remplir') }}" class="btn btn-primary mb-3">Ajouter un Rayon</a>

    @if ($rayons->isEmpty())
        <p>Aucun rayon trouvé.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Description</th>
                    {{-- <th>Image</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rayons as $rayon)
                    <tr>
                        <td>{{ $rayon->libelle }}</td>
                        <td>{{ $rayon->description }}</td>
                        {{-- <td>
                            @if ($rayon->image_url)
                                <img src="{{ $rayon->image_url }}" alt="{{ $rayon->libelle }}" width="100">
                            @else
                                N/A
                            @endif
                        </td> --}}
                        <td>
                            <a href="{{ route('rayons.modifier', $rayon->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('rayons.supprimer', $rayon->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rayon ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
