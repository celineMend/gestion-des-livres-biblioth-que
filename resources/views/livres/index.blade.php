<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bibliothèque</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-title, .card-text {
            margin-bottom: 0.5rem;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-group {
            display: flex;
            gap: 0.5rem;
        }

        .carousel-img {
        height: 600px; /* Définir la hauteur désirée */
        object-fit: cover; /* Assurez-vous que l'image couvre toute la zone sans se déformer */
    }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Bibliothèque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                @if(auth()->check())
                    <span class="navbar-text me-2">Bienvenue, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="btn btn-light">Se déconnecter</button>
                    </form>
                @else
                    <a class="btn btn-light me-2" href="{{ route('login') }}">Connexion</a>
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- Carrousel -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://i.pinimg.com/564x/14/15/6f/14156f7c0c0496e6391fce86c146efac.jpg" class="d-block w-100 carousel-img" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Premier Slide</h5>
                <p>Description du premier slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://i.pinimg.com/564x/d0/7d/81/d07d815827ada8ca5e2df9feb2655875.jpg" class="d-block w-100 carousel-img" alt="Slide 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Deuxième Slide</h5>
                <p>Description du deuxième slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://i.pinimg.com/564x/14/15/6f/14156f7c0c0496e6391fce86c146efac.jpg" class="d-block w-100 carousel-img" alt="Slide 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Troisième Slide</h5>
                <p>Description du troisième slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- Contenu principal -->
<div class="container mt-4">
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
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($livres as $livre)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ $livre->image }}" class="card-img-top" alt="{{ $livre->titre }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $livre->titre }}</h5>
                                    <p class="card-text">Auteur : {{ $livre->auteur }}</p>
                                    <p class="card-text">Éditeur : {{ $livre->editeur }}</p>
                                    <p class="card-text">Nombre de pages : {{ $livre->nombre_de_page }}</p>
                                    <p class="card-text">Date de publication : {{ \Carbon\Carbon::parse($livre->date_de_publication)->format('d-m-Y') }}</p>
                                    <p class="card-text">Catégorie : {{ $livre->categorie->libelle }}</p>
                                    <p class="card-text">Rayon : {{ $livre->rayon->libelle }}</p>
                                    <p class="card-text">Disponibilité : {{ $livre->disponibilite ? 'Disponible' : 'Indisponible' }}</p>
                                </div>
                                <div class="card-footer">
                                    <div class="btn-group">
                                        <a href="{{ route('livres.detail', $livre->id) }}" class="btn btn-primary btn-sm">Détails</a>
                                        <a href="{{ route('livres.modifier', $livre->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    </div>
                                    <form action="{{ route('livres.supprimer', $livre->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

     <!-- Section des catégories -->
    <section class="categorie mt-5">
        <h2 class="title" style="font-size: 22px; border-bottom: 2px solid blueviolet; padding-bottom: 5px;">Nos différentes catégories de propriétés</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($categories as $categorie)
                <div class="col">
                    <div class="card text-bg-dark h-100">
                        <img src="{{ $categorie->image_url }}https://img.freepik.com/photos-gratuite/arrangement-nature-morte-lightbox_23-2149198407.jpg?t=st=1717959444~exp=1717963044~hmac=633edc5a0bf27fe142998ccc3d451481fd4ae328af46a0a9d649db4b58c49206&w=360" class="card-img" alt="{{ $categorie->libelle }}">
                        <div class="card-img-overlay">
                            <h5 class="card-title">{{ $categorie->libelle }}</h5>
                            <p class="card-text">{{ $categorie->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="/categories" class="btn" style="background-color: blueviolet; color: white; margin-top: 10px;">Gérer les catégories</a>
    </section>
</div>

<!-- Section des rayons -->
<section id="rayons" class="rayon">
    <h2 class="title" style="font-size: 22px; border-bottom: 2px solid blueviolet; padding-bottom: 5px;">Nos différents rayons</h2>
    <div class="card-group">
        @foreach($rayons as $rayon)
        <div class="card text-bg-dark">
            <img src="{{ $rayon->image_url }}" class="card-img" alt="{{ $rayon->libelle }}">
            <div class="card-img-overlay">
                <h5 class="card-title">{{ $rayon->libelle }}</h5>
                <p class="card-text">{{ $rayon->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <a href="/rayons" class="btn" style="background-color: blueviolet; color: white; margin-top: 10px;">Gérer les rayons</a>
</section>

<!-- Bootstrap JS -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min> --}}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
