@extends('admin.templateAd')
@section('title', 'fjj')
@section('content')
    <section class="h-100 ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="{{ asset('img/signup/dd.jpg') }}" alt="doctor photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:132vh" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-3 text-uppercase">Ajouter Patient</h3>
                                    
                                    <form action="" method="post">
                                        @csrf

                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control form-control-lg" id="floatingInput"
                                                placeholder="Nom complet">
                                            <label for="floatingInput">Nom complet</label>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control form-control-lg" id="floatingInput"
                                                placeholder="Adresse mail">
                                            <label for="floatingInput">E-mail</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="floatingInput" placeholder="Mot de passe">
                                                    <label for="floatingInput">Mot de passe</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="floatingInput" placeholder="Confirmer le mot de passe">
                                                    <label for="floatingInput">Confirmer le mot de passe</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control form-control-lg" id="floatingInput"
                                                placeholder="Adresse de résidence">
                                            <label for="floatingInput">Adresse</label>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Sexe : <span class="text-danger">*</span></h6>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="femme" value="femme" />
                                                <label class="form-check-label" for="femme">Femme</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="homme" value="homme" />
                                                <label class="form-check-label" for="homme">Homme</label>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="date" class="form-control form-control-lg" id="floatingInput"
                                                placeholder="Date de naissance">
                                            <label for="floatingInput">Date de naissance</label>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control form-control-lg" id="floatingInput"
                                                placeholder="Numéro de téléphone">
                                            <label for="floatingInput">Numéro de téléphone</label>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Mutuelle : <span class="text-danger">*</span></h6>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="oui" value="oui" />
                                                <label class="form-check-label" for="oui">Oui</label>
                                            </div>
                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="non" value="non" />
                                                <label class="form-check-label" for="non">Non</label>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6 mb-4 me-5">
                                                <label>Groupe Sanguin :</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option value="1">O</option>
                                                    <option value="2">A</option>
                                                    <option value="3">B</option>
                                                    <option value="3">AB</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <h6 class="form-labelv" for="picture">Photo :</h6>
                                            <input type="file" id="picture" class="form-control form-control-lg"
                                                name="picture" accept="image/*" />
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="button"
                                                class="btn btn-success btn-lg ms-2">S'enregister</button>
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
@endsection
