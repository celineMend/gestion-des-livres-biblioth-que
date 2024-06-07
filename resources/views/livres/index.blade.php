<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Librairie en ligne</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><span style="color: rgb(43, 86, 226);">libary de la</span>Paix</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Livres</a>
                        </li>
                    </ul>
                </div>
                <div class="btns">
                    <a class="btn btn-light" href="">Connexion</a>
                    <a class="btn btn-" style="background-color: rgb(43, 86, 226); color: white;" href="">Contact</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <section class="section">
            <h2 class="title" style="font-size: 22px; border-bottom: 2px solid blueviolet; padding-bottom: 5px;">Liste de tous les livres</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($livres as $livre)
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img src="{{ $livre->image }}" class="img-fluid rounded-start h-100" alt="..." style="object-fit: cover;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $livre->titre }}</h5>
                                    <p class="card-text">{{ $livre->auteur }}</p>
                                    <p class="card-text">{{ $livre->nombre_de_page}}</p>
                                    <p class="card-text">ISBN: {{ $livre->isbn }}</p>
                                    <p class="card-text">Catégorie: {{ $livre->categorie->libelle }}</p>
                                    <p class="card-text">Rayon: {{ $livre->rayon->libelle }}</p>
                                    <p class="card-text">Disponibilité: {{ $livre->disponibilite ? 'Disponible' : 'Indisponible' }}</p>
                                    <div class="mt-auto d-flex justify-content-between align-items-center">
                                        <p class="card-text"><small class="text-muted">Date de publication: {{ $livre->date_de_publication instanceof \DateTime ? $livre->date_de_publication->format('d-m-Y') : $livre->date_de_publication }}</small></p>
                                        <div>
                                            <a href="{{ route('livres.detail', $livre->id) }}" style="font-size: 16px;"><i class="fa-regular fa-eye"></i></a>
                                            <a href="{{ route('livres.modifier', $livre->id) }}" style="font-size: 16px;"><i class="fa-solid fa-pencil"></i></a>
                                            <a href="{{ route('livres.supprimer', $livre->id) }}" style="font-size: 16px;"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
