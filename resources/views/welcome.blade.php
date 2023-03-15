<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>IAF Cabinet</title>
    {{-- lien css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    {{-- lien animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">


</head>

<body>
    <div id="topbar" class="d-flex align-items-center ">
        <!-- Topbar Start -->
        <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <small class="py-2" id="clock"><i class="far fa-clock me-2" ></i>Temps d'ouverture: Lundi -
                            Samedi : 08.00 am - 18.00 pm, Fermé le Dimanche </small>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="position-relative d-inline-flex align-items-center  text-white top-shape px-5"
                        id="bgperso">
                        <div class="me-3 pe-3 border-end py-2">
                            <p class="m-0"><i class="fa fa-envelope-open me-2 "></i>iaf@cabinet.com</p>
                        </div>
                        <div class="py-2">
                            <p class="m-0"><i class="fa fa-phone-alt me-2 "></i>+212.661.10.10.11</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->
    </div>

    <section class="section-1" id="myNav">
    	<header>
    		<h2 class="logo">IAF Cabinet</h2>
	    	<nav class="navbar-default navbar-static-top navbar-fixed-top"> <!-- pour ne pas revenir a son état initiale après f5-->
	    		<a href="#topbar"  class="na active" >Acceuil</a>
                <a href="#apropos" class="na">A&nbsppropos</a>
        		<a href="#services" class="na" >Services</a>
                <a href="#gallery" class="na">Galerie</a>
                <a href="#team" class="na">Docteurs</a>
                <a href="#contact" class="na">Contact</a>
                <a href="#end" class="na">End</a>
	    	</nav>
            <div class="col-md-2 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center   top-shape ">
                    <div class="py-0">
                        <div class="dropdown">
                                <div class="bienvenue">
                                    @if (Route::has('login'))
                                @auth
                                    <button class="dropbtn">Bienvenue {{ Auth::user()->name }}</button>
                                    {{-- <img src="{{ asset('medicall.jpg') }}" id="logo" alt="medical"> --}}
                                   
                                </div>
                                    <div class="dropdown-content">
                                        <a href="{{ url('/templteboard') }}" ><i class="fa-solid fa-right-to-bracket" id="con4"></i>Dashboard </a>
                                        <a href="{{ route('logout') }}" ><i class="fa-solid fa-right-to-bracket" id="con3"></i>Se déconnecter </a>
                            </div>
                            
        
                            <div class="dropdown">
                                
                            @else
                                {{-- <button class="dropbtn"><a href="#" data-toggle="modal" data-target="#modal1">S'authentifier</a>  <i class="fa-regular fa-computer-mouse-scrollwheel"></i></button>  --}}
        
                                <!-- Button trFigger modal -->
                                <button type="button" class="bienvenue2">
                                  <i class="fa-solid fa-user" id="userr"></i> Compte
                                </button>
                                {{-- <button class="dropbtn">En un seul click <i class="fa-regular fa-computer-mouse-scrollwheel"></i></button>  --}}
                        <div class="dropdown-content">
                           
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fa-solid fa-right-to-bracket" id="con"></i>&nbsp Se connecter </button>
                        @if (Route::has('signup'))
                       {{-- <a href="#" data-toggle="modal" data-target="#exampleModal2" ><i class="fa-solid fa-user-plus" id="con2"></i>S'enregistrer</a>  --}}
                       <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal2" ><i class="fa-solid fa-user-plus" id="con2"></i>&nbsp S'enregistrer </button>
                        @endif
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	</header>
    </section>






    <!-- Le model de l'authentification-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
          <div class="modal-content" >
                <div class="container py-3 h-80" >
                    <div class="row d-flex justify-content-center align-items-center h-80"  >
                        <div class="col col-xl-12" >
                            <div class="card" style="border-radius: 1rem;" >
                                <div class="row g-0" >
                                    <div class="col-md-6 col-lg-6 d-none d-md-block">
                                        <img src="{{ asset('img/signup/docs.jpg') }}" alt="login form"
                                            class="img-fluid"
                                            style="border-radius: 1rem 0 0 1rem;height:84vh" />
                                    </div>
                                    
                                    <div class="col-md-6 col-lg-6 d-flex align-items-center" >
                                        <div class="card-body p-7 p-lg-7 text-black">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                    <button class="btn btn-primary btn-sm btn-block"
                                                        type="submit" >Se connecter</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-block" data-bs-dismiss="modal">Annuler</button>
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


    <!--******************************************-->



  <!-- Le model de l'enregistrement-->

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content" >
        <div class="container py-3 h-80">
            <div class="row d-flex justify-content-center align-items-center h-80">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-3 d-none d-xl-block">
                                <img src="{{ asset('img/signup/dd.jpg') }}" alt="doctor photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:145vh" />
                            </div>
                            <div class="col-xl-9">
                                <div class="card-body p-md-5 text-black">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
          
                                        @csrf
          
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="floatingInput" placeholder="Nom complet" name="name" value="{{old('name')}}" >
                                                    <label for="floatingInput">Nom complet</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-floating mb-4">
                                                    <input type="text" id="floatingInput"
                                                        class="form-control form-control-lg @error('phone')is-invalid
                                                        
                                                    @enderror"
                                                        placeholder="Téléphone" name="phone" value="{{old('phone')}}"  />
                                                    <label for="floatingInput">Téléphone <span class="text-danger">*</span></label>
                                                </div>
                                                @error('phone')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            
                                            <div class="col-md-4 mb-4 ">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control form-control-lg" id="floatingInput"
                                                        placeholder="Adresse de résidence" name="address" value="{{old('address')}}" />
                                                    <label for="floatingInput">Adresse</label>
                                                </div>
                                            </div>
                                        </div>
          
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-floating mb-4">
                                                    <input type="email" class="form-control form-control-lg"
                                                        id="floatingPassword" placeholder="Adresse mail" name="email" value="{{old('email')}}" >
                                                    <label for="floatingPassword">E-mail</label>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-4">
                                                <div class="form-floating mb-4">
                                                    <input type="password" class="form-control form-control-lg"
                                                        id="floatingInput" placeholder="Mot de passe" name="password">
                                                    <label for="floatingInput">Mot de passe</label>
                                                </div>
                                            </div>
          
          
                                            <div class="col-md-4">
                                                <div class="form-floating mb-4">
                                                    <input type="password" class="form-control form-control-lg"
                                                        id="floatingPassword" placeholder="Confirmer le mot de passe"
                                                        name="password_confirmation">
                                                    <label for="floatingPassword">Confirmer</label>
                                                </div>
                                            </div>
                                        </div>
          
                                        <div class="row" hidden>
                                            <div class="col-md-10 mb-4">
                                                <label for="splt">Role : <span class="text-danger">*</span></label>
                                                <select class="form-select form-select-lg role" aria-label="Default select example"
                                                    name="role">
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
                                                        id="floatingInput" placeholder="Date de naissance" name="birth" value="{{old('birth')}}" >
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
                                                <select class="form-select" aria-label="Default select example" name="sang" >
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
                        
                                                <h6 class="mb-0 me-4 d-inline">Sexe : <span class="text-danger">*</span></h6>
                        
                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input
                                                        class="form-check-input @error('gender')is-invalid
                                                        
                                                    @enderror"
                                                        type="radio" name="gender" id="femme" value="Femme"  />
                                                    <label class="form-check-label" for="femme">Femme</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input
                                                        class="form-check-input @error('gender')is-invalid
                                                        
                                                    @enderror"
                                                        type="radio" name="gender" id="homme" value="Homme" />
                                                    <label class="form-check-label" for="homme">Homme</label>
                                                </div>
                                                @error('gender')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                        
                        
                                            <div class="col-md-6">
                        
                                                <h6 class="mb-0 me-4 d-inline">Mutuelle : <span class="text-danger">*</span></h6>
                        
                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input
                                                        class="form-check-input @error('mutuelle')is-invalid
                                                        
                                                    @enderror"
                                                        type="radio" name="mutuelle" id="oui" value="oui"  />
                                                    <label class="form-check-label" for="oui">Oui</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input
                                                        class="form-check-input @error('mutuelle')is-invalid
                                                        
                                                    @enderror"
                                                        type="radio" name="mutuelle" id="non" value="non" />
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
                                            <button type="button" class="btn btn-danger btn-sm btn-block" data-bs-dismiss="modal">Annuler</button>
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


<!--*******************Acceuil***********************-->



<section id="apropos">
<h1>Acceuil</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut minima, qui deserunt in repellendus temporibus eveniet illo reiciendis illum vero reprehenderit fugiat velit quasi, praesentium numquam deleniti voluptate dolorum fugit!</p>
</section>


  <!--******************************************-->



    <section id="end">
        <h1>hello</h1>
        <img src="{{asset('4.jpg')}}" alt="">
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id, atque?</p>
    </section>

    <!-- End Contact-->
    <script>
        AOS.init();
    </script>
    <script>
        document.querySelector('#contact-form').addEventListener('submit', (e) => {
            e.preventDefault();
            e.target.elements.name.value = '';
            e.target.elements.email.value = '';
            e.target.elements.message.value = '';
        });
    </script>

<script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("myNav");
    var na = header.getElementsByClassName("na");
    for (var i = 0; i < na.length; i++) {
      na[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
      });
    }
    </script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script>
      $(document).ready(function(){
          $(window).on('scroll', function(){
              if ($(window).scrollTop()) {
                  $("header").addClass('bgc');
              }else{
                  $("header").removeClass('bgc');
              }
          });
      });
  </script>


<script src="{{ asset('js/form.js') }}"></script>


</body>

</html>
