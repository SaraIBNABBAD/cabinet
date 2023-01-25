@extends('doctor.templateDt')
@section('title', 'fjj')
@section('content')
    <section class="h-100 ">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-3">Ajouter Patient</h2>

                                <form method="POST" action="{{ route('Dpatient.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Nom complet" name="name"/>
                                                <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" id="floatingInput"
                                                    class="form-control form-control-lg" placeholder="Téléphone" name="phone"/>
                                                <label for="floatingInput">Téléphone <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-control-lg" id="floatingInput"
                                            placeholder="Adresse mail" name="email"/>
                                        <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Mot de passe" name="password"/>
                                                <label for="floatingInput">Mot de passe <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Confirmer le mot de passe"
                                                    name="confirmation_password"/>
                                                <label for="floatingInput">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-control-lg" id="floatingInput"
                                            placeholder="Adresse de résidence" name="address"/>
                                        <label for="floatingInput">Adresse</label>
                                    </div>

                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                        <h6 class="mb-0 me-4">Sexe : <span class="text-danger">*</span></h6>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="femme" value="Femme" />
                                            <label class="form-check-label" for="femme">Femme</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="homme" value="Homme" />
                                            <label class="form-check-label" for="homme">Homme</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4 me-5">
                                            <label>Groupe Sanguin :</label>
                                            <select class="form-select" aria-label="Default select example" name="sang">
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
                                        <div class="col-md-6 mb-4 me-5">
                                            <div class="form-floating mb-4">
                                                <input type="date" class="form-control form-control-lg" id="floatingInput"
                                                    placeholder="Date de naissance" name="birth">
                                                <label for="floatingInput">Date de naissance</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                        <h6 class="mb-0 me-4">Mutuelle : <span class="text-danger">*</span></h6>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="mutuelle"
                                                id="oui" value="oui" />
                                            <label class="form-check-label" for="oui">Oui</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="non" value="non" />
                                            <label class="form-check-label" for="non">Non</label>
                                        </div>


                                    </div>

                                    

                                    <div class="form-outline mb-4">
                                        <h6 class="form-labelv" for="picture">Photo :</h6>
                                        <input type="file" id="picture" class="form-control form-control-lg"
                                            name="picture" accept="image/*" />
                                    </div>

                                    <div class="d-flex justify-content-end pt-3">
                                        <button type="submit" class="btn btn-success btn-lg ms-2"
                                            name="sign">Ajouter</button>
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
