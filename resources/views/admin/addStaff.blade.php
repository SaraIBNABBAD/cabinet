<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <title>Document</title>
</head>

<body>
    <section class="h-100 ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="{{ asset('img/signup/staff.jpg') }}" alt="doctor photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:132vh" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-3 text-uppercase">Ajouter staff</h3>

                                    <div class="form-floating mb-4">
                                        <input type="text" id="name" class="form-control form-control-lg"
                                            id="floatingInput" placeholder="Nom complet">
                                        <label for="name">Nom complet</label>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="text" id="name" class="form-control form-control-lg"
                                            id="floatingInput" placeholder="Email">
                                        <label for="email">E-mail</label>
                                    </div>


                                    <div class="row">

                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Mot de passe">
                                                <label for="password">Mot de passe</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Confirmer le mot de passe">
                                                <label for="confirmation_password">Confirmer le mot de passe</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-control-lg" id="floatingInput"
                                            placeholder="Numéro de téléphone">
                                        <label for="telephone">Numéro de téléphone</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label>Photo :</label>
                                        <input type="file" id="picture" class="form-control form-control-lg"
                                            name="picture" accept="image/*" />
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 mb-4 me-5">
                                            <label>Role :</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option value="1">Assitant</option>
                                                <option value="2">Infermiers</option>
                                                <option value="3">Ouvrier de mennage</option>
                                                
                                            </select>
    
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="d-flex justify-content-end pt-3 me-5">
                                    <button type="button" class="btn btn-success btn-lg ms-2">S'enregister</button>
                                </div>

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

</html>
