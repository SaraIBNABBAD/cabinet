<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" type="image/png" href="{{ asset('medicalr.png') }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>IAF Cabinet</title>
    {{-- lien css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    {{-- lien animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">




</head>

<body>
    {{-- <nav class="navbar navbar-expand-lg bg-light ">
        <div class="container-fluid">
            <div class="logo">
                <a href="#" id="logos"><img src="{{ asset('medicalr.png') }}" alt="medical" width="60px"
                        class="medic">
                    IAF Cabinet</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars text primary"></i></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active pe-0 pt-0" aria-current="page" href="#">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 pt-0" href="#">A&nbsppropos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 pt-0" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 pt-0" href="#">Départements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 pt-0" href="#">Gallerie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 pt-0" href="#docteurs">Docteurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pe-0 pt-0" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        @if (Route::has('login'))
                            @auth
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">Bienvenue
                                    {{ Auth::user()->name }} <img src="{{ asset(Auth::user()->picture) }}"
                                        class=" rounded-circle" width="30" alt="medical"></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        @if (Auth::user()->role == 'Admin')
                                            <a href="{{ route('dashAdmin') }}" class="dropdownlink pe-0 pt-0"><i
                                                    class="fa-solid fa-right-to-bracket"></i><span class="seconditem">&nbsp
                                                    Dashboard</span> </a>
                                    </li>
                                    <li>
                                    @elseif (Auth::user()->role == 'Patient')
                                        <a href="{{ route('dashP') }}" class="dropdownlink pe-0 pt-0"><i
                                                class="fa-solid fa-right-to-bracket"></i><span class="seconditem">&nbsp
                                                Dashboard</span> </a>
                                    </li>
                                    <li>
                                    @elseif (Auth::user()->role == 'Assistant')
                                        <a href="{{ route('dashAssistant') }}" class="dropdownlink pe-0 pt-0"><i
                                                class="fa-solid fa-right-to-bracket"></i><span class="seconditem">&nbsp
                                                Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                    @elseif (Auth::user()->role == 'Doctor')
                                        <a href="{{ route('dashDoctor') }}" class="dropdownlink"><i
                                                class="fa-solid fa-right-to-bracket pe-0 pt-0"></i><span
                                                class="seconditem"></span>&nbsp
                                            Dashboard </a>
                            @endif
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="dropdownlink pe-0 pt-0"><i
                                    class="fa-solid fa-right-to-bracket"></i>
                                <span class="seconditem">&nbsp Se déconnecter </span> </a>
                        </li>
                    </ul>
                </div>
            @endauth
            @endif
            @guest
                <a class="nav-link dropdown-toggle pe-0 pt-0" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Compte
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                class="fa-solid fa-right-to-bracket"></i>
                            <span class="seconditem">&nbsp S'authentifier</span></a></li>
                    @if (Route::has('signup'))
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                    class="fa-solid fa-user-plus"></i>
                                <span class="seconditem">&nbsp S'enregistrer</span></a></li>
                    @endif

                </ul>
            @endguest

            </li>
            </ul>
        </div>
        </div>
    </nav> --}}
    <nav class="nav">
        <div class="col-md-10">
            <div class="logo">
                <a href="#" id="logos"><img src="{{ asset('medicalr.png') }}" alt="medical" width="60px"
                        class="medic">
                    IAF Cabinet</a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li class="current"><a href="#">Accueil</a></li>
                    <li><a href="#">A&nbsppropos</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Départements</a></li>
                    <li><a href="#">Galerie</a></li>
                    <li><a href="#docteurs">Docteurs</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2 text-center text-lg-end ">
            <div class="position-relative d-inline-flex align-items-center  justify-content-center top-shape ">
                <div class="dropdown">
                    @if (Route::has('login'))
                        @auth
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">Bienvenue
                                {{ Auth::user()->name }}
                                @if (Auth::user()->picture == null)
                                    <img src="{{ asset('img/avatar/avatar.png') }}" class=" rounded-circle bg-white" width="30"
                                        alt="medical">
                                @else
                                    <img src="{{ asset(Auth::user()->picture) }}" class=" rounded-circle" width="30"
                                        alt="medical">
                                @endif
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    @if (Auth::user()->role == 'Admin')
                                        <a href="{{ route('admin.state') }}" class="dropdownlink"><i
                                                class="fa-solid fa-right-to-bracket"></i><span class="seconditem">&nbsp
                                                Dashboard</span> </a>
                                </li>
                                <li>
                                @elseif (Auth::user()->role == 'Patient')
                                    <a href="{{ route('dashP') }}" class="dropdownlink"><i
                                            class="fa-solid fa-right-to-bracket"></i><span class="seconditem">&nbsp
                                            Dashboard</span> </a>
                                </li>
                                <li>
                                @elseif (Auth::user()->role == 'Assistant')
                                    <a href="{{ route('dashAssistant') }}" class="dropdownlink"><i
                                            class="fa-solid fa-right-to-bracket"></i><span class="seconditem">&nbsp
                                            Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                @elseif (Auth::user()->role == 'Doctor')
                                    <a href="{{ route('dashDoctor') }}" class="dropdownlink"><i
                                            class="fa-solid fa-right-to-bracket"></i><span class="seconditem"></span>&nbsp
                                        Dashboard </a>
                        @endif
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="dropdownlink"><i &nbsp
                                    class="fa-solid fa-right-to-bracket"></i>
                                <span class="seconditem"> Se déconnecter </span> </a>
                        </li>
                        </ul>
                    @endauth
                    @endif
                </div>


                @guest
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> Compte
                        </button>
                        <ul class="dropdown-menu text-white" aria-labelledby="dropdownMenuButton1">
                            <li><a data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdownlink"><i
                                        class="fa-solid fa-right-to-bracket"></i>
                                    <span class="seconditem">&nbsp S'authentifier</span>
                                </a></li>
                            @if (Route::has('signup'))
                                <li><a data-bs-toggle="modal" data-bs-target="#exampleModal2" class="dropdownlink"><i
                                            class="fa-solid fa-user-plus"></i>
                                        <span class="seconditem">&nbsp S'enregistrer</span>
                                    </a></li>
                            @endif

                        </ul>
                    </div>
                @endguest

            </div>
        </div>
        <button class="btn-menu"><i class="fa-solid fa-bars"></i></button>
    </nav>

    <section class="home">

    </section>
    <!-- *****  Banner Area Start ***** -->
    <section class="section main-banner">

        <div class="caption">
            <h6>Bienvenue chez <em>IAF</em> Cabinet</h6>
            <h2>Un geste technique c'est bien , un geste qui <em>SAUVE</em> c'est mieux.</h2>
            <div class="main-button">
                @if (Route::has('signup'))
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal2" class="dropdownlink">Créer votre
                        compte</a>
                @endif
            </div>
        </div>
    </section>

    <!-- ********** Banner End *************** -->


    <!-- ********** Features *************** -->

    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="features-post">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa-solid fa-info"></i>Qui sommes nous ?</h4>
                            </div>
                            <div class="content-hide">
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non, aliquid.</p>
                                <p class="hidden-sm">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde,
                                    perferendis!</p>
                                <div class="scroll-to-section"><a href="#apropos">A Propos</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="features-post second-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="bi bi-hospital"></i>Divers départements</h4>
                            </div>
                            <div class="content-hide">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla, temporibus.</p>
                                <p class="hidden-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Voluptatum, recusandae!</p>
                                <div class="scroll-to-section"><a href="#départements">Nos départements</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="features-post third-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa-solid fa-user-doctor"></i>Des docteurs qualifiés</h4>
                            </div>
                            <div class="content-hide">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis, sed.</p>
                                <p class="hidden-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Voluptatem, reprehenderit.</p>
                                <div class="scroll-to-section"><a href="#docteurs">Nos docteurs</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ********** features End *************** -->


    <!-- Le model de l'authentification-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container py-3 h-80">
                    <div class="row d-flex justify-content-center align-items-center h-80">
                        <div class="col col-xl-12">
                            <div class="card" style="border-radius: 1rem;">
                                <div class="row g-0">
                                    <div class="col-md-6 col-lg-6 d-none d-md-block">
                                        <img src="{{ asset('img/signup/docs.jpg') }}" alt="login form"
                                            class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:84vh" />
                                    </div>

                                    <div class="col-md-6 col-lg-6 d-flex align-items-center">

                                        <div class="card-body p-7 p-lg-7 text-black">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <form method="post" action="{{ route('selog') }}">
                                                @csrf

                                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                                                    Connectez-vous à votre compte</h5>
                                                <div class="form-outline mb-4">
                                                    <input type="email" id="email"
                                                        class="form-control form-control-lg @error('email')is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" />
                                                    <label class="form-label" for="email">Adresse
                                                        E-mail</label>
                                                </div>
                                                @error('email')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-outline mb-4">
                                                    <input type="password" id="password"
                                                        class="form-control form-control-lg @error('password')is-invalid
                                                 @enderror"
                                                        name="password" />
                                                    <label class="form-label" for="password">Mot de
                                                        passe</label>
                                                </div>
                                                @error('password')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="pt-1 mb-4">
                                                    <button class="btn btn-primary btn-sm btn-block" type="submit">Se
                                                        connecter</button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-block"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                                <a class="small text-muted"
                                                    href="{{ route('forget.password.get') }}">Mot de passe
                                                    oublié?</a>
                                                <p class="mb-5 pb-lg-2" style="color: #393f81;">vous n'avez
                                                    pas de compte ? <a href="{{ route('signup') }}"
                                                        style="color: #393f81;">S'enregistrer ici </a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Le model de l'enregistrement-->

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container py-3 h-80">
                    <div class="row d-flex justify-content-center align-items-center h-80">
                        <div class="col">
                            <div class="card card-registration my-4">
                                <div class="row g-0">
                                    <div class="col-xl-5 d-none d-xl-block">
                                        <img src="{{ asset('img/signup/dd.jpg') }}" alt="doctor photo"
                                            class="img-fluid"
                                            style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:85vh" />
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="card-body p-md-5 text-black">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <h3 class="mb-3 text-uppercase">S'enregistrer</h3>
                                            <h5 class="text-black-50">Entrez vos informations pour créer un compte</h5>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form action="{{ route('register') }}" method="post"
                                                enctype="multipart/form-data">

                                                @csrf

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="text" class="form-control form-control-lg"
                                                                id="floatingInput" placeholder="Nom complet"
                                                                name="name" value="{{ old('name') }}">
                                                            <label for="floatingInput">Nom complet <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="text" id="floatingInput"
                                                                class="form-control form-control-lg @error('phone')is-invalid
                                                     
                                                 @enderror"
                                                                placeholder="Téléphone" name="phone"
                                                                value="{{ old('phone') }}" />
                                                            <label for="floatingInput">Téléphone <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                        @error('phone')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>



                                                    <div class="col-md-4 mb-4 ">
                                                        <div class="form-floating mb-4">
                                                            <input type="text" class="form-control form-control-lg"
                                                                id="floatingInput" placeholder="Adresse de résidence"
                                                                name="address" value="{{ old('address') }}" />
                                                            <label for="floatingInput">Adresse <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="email" class="form-control form-control-lg"
                                                                id="floatingPassword" placeholder="Adresse mail"
                                                                name="email" value="{{ old('email') }}">
                                                            <label for="floatingPassword">E-mail <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="password"
                                                                class="form-control form-control-lg"
                                                                id="floatingInput" placeholder="Mot de passe"
                                                                name="password">
                                                            <label for="floatingInput">Mot de passe <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="password"
                                                                class="form-control form-control-lg"
                                                                id="floatingPassword"
                                                                placeholder="Confirmer le mot de passe"
                                                                name="password_confirmation">
                                                            <label for="floatingPassword">Confirmer <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" hidden>
                                                    <div class="col-md-10 mb-4">
                                                        <label for="splt">Role : <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-select form-select-lg role"
                                                            aria-label="Default select example" name="role">
                                                            <option value="Patient">Patient</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row mt-4">
                                                    <div class="col-md-6 mb-4">

                                                        <h6 class="mb-0 me-4 d-inline">Sexe : <span
                                                                class="text-danger">*</span></h6>

                                                        <div class="form-check form-check-inline mb-0 me-4">
                                                            <input
                                                                class="form-check-input @error('gender')is-invalid
                                                     
                                                 @enderror"
                                                                type="radio" name="gender" id="femme"
                                                                value="Femme" />
                                                            <label class="form-check-label"
                                                                for="femme">Femme</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-0 me-4">
                                                            <input
                                                                class="form-check-input @error('gender')is-invalid
                                                     
                                                 @enderror"
                                                                type="radio" name="gender" id="homme"
                                                                value="Homme" />
                                                            <label class="form-check-label"
                                                                for="homme">Homme</label>
                                                        </div>
                                                        @error('gender')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>


                                                    <div class="col-md-6">

                                                        <h6 class="mb-0 me-4 d-inline">Mutuelle : <span
                                                                class="text-danger">*</span></h6>

                                                        <div class="form-check form-check-inline mb-0 me-4">
                                                            <input
                                                                class="form-check-input @error('mutuelle')is-invalid
                                                     
                                                 @enderror"
                                                                type="radio" name="mutuelle" id="oui"
                                                                value="oui" />
                                                            <label class="form-check-label" for="oui">Oui</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-0 me-4">
                                                            <input
                                                                class="form-check-input @error('mutuelle')is-invalid
                                                     
                                                 @enderror"
                                                                type="radio" name="mutuelle" id="non"
                                                                value="non" />
                                                            <label class="form-check-label" for="non">Non</label>
                                                        </div>
                                                        @error('mutuelle')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input type="date"
                                                                class="form-control form-control-lg @error('birth')is-invalid
                                                     
                                                 @enderror"
                                                                id="floatingInput" placeholder="Date de naissance"
                                                                name="birth" value="{{ old('birth') }}">
                                                            <label for="floatingInput">Date de naissance</label>
                                                        </div>
                                                        @error('birth')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mb-4 me-5 mt-3">
                                                        <label>Groupe Sanguin :</label>
                                                        <select class="form-select"
                                                            aria-label="Default select example" name="sang">
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-outline mb-4">
                                                            <h6 class="form-labelv" for="picture">Photo :</h6>
                                                            <input type="file" id="picture"
                                                                class="form-control form-control-lg" name="picture"
                                                                accept="image/*" />
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="d-flex justify-content-end pt-3">
                                                    <button type="button" class="btn btn-danger btn-sm btn-block"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary btn-lg ms-2"
                                                        name="signup">S'enregister</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--******************************************-->

    <!--********************DEPARTEMENT**********************-->
    <div class="container-xxl py-5" id="docteurs">
        <div class="container">
            <div class="text-center">
                <h1 class="section-title bg-white text-center px-3">Départements</h1>
                <div class="separator_auto"></div>
                <h2 class="mb-5">Découvrez nos départements</h2>
            </div>
            <div class="row g-4">
                @foreach ($doctors as $doctor)
                    <div class="col-lg-3 col-md-6" id="sir">
                        <div class="team-item bg-light">
                            <div class="text-center p-4">
                                <h3 class="mb-0" data-aos="fade-up" data-aos-duration="500">
                                    {{ $doctor->speciality }}
                                </h3>
                            </div>
                        </div>
                        <div class="team-item bg-light">
                            <div class="text-center p-4" data-aos="fade-up" data-aos-duration="600">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt animi, consectetur sed
                                    ut voluptate doloribus reprehenderit, earum quibusdam, hic fuga suscipit? Ullam
                                    praesentium ex autem iste fuga asperiores, amet similique.</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



    <!--******************************************-->

    <div class="text-center">
        <h1 class="section-title bg-white text-center px-3">Gallerie</h1>
        <div class="separator_auto"></div>
        <h2 class="mb-5">La joie partagée grandit</h2>
    </div>


    <div class="gallery-image">
        <div class="img-box">
            <img src="{{ asset('gal1.jpg') }}" alt="" />
            <div class="transparent-box">
                <div class="caption">
                    <p>Solidaire</p>
                    <p class="opacity-low">Suivi continue</p>
                </div>
            </div>
        </div>
        <div class="img-box">
            <img src="{{ asset('gal2.jpg') }}" alt="" />
            <div class="transparent-box">
                <div class="caption">
                    <p>Solidaire</p>
                    <p class="opacity-low">Suivi continue</p>
                </div>
            </div>
        </div>
        <div class="img-box">
            <img src="{{ asset('gal3.jpg') }}" alt="" />
            <div class="transparent-box">
                <div class="caption">
                    <p>Solidaire</p>
                    <p class="opacity-low">Suivi continue</p>
                </div>
            </div>
        </div>
        <div class="img-box">
            <img src="{{ asset('gal4.jpg') }}" alt="" />
            <div class="transparent-box">
                <div class="caption">
                    <p>Solidaire</p>
                    <p class="opacity-low">Suivi continue</p>
                </div>
            </div>
        </div>
        <div class="img-box">
            <img src="{{ asset('gal5.jpg') }}" alt="" />
            <div class="transparent-box">
                <div class="caption">
                    <p>Solidaire</p>
                    <p class="opacity-low">Suivi continue</p>
                </div>
            </div>
        </div>
        <div class="img-box">
            <img src="{{ asset('gal6.jpg') }}" alt="" />
            <div class="transparent-box">
                <div class="caption">
                    <p>Solidaire</p>
                    <p class="opacity-low">Suivi continue</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Start -->

    <div class="container-xxl py-5" id="docteurs">
        <div class="container">
            <div class="text-center">
                <h1 class="section-title bg-white text-center px-3">Docteurs</h1>
                <div class="separator_auto"></div>
                <h2 class="mb-5">No meilleurs docteurs</h2>
            </div>
            <div class="row g-4">
                @foreach ($doctors as $doctor)
                    <div class="col-lg-3 col-md-6 ">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                @if ($doctor->picture == null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="img-fluid">
                            @else
                            <img src="{{ $doctor->picture }}" alt="" class="img-fluid">
                            @endif
                            </div>
                            <div class=" justify-content-center">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a class="btn btn-sm-square btn-primary mx-1" id="hi" href=""><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" id="hi" href=""><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" id="hi" href=""><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-0" data-aos="fade-down" data-aos-duration="500">
                                    {{ $doctor->name }}
                                </h3>
                                <small class="special" data-aos="fade-up"
                                    data-aos-duration="3000">{{ $doctor->speciality }}</small>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Team End -->

    <!-- ======= Questions fréquentes ======= -->

    <div class="text-center">
        <h1 class="section-title bg-white text-center px-3">Questions fréquentes ?</h1>
        <div class="separator_auto"></div>
        <h2 class="mb-5">Ayez des réponses concrètes à vos questions</h2>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h2>Qui êtes vous ?</h2>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="h3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas dolore
                        id deleniti ipsum
                        rem minima unde quia, aut assumenda!</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h2>Que proposez vous ?</h2>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="h3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas dolore
                        id deleniti ipsum
                        rem minima unde quia, aut assumenda!</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h2> Pourquoi passer par vous ?</h2>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="h3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas dolore
                        id deleniti ipsum
                        rem minima unde quia, aut assumenda!</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h2> Comment puis-je prendre un rendez-vous ?</h2>
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="h3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas dolore
                        id deleniti ipsum
                        rem minima unde quia, aut assumenda!</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <h2> Comment se déroule la prise en charge ?</h2>
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="h3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas dolore
                        id deleniti ipsum
                        rem minima unde quia, aut assumenda!</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    <h2> Comment puis-je récupérer mon dossier médical ?</h2>
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="h3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas dolore
                        id deleniti ipsum
                        rem minima unde quia, aut assumenda!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Questions fréquentes -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s" id="contact">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Lien rapide</h4>
                    <a class="btn btn-link" href="">A propos</a>
                    <a class="btn btn-link" href="">Services</a>
                    <a class="btn btn-link" href="">Départements</a>
                    <a class="btn btn-link" href="">Gallerie</a>
                    <a class="btn btn-link" href="#docteurs">Docteurs</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Hay el baraka , 20080 , CASABLANCA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212.666.123.323</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>IAF@cabinet.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('gal2.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('gal2.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('gal2.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('gal4.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('gal4.jpg') }}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{ asset('gal4.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contactez-nous ( ghandiro hnaya form dial contact )</h4>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, adipisci?</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Votre adresse mail">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->





    <!-- Jquery needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        $(document).ready(function() {
            $(window).on('scroll', function() {
                if ($(window).scrollTop()) {
                    $(".nav").addClass('bgc');
                } else {
                    $(".nav").removeClass('bgc');
                }
            });
        });
    </script>



    <script>
        AOS.init();
    </script>

    {{-- <script src="js/jquery.min.js"></script> --}}

    {{-- <script src="js/bootstrap.min.js"></scr> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/form.js') }}"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('easing.min.js') }}"></script>
    <script src="{{ asset('waypoints.min.js') }}"></script>
    <script src="{{ asset('owl.carousel.min.js') }}"></script>

    <script></script>

</body>

</html>
