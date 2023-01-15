<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="{{ asset('css/form.css') }}"> --}}
  <title>Document</title>
</head>
<body>
  <section class="vh-100" >
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="{{ asset('img/signup/docs.jpg') }}"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:100vh" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
 
                  <form method="post" action="" >
                     @csrf

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">Logo</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">
                      Connectez-vous à votre compte</h5>
  
                    <div class="form-outline mb-4">
                      <input type="email" id="email" class="form-control form-control-lg @error('email')is-invalid @enderror" name="email"/>
                      <label class="form-label" for="email">Adresse E-mail</label>
                    </div>
                    @error('email')
                      <div class="alert alert-danger">
                        {{$message}}
                      </div>
                    @enderror
  
                    <div class="form-outline mb-4">
                      <input type="password" id="password" class="form-control form-control-lg @error('password')is-invalid
                        
                      @enderror" name="password" />
                      <label class="form-label" for="password" >Mot de passe</label>
                    </div>
                    @error('password')
                    <div class="alert alert-danger">
                      {{$message}}
                    </div>
                  @enderror
  
                    <div class="pt-1 mb-4">
                      <button class="btn btn-success btn-lg btn-block" type="button" name="login">Se connecter</button>
                    </div>
  
                    <a class="small text-muted" href="#!">Mot de passe oublié?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">vous n'avez pas de compte ? <a href="{{ route('signup')}}"
                        style="color: #393f81;">S'enregistrer ici </a></p>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>