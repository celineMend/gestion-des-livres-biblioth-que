<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bibiliotéque</title>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Liste des Livres</h1>

            <!-- Message de succès -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('livres.ajouter') }}" class="btn btn-primary mb-3">Ajouter un Livre</a>

            @if ($livres->isEmpty())
                <p>Aucun livre trouvé.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Éditeur</th>
                            <th>Nombre de Page</th>
                            <th>Date de Publication</th>
                            <th>Catégorie</th>
                            <th>Rayon</th>
                            <th>Disponibilité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livres as $livre)
                            <tr>
                                <td>{{ $livre->titre }}</td>
                                <td>{{ $livre->auteur }}</td>
                                <td>{{ $livre->editeur }}</td>
                                <td>{{ $livre->nombre_de_page }}</td>
                                <td>{{ \Carbon\Carbon::parse($livre->date_de_publication)->format('d-m-Y') }}</td>
                                <td>{{ $livre->categorie->libelle }}</td>                                <td>{{ $livre->categorie->nom }}</td>
                                <td>{{ $livre->rayon->libelle }}</td>
                                <td>{{ $livre->disponibilite ? 'Disponible' : 'Indisponible' }}</td>
                                <td>
                                    {{-- <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">Supprimer</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
</body>
</html>
