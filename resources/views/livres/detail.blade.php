<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Livre : {{ $livre->titre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card-custom {
            height: 100%;
        }
        .card-img-top-custom {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron h-50 p-3 p-md-5 text-white rounded" style="background: url({{ $livre->image }});">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">{{ $livre->titre }}</h1>
            </div>
        </div>
    </div>
    <br><br>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main"><div class="container">
                <section class="section">
                    <h2 class="title" style="font-size: 22px; border-bottom: 2px solid blueviolet; padding-bottom: 5px;">Détails du Livre : {{ $livre->titre }}</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $livre->image }}" class="img-fluid rounded-start" alt="Image du livre">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $livre->titre }}</h5>
                                <p class="card-text">Auteur: {{ $livre->auteur }}</p>
                                <p class="card-text">Nombre de pages: {{ $livre->nombre_de_page }}</p>
                                <p class="card-text">ISBN: {{ $livre->isbn }}</p>
                                <p class="card-text">Catégorie: {{ $livre->categorie->libelle }}</p>
                                <p class="card-text">Rayon: {{ $livre->rayon->libelle }}</p>
                                <p class="card-text">Disponibilité: {{ $livre->disponibilite ? 'Disponible' : 'Indisponible' }}</p>
                                <p class="card-text"><small class="text-muted">Date de publication: {{ $livre->date_de_publication instanceof \DateTime ? $livre->date_de_publication->format('d-m-Y') : $livre->date_de_publication }}</small></p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('livres.modifier', $livre->id) }}" class="btn btn-primary">Modifier</a>
                                    <button class="btn btn-danger" onclick="confirmDelete({{ $livre->id }})">Supprimer</button>
                                    <a href="{{ route('livres.index') }}" class="btn btn-danger">Retour à la liste des livres</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script>
                function confirmDelete(id) {
                    const confirmed = confirm(`Êtes-vous sûr de vouloir supprimer le livre avec l'ID ${id} ?`);
                    if (confirmed) {
                        window.location.href = `/livres/supprimer/${id}`;
                    }
                }
            </script>

</body>
</html>
