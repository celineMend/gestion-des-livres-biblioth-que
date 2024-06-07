<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col s12">
        <h1>Modifier un Livre</h1>
        <hr>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('livres.sauvegarder', $livre->id) }}" method="POST" class="form_group">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" style="display:none;" value="{{ $livre->id }}" required>

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $livre->titre) }}" required>
            </div>
            <div class="mb-3">
                <label for="date_de_publication" class="form-label">Date de Publication</label>
                <input type="date" class="form-control" id="date_de_publication" name="date_de_publication" value="{{ old('date_de_publication') ? \Carbon\Carbon::parse(old('date_de_publication'))->format('Y-m-d') : '' }}" required>
            </div>
            <div class="mb-3">
                <label for="nombre_de_page" class="form-label">Nombre de pages</label>
                <input type="number" class="form-control" id="nombre_de_page" name="nombre_de_page" value="{{ old('nombre_de_page', $livre->nombre_de_page) }}" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $livre->isbn) }}" required>
            </div>
            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="{{ old('auteur', $livre->auteur) }}" required>
            </div>
            <div class="mb-3">
                <label for="editeur" class="form-label">Éditeur</label>
                <input type="text" class="form-control" id="editeur" name="editeur" value="{{ old('editeur', $livre->editeur) }}" required>
            </div>
            <div>
                <label for="categorie_id" class="form-label">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('categorie_id', $livre->categorie_id) == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="rayon_id" class="form-label">Rayon</label>
                <select name="rayon_id" id="rayon_id" class="form-control" required>
                    <option value="">Sélectionnez un rayon</option>
                    @foreach ($rayons as $rayon)
                        <option value="{{ $rayon->id }}" {{ old('rayon_id', $livre->rayon_id) == $rayon->id ? 'selected' : '' }}>
                            {{ $rayon->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="disponibilite" class="form-label">Disponibilité</label>
                <select name="disponibilite" id="disponibilite" class="form-control" required>
                    <option value="">Sélectionnez la disponibilité</option>
                    <option value="1" {{ old('disponibilite', $livre->disponibilite) == 1 ? 'selected' : '' }}>Disponible</option>
                    <option value="0" {{ old('disponibilite', $livre->disponibilite) == 0 ? 'selected' : '' }}>Indisponible</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier un Livre</button>
            <br><br>
            <a href="{{ route('livres.index') }}" class="btn btn-danger">Revenir aux livres</a>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
