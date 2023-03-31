<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Cabinét Médical</title>
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
    <nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="#" id="logos">IAF Cabinet</a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="#">Acceuil</a></li>
                    <li><a href="#">A&nbsppropos</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Départements</a></li>
                    <li><a href="#">Gallerie</a></li>
                    <li><a href="#docteurs">Docteurs</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <div class="col-md-3  ">
                        <div
                            class="position-relative d-inline-flex align-items-center  justify-content-center top-shape ">
                            <div class="dropdown">
                                <div class="d-flex align-items-center">
                                    @if (Route::has('login'))
                                        @auth
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-mdb-toggle="dropdown" aria-expanded="false">Bienvenue
                                                {{ Auth::user()->name }}</button>
                                            <img src="{{ asset(Auth::user()->picture) }}" class=" rounded-circle"
                                                width="30" alt="medical">

                                    </div>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @if (Auth::user()->role == 'Admin')
                                            <a href="{{ route('dashAdmin') }}" class="dropdown-item"><i
                                                    class="fa-solid fa-right-to-bracket"></i>&nbsp Dashboard </a>
                                        @elseif (Auth::user()->role == 'Patient')
                                            <a href="{{ route('dashP') }}" class="dropdown-item"><i
                                                    class="fa-solid fa-right-to-bracket"></i>&nbsp Dashboard </a>
                                        @elseif (Auth::user()->role == 'Assistant')
                                            <a href="{{ route('dashAssistant') }}" class="dropdown-item"><i
                                                    class="fa-solid fa-right-to-bracket"></i>&nbsp Dashboard
                                            </a>
                                        @elseif (Auth::user()->role == 'Doctor')
                                            <a href="{{ route('dashDoctor') }}" class="dropdown-item"><i
                                                    class="fa-solid fa-right-to-bracket"></i>&nbsp Dashboard </a>
                                        @endif

                                        <a href="{{ route('logout') }}" class="dropdown-item"><i
                                                class="fa-solid fa-right-to-bracket"></i> &nbsp Se
                                            déconnecter </a>
                                    </div>
                                </div>
                            @else
                                <div class="dropdown">
                                    <div class="d-flex align-items-center">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton">
                                            <i class="fa-solid fa-user"></i> Compte
                                        </button>
                                    </div>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="fa-solid fa-right-to-bracket"></i>
                                            <span class="seconditem">&nbsp S'authentifier</span>
                                        </a>
                                        @if (Route::has('signup'))
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal2"><i class="fa-solid fa-user-plus"></i>
                                                <span class="seconditem">&nbsp S'enregistrer</span>
                                            </a>
                                        @endif
                                    @endauth
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <section class="home">
    </section>
    <div style="height: 1000px">
        < <p class="myP">I HOPE YOU FIND THIS USEFULL</p>
            <p class="myP">Albi</p>
            <p class="myP">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum ratione facere animi impedit rem labore
                sint
                repellendus ipsa sapiente voluptatem aut excepturi quo itaque, ab earum cumque. Voluptatem beatae id
                inventore quod voluptate qui deserunt, quis placeat, tempora ex totam, dolore sequi harum eos
                voluptatibus
                animi labore officiis minus laboriosam
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum ratione facere animi impedit rem labore
                sint
                repellendus ipsa sapiente voluptatem aut excepturi quo itaque, ab earum cumque. Voluptatem beatae id
                inventore quod voluptate qui deserunt, quis placeat, tempora ex totam, dolore sequi harum eos
                voluptatibus
                animi labore officiis minus laboriosam
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum ratione facere animi impedit rem labore
                sint
                repellendus ipsa sapiente voluptatem aut excepturi quo itaque, ab earum cumque. Voluptatem beatae id
                inventore quod voluptate qui deserunt, quis placeat, tempora ex totam, dolore sequi harum eos
                voluptatibus
                animi labore officiis minus laboriosam
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum ratione facere animi impedit rem labore
                sint
                repellendus ipsa sapiente voluptatem aut excepturi quo itaque, ab earum cumque. Voluptatem beatae id
                inventore quod voluptate qui deserunt, quis placeat, tempora ex totam, dolore sequi harum eos
                voluptatibus
                animi labore officiis minus laboriosam
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum ratione facere animi impedit rem labore
                sint
                repellendus ipsa sapiente voluptatem aut excepturi quo itaque, ab earum cumque. Voluptatem beatae id
                inventore quod voluptate qui deserunt, quis placeat, tempora ex totam, dolore sequi harum eos
                voluptatibus
                animi labore officiis minus laboriosam
            </p>


    </div>

    <!-- Le model de l'authentification-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <div class="col-xl-3 d-none d-xl-block">
                                        <img src="{{ asset('img/signup/dd.jpg') }}" alt="doctor photo"
                                            class="img-fluid"
                                            style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:145vh" />
                                    </div>
                                    <div class="col-xl-9">
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
                                                            <label for="floatingInput">Nom complet</label>
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
                                                            <label for="floatingInput">Adresse</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="email" class="form-control form-control-lg"
                                                                id="floatingPassword" placeholder="Adresse mail"
                                                                name="email" value="{{ old('email') }}">
                                                            <label for="floatingPassword">E-mail</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="password"
                                                                class="form-control form-control-lg"
                                                                id="floatingInput" placeholder="Mot de passe"
                                                                name="password">
                                                            <label for="floatingInput">Mot de passe</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="password"
                                                                class="form-control form-control-lg"
                                                                id="floatingPassword"
                                                                placeholder="Confirmer le mot de passe"
                                                                name="password_confirmation">
                                                            <label for="floatingPassword">Confirmer</label>
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

                                                <div class="row patient">
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

    <!-- Team Start -->
    <div class="container-xxl py-5" id="docteurs">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Docteurs</h6>
                <h1 class="mb-5">No meilleurs docteurs</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 ">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('adn.jpg') }}" alt="">
                        </div>
                        <div class=" justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Docteur</h5>
                            <small>Spécialité</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('adn.jpg') }}" alt="">
                        </div>
                        <div class=" justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Docteur</h5>
                            <small>Spécialité</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('adn.jpg') }}" alt="">
                        </div>
                        <div class=" justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Docteur</h5>
                            <small>Spécialité</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('adn.jpg') }}" alt="">
                        </div>
                        <div class=" justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Docteur</h5>
                            <small>Spécialité</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('adn.jpg') }}" alt="">
                        </div>
                        <div class=" justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Docteur</h5>
                            <small>Spécialité</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('adn.jpg') }}" alt="">
                        </div>
                        <div class=" justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Docteur</h5>
                            <small>Spécialité</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('adn.jpg') }}" alt="">
                        </div>
                        <div class=" justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Docteur</h5>
                            <small>Spécialité</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('adn.jpg') }}" alt="">
                        </div>
                        <div class=" justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Docteur</h5>
                            <small>Spécialité</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

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

    <!-- Function used to shrink nav bar removing paddings and adding black background -->
    {{-- <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script> --}}

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
        $('.navTrigger').click(function() {
            $(this).toggleClass('active');
            console.log("Clicked menu");
            $("#mainListDiv").toggleClass("show_list");
            $("#mainListDiv").fadeIn();

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
</body>

</html>
