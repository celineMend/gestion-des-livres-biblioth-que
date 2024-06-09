<!-- resources/views/rayons/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Rayon</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Créer un Rayon</h1>
    <form action="{{ route('rayons.traitement_remplissage') }}" method="POST">

    @csrf
    <div class="form-group">
        <label for="libelle">Libellé</label>
        <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle', $rayon->libelle ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ old('description', $rayon->description ?? '') }}</textarea>
    </div>
    {{-- <div class="form-group">
        <label for="image_url">URL de l'image</label>
        <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $rayon->image_url ?? '') }}">
    </div> --}}
    <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>
</div>
</body>
</html>
