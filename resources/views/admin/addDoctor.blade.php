
@extends('admin.templateAd')
@section('title','Ajouter Docteur')

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
                                <h3 class="mb-3 text-uppercase">Ajouter Docteur</h3>

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
                                  <div class="col-xl-6 mb-4">
                                    <label for="role">Role :</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">Docteur</option>
                                       
                                    </select>

                                </div>
                                    <div class="col-xl-6 mb-4">
                                        <label for="splt">Spécialté :</label>
                                        <select class="form-select" aria-label="Default select example">
                                          
                                          <option value="1">La médecine générale</option>  
                                          <option value="2">Cardiologie</option>
                                            <option value="3">Dermatologie</option>
                                            <option value="4">Gastro-entérologie</option>
                                            <option value="5">L’ophtalmologie</option>
                                            <option value="6">La pédiatrie</option>
                                            <option value="7">La pneumologie</option>
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
@endsection




