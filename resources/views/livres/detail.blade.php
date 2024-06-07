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
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    {{ $livre->titre }}
                </h3>
                <div class="blog-post">
                    <p class="blog-post-meta">Date de Publication: {{ $livre->date_de_publication instanceof \DateTime ? $livre->date_de_publication->format('d-m-Y') : $livre->date_de_publication }}</p>
                    <p>Nombre de pages: {{ $livre->nombre_de_page }}</p>
                    <p>ISBN: {{ $livre->isbn }}</p>
                    <p>Auteur: {{ $livre->auteur }}</p>
                    <p>Éditeur: {{ $livre->editeur }}</p>
                    <p>Catégorie: {{ $livre->categorie->libelle }}</p>
                    <div class="row g-0">
                        <div class="col-md-6">
                            <p><strong>Rayon :</strong> {{ $livre->rayon->libelle }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Partie :</strong> {{ $livre->rayon->partie }}</p>
                        </div>
                    </div>
                    <p>Disponibilité: {{ $livre->disponibilite ? 'Disponible' : 'Indisponible' }}</p>
                </div>
            </div>
            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">À propos</h4>
                    <p class="mb-0">Cette section contient les détails du livre.</p>
                </div>
            </aside>
        </div>
    </main>

    <footer class="blog-footer">
        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{ route('livres.index') }}">Retour à la liste des livres</a>
        </nav>
    </footer>

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
