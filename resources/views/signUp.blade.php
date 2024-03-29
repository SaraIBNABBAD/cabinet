<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    

    <title>Document</title>
</head>

<body>
    <section class="h-100 ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row mb-4">
                            <div class="col-xl-4 d-none d-xl-block">
                                <img src="{{ asset('img/signup/dd.jpg') }}" alt="doctor photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:85vh" />
                            </div>
                            <div class="col-xl-8">
                                <div class="card-body p-md-5 text-black">
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

                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <div class="form-floating ">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="floatingInput" placeholder="Nom complet" name="name">
                                                    <label for="floatingInput">Nom complet</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating ">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="floatingInput" placeholder="Adresse de résidence"
                                                        name="address" />
                                                    <label for="floatingInput">Adresse</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="text" id="floatingInput"
                                                        class="form-control form-control-lg @error('phone')is-invalid
                                                        
                                                    @enderror"
                                                        placeholder="Téléphone" name="phone" />
                                                    <label for="floatingInput">Téléphone <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                @error('phone')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            
                                        </div>

                                        

                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control form-control-lg"
                                                        id="floatingPassword" placeholder="Adresse mail" name="email">
                                                    <label for="floatingPassword">E-mail</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control form-control-lg"
                                                        id="floatingInput" placeholder="Mot de passe" name="password">
                                                    <label for="floatingInput">Mot de passe</label>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="password" class="form-control form-control-lg"
                                                        id="floatingPassword" placeholder="Confirmer le mot de passe"
                                                        name="password_confirmation">
                                                    <label for="floatingPassword">Confirmer mot de passe</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-6">

                                                <h6 class="mb-0 me-4 d-inline">Sexe : <span
                                                        class="text-danger">*</span></h6>

                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input
                                                        class="form-check-input @error('gender')is-invalid
                                                        
                                                    @enderror"
                                                        type="radio" name="gender" id="femme"
                                                        value="Femme" />
                                                    <label class="form-check-label" for="femme">Femme</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input
                                                        class="form-check-input @error('gender')is-invalid
                                                        
                                                    @enderror"
                                                        type="radio" name="gender" id="homme"
                                                        value="Homme" />
                                                    <label class="form-check-label" for="homme">Homme</label>
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
                                        <div class="row mb-4" hidden>
                                            <div class="col-md-10 mb-4">
                                                <label for="splt">Role : <span class="text-danger">*</span></label>
                                                <select class="form-select form-select-lg role"
                                                    aria-label="Default select example" name="role">
                                                    <option value="Patient">Patient</option>
                                                </select>
                                            </div>
                                        </div>

                                        

                                        <div class="row mb-4">
                                            <div class="col-md-4  ">
                                                <label for="floatingInput">Date de naissance</label>
                                                    <input type="date"
                                                        class="form-control form-control-lg @error('birth')is-invalid
                                                        
                                                    @enderror"
                                                        id="floatingInput" placeholder="Date de naissance"
                                                        name="birth">
                                                    
                                                
                                                @error('birth')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4  ">
                                                <label>Groupe Sanguin :</label>
                                                <select class="form-select form-select-lg" aria-label="Default select example"
                                                    name="sang">
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
                                            <div class="col-md-4">
                                                <div class="form-outline ">
                                                    <label class="form-labelv" for="picture">Photo :</label>
                                                    <input type="file" id="picture"
                                                        class="form-control form-control-lg" name="picture"
                                                        accept="image/*" />
                                                </div>
                                            </div>
                                        </div>


                                        



                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="submit" class="btn btn-primary btn-lg ms-2"
                                                name="signup">S'enregister</button>
                                                {{-- <button type="button" class="btn btn-danger btn-sm ms-2" href="{{ url('/') }}" >Annuler</button> --}}
                                        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="{{ asset('js/form.js') }}"></script>

</html>
