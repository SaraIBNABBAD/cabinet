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
    {{-- <link rel="stylesheet" href="{{ asset('css/form.css') }}"> --}}




</head>

<body>
    <nav>
        <div class="container-fluid navbar fixed-top navbar-expand-lg navbar-light" id="navig" width="100%">
            <a class="navbar-brand col-md-3" href="#" id="logos">
                <img src="./medicalr.png" alt="medical" width="60px" class="medic">
                <span>IAF Cabinet</span> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="color">
                    <li class="nav-item current">
                        <a class="nav-link " aria-current="page" href="#homee">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#apropos">A&nbsp;propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#departements">Départements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#gallerie">Galerie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#docteurs">Docteurs</a>
                    </li>
                    <li class="nav-item" id="questionss">
                        <a class="nav-link " href="#question">qf</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#contact">Contact</a>
                    </li>
                </ul>
                <div class="dropdown col-md-3">
                    @if (Route::has('login'))
                        @auth
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Bienvenue {{ Auth::user()->name }} @if (Auth::user()->picture == null)
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
                                    <a href="{{ route('docApp.index') }}" class="dropdownlink"><i
                                            class="fa-solid fa-right-to-bracket"></i><span class="seconditem">&nbsp
                                            Dashboard</span> </a>
                                </li>
                                <li>
                                @elseif (Auth::user()->role == 'Assistant')
                                    <a href="{{ route('asPoint.index') }}" class="dropdownlink"><i
                                            class="fa-solid fa-right-to-bracket"></i><span class="seconditem">&nbsp
                                            Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                @elseif (Auth::user()->role == 'Doctor')
                                    <a href="{{ route('docApp.index') }}" class="dropdownlink"><i
                                            class="fa-solid fa-right-to-bracket"></i><span class="seconditem"></span>&nbsp
                                        Dashboard </a>
                        @endif
                        </li>
                        <hr class="dropdown-divider">
                        <li>
                            <a href="{{ route('logout') }}" class="dropdownlink"><i &nbsp
                                    class="fa-solid fa-right-to-bracket"></i>
                                <span class="seconditem"> Se déconnecter </span> </a>
                        </li>
                        </ul>
                    @else
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false"> Compte
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <span class="seconditem">&nbsp S'authentifier</span>
                                </a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    <span class="seconditem">&nbspS'enregistrer</span>
                                </a>
                            </li>
                        </ul>
                        @endif
                    @endauth
                </div>
            </div>

        </div>
    </nav>

    <section class="home" id="homee">
    </section>
    <!-- *****  Banner Area Start ***** -->

    <section class="iaf">
        <h6>Bienvenue chez <em>IAF</em> Cabinet</h6>
        <h2>Un geste technique c'est bien , un geste qui <em>SAUVE</em> c'est mieux.</h2>


        <div class="main-button">
            @if (Route::has('signup'))
                <a data-bs-toggle="modal" data-bs-target="#exampleModal2" class="dropdownlink">Créer votre
                    compte</a>
            @endif
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
                                <h4><i class="fa-solid fa-user-doctor"></i>Docteurs qualifiés</h4>
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


    <!-- ********** A propos *************** -->
    <section id="apropos">
        <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="section-title bg-white text-center px-3">A Propos de nous</h1>
            <div class="separator_auto"></div>
        </div>
        <div class="aproposdenous">
            <div class="container">
                <div class="row">
                    <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                        <div class="inner-column" id="bienetre">
                            <div class="sec-title">
                                <span class="title">IAF Cabinet</span>
                                <h2>Votre bien être , Notre passion !</h2>
                            </div>
                            <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi vitae et
                                voluptate molestiae veniam quos officia, atque fugiat blanditiis velit.</div>
                            <div class="btn-box">
                                <a href=" "data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                    class="theme-btn btn-style-one">Enregistrez-vous</a>
                            </div>
                        </div>
                    </div>

                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="author-desc">
                                <h2>IAF Cabinet</h2>
                                <span>Votre cabinet médical</span>
                            </div>
                            <figure class="image-1"><a href="#"><img title="IAF"
                                        src="{{ asset('1.jpg') }}" alt="" width="420"
                                        height="300"></a></figure>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- ********** A propos End *************** -->


    <!--***************** Services *************************-->

    <section id="services">
        <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="section-title bg-white text-center px-3">Services</h1>
            <div class="separator_auto"></div>
            <h2 class="mb-5">Découvrez nos services</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="column col-md-3" data-aos="fade-up" data-aos-duration="800">
                    <div class="cardx bg-light">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <h3 class="h33">Prise de rendez-vous simple et rapide</h3>
                        <p class="pp">
                            Prenez un rendez-vous avec votre message soit en ligne , soit en nous appelant au
                            +212.666.123.323
                        </p>
                    </div>
                </div>
                <div class="column col-md-3" data-aos="fade-up" data-aos-duration="1100">
                    <div class="cardx">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-user-nurse"></i>
                        </div>
                        <h3 class="h33">Soins infirmiers</h3>
                        <p class="pp">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam
                            consequatur necessitatibus eaque.
                        </p>
                    </div>
                </div>
                <div class="column col-md-3" data-aos="fade-up" data-aos-duration="1400">
                    <div class="cardx">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-tooth"></i>
                        </div>
                        <h3 class="h33">Soins et prothèses dentaires</h3>
                        <p class="pp">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam
                            consequatur necessitatibus eaque.
                        </p>
                    </div>
                </div>
                <div class="column col-md-3" data-aos="fade-up" data-aos-duration="1700">
                    <div class="cardx">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-stethoscope"></i>
                        </div>
                        <h3 class="h33">Contre visite</h3>
                        <p class="pp">
                            Luttez contre l’absentéisme au sein de votre entreprise en demandant des contres visites
                            médicales
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--***************** Services End*************************-->

    <!--********************DEPARTEMENT**********************-->
    <section id="departements">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="section-title bg-white text-center px-3">Départements</h1>
                    <div class="separator_auto"></div>
                    <h2 class="mb-5">Découvrez nos départements</h2>
                </div>
                <div class="row g-4">
                    @foreach ($doctors as $doctor)
                        <div class="col-lg-3 col-md-6" id="sir">
                            <div class="team-item" style="background-color: #00B3FF">
                                <div class="text-center p-4">
                                    <h3 class="mb-0" style="font-size: 1.2em">
                                        {{ $doctor->speciality }}
                                    </h3>
                                </div>
                            </div>
                            <div class="team-item bg-light">
                                <div class="text-center p-4" data-aos="fade-up" data-aos-duration="1000">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt animi, consectetur
                                        sed
                                        ut voluptate doloribus reprehenderit, earum quibusdam, hic fuga suscipit? Ullam
                                        praesentium ex autem iste fuga asperiores, amet similique.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>



    <!--********************GALERIE **********************-->
    <section id="gallerie">
        <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="section-title bg-white text-center px-3">Gallerie</h1>
            <div class="separator_auto"></div>
            <h2 class="mb-5">La joie partagée grandit</h2>
        </div>
        <div class="gallery-image">
            <div class="img-box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <img src="{{ asset('gal1.jpg') }}" alt="" style="object-fit:cover;" />
                <div class="transparent-box">
                    <div class="caption">
                        <p>Solidaire</p>
                        <p class="opacity-low">Suivi continue</p>
                    </div>
                </div>
            </div>
            <div class="img-box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <img src="{{ asset('gal2.jpg') }}" alt="" style="object-fit:cover;" />
                <div class="transparent-box">
                    <div class="caption">
                        <p>Solidaire</p>
                        <p class="opacity-low">Suivi continue</p>
                    </div>
                </div>
            </div>
            <div class="img-box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <img src="{{ asset('gal3.jpg') }}" alt="" style="object-fit:cover;" />
                <div class="transparent-box">
                    <div class="caption">
                        <p>Solidaire</p>
                        <p class="opacity-low">Suivi continue</p>
                    </div>
                </div>
            </div>
            <div class="img-box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <img src="{{ asset('gal4.jpg') }}" alt="" style="object-fit:cover;" />
                <div class="transparent-box">
                    <div class="caption">
                        <p>Solidaire</p>
                        <p class="opacity-low">Suivi continue</p>
                    </div>
                </div>
            </div>
            <div class="img-box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <img src="{{ asset('gal5.jpg') }}" alt="" style="object-fit:cover;" />
                <div class="transparent-box">
                    <div class="caption">
                        <p>Solidaire</p>
                        <p class="opacity-low">Suivi continue</p>
                    </div>
                </div>
            </div>
            <div class="img-box" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <img src="{{ asset('gal6.jpg') }}" alt="" style="object-fit:cover;" />
                <div class="transparent-box">
                    <div class="caption">
                        <p>Solidaire</p>
                        <p class="opacity-low">Suivi continue</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Team Start -->
    <section id="docteurs">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="section-title bg-white text-center px-3">Docteurs</h1>
                    <div class="separator_auto"></div>
                    <h2 class="mb-5">No meilleurs docteurs</h2>
                </div>
                <div class="row g-4">
                    @foreach ($doctors as $doctor)
                        <div class="col-lg-3 col-md-6 ">
                            <div class="team-item bg-light">
                                <div class="overflow-hidden">
                                    <img src="{{ $doctor->picture }}" alt="" class="img-fluid"
                                        style="object-fit:auto;">
                                </div>
                                <div class=" justify-content-center">
                                    <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                        <a class="btn btn-sm-square btn-primary mx-1" id="hi"
                                            href=""><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" id="hi"
                                            href=""><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-sm-square btn-primary mx-1" id="hi"
                                            href=""><i class="fab fa-instagram"></i></a>
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
    </section>


    <!-- Team End -->

    <!-- ======= Questions fréquentes ======= -->

    <section id="questions">
        <div class="text-center">
            <h1 class="section-title bg-white text-center px-3">Questions fréquentes ?</h1>
            <div class="separator_auto"></div>
            <h2 class="mb-5">Ayez des réponses concrètes à vos questions</h2>
        </div>
        <div class="accordion" id="accordionExample" data-aos="fade-up" data-aos-duration="800">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4>Qui êtes vous ?</h4>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="h5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas
                            dolore
                            id deleniti ipsum
                            rem minima unde quia, aut assumenda!</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h4>Que proposez vous ?</h4>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="h5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas
                            dolore
                            id deleniti ipsum
                            rem minima unde quia, aut assumenda!</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h4 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h4> Pourquoi passer par vous ?</h4>
                    </button>
                </h4>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="h5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas
                            dolore
                            id deleniti ipsum
                            rem minima unde quia, aut assumenda!</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <h4> Comment puis-je prendre un rendez-vous ?</h4>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="h5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas
                            dolore
                            id deleniti ipsum
                            rem minima unde quia, aut assumenda!</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <h4> Comment se déroule la prise en charge ?</h4>
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="h5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas
                            dolore
                            id deleniti ipsum
                            rem minima unde quia, aut assumenda!</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <h4> Comment puis-je récupérer mon dossier médical ?</h4>
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="h5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quas
                            dolore
                            id deleniti ipsum
                            rem minima unde quia, aut assumenda!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Questions fréquentes -->

    <!-- Footer Start -->
    <section id="contact">
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Lien rapide</h4>

                        <a class="btn btn-link" href="#apropos">A propos</a>
                        <a class="btn btn-link" href="#services">Services</a>
                        <a class="btn btn-link" href="#departements">Départements</a>
                        <a class="btn btn-link" href="#gallerie">Gallerie</a>
                        <a class="btn btn-link" href="#docteurs">Docteurs</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Contact</h4>

                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Hay el baraka , 20080 , CASABLANCA
                        </p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212.666.123.323</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>IAF@cabinet.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Gallery</h4>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('gal1.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('gal2.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('gal3.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('gal4.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('gal5.jpg') }}" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="{{ asset('gal6.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Contactez-nous</h4>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal3">
                            <button class="btn btn-primary" role="button">En un seul click</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer End -->



    <!-- Scroll to top -->
    <a id='btn' href="#">
        <i class="bi bi-arrow-up-circle"></i>
    </a>
    <script>
        // Get the button
        let mybutton = document.getElementById("btn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <!-- Le formulaire de contact-->

    <div class="modal fade" id="exampleModal3" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="contact_us_green">
                    <div class="responsive-container-block big-container">
                        <div class="responsive-container-block container">
                            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-7 wk-ipadp-10 line"
                                id="i69b-2">
                                <form class="form-box">
                                    <div class="container-block form-wrapper">
                                        <div class="head-text-box">
                                            <p class="text-blk contactus-head">
                                                Contact us
                                            </p>
                                            <p class="text-blk contactus-subhead">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna al iqua. Ut enim
                                            </p>
                                        </div>
                                        <div class="responsive-container-block">
                                            <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6"
                                                id="i10mt-6">
                                                <p class="text-blk input-title">
                                                    Nom
                                                </p>
                                                <input class="input" id="ijowk-6" name="FirstName">
                                            </div>
                                            <div
                                                class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                                <p class="text-blk input-title">
                                                    Prénom
                                                </p>
                                                <input class="input" id="indfi-4" name="Last Name">
                                            </div>
                                            <div
                                                class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                                <p class="text-blk input-title">
                                                    Adresse mail
                                                </p>
                                                <input class="input" id="ipmgh-6" name="Email">
                                            </div>
                                            <div
                                                class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                                                <p class="text-blk input-title">
                                                    Numéro de téléphone
                                                </p>
                                                <input class="input" id="imgis-5" name="PhoneNumber">
                                            </div>
                                            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12"
                                                id="i634i-6">
                                                <p class="text-blk input-title">
                                                    Votre message
                                                </p>
                                                <textarea class="textinput" id="i5vyy-6" placeholder="Veuillez saisir votre message ici..."></textarea>
                                            </div>
                                        </div>
                                        <div class="btn-wrapper">
                                            <button class="submit-btn">
                                                Envoyer
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-5 wk-ipadp-10"
                                id="ifgi">
                                <div class="container-box">
                                    <div class="text-content">
                                        <p class="text-blk contactus-head">
                                            Contactez-nous !
                                        </p>
                                        <p class="text-blk contactus-subhead">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna al iqua. Ut enim
                                        </p>
                                    </div>
                                    <div class="workik-contact-bigbox">
                                        <div class="workik-contact-box">
                                            <div class="phone text-box">
                                                <img class="contact-svg"
                                                    src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET21.jpg">
                                                <p class="contact-text">
                                                    +212.666.123.323
                                                </p>
                                            </div>
                                            <div class="address text-box">
                                                <img class="contact-svg"
                                                    src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET22.jpg">
                                                <p class="contact-text">
                                                    iaf@cabinet.com
                                                </p>
                                            </div>
                                            <div class="mail text-box">
                                                <img class="contact-svg"
                                                    src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/ET23.jpg">
                                                <p class="contact-text">
                                                    Hay el baraka , 20080 , CASABLANCA
                                                </p>
                                            </div>
                                        </div>
                                        <div class="social-media-links">
                                            <a href="">
                                                <img class="social-svg" id="is9ym"
                                                    src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-mail.svg">
                                            </a>
                                            <a href="">
                                                <img class="social-svg" id="i706n"
                                                    src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-twitter.svg">
                                            </a>
                                            <a href="">
                                                <img class="social-svg" id="ib9ve"
                                                    src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-insta.svg">
                                            </a>
                                            <a href="">
                                                <img class="social-svg" id="ie9fx"
                                                    src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/gray-fb.svg">
                                            </a>
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


    <!-- Le model de l'authentification-->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div class="modal fade" id="exampleModal2" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <div class="card-body p-md-9 text-black">
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

                                                    <div class="col-md-4 mb-4 ">
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





    <!-- Jquery needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        $(document).ready(function() {
            $(window).on('scroll', function() {
                if ($(window).scrollTop()) {
                    $("#navig").addClass('bgc');
                } else {
                    $("#navig").removeClass('bgc');
                }
            });
        });
    </script>



    <script>
        AOS.init();
    </script>

    {{-- <script src="js/jquery.min.js"></script> --}}
    {{-- <p>script</p> --}}

    {{-- <script src="js/bootstrap.min.js"></scr> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/form.js') }}"></script>




    <script>
        let sections = document.querySelectorAll('section');
        let navLinks = document.querySelectorAll(' nav a');

        window.onscroll = () => {
            sections.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id');

                if (top >= offset && top < offset + height) {
                    navLinks.forEach(links => {
                        links.classList.remove('active');
                        document.querySelector(' nav a[href*=' + id + ']').classList.add('active');
                    });
                };
            })
        };
    </script>

</body>

</html>
