@extends('admin.templateAd')
@section('title', 'fjj')
@section('content')
    <section class="h-100 ">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-3">Ajouter docteur</h2>

                                <form>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Nom complet" name="name">
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
                                            placeholder="Adresse mail" name="email">
                                        <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Mot de passe" name="password">
                                                <label for="floatingInput">Mot de passe <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Confirmer le mot de passe"
                                                    name="confirmation_password">
                                                <label for="floatingInput">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
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
                                                <label for="splt">Spécialté : <span class="text-danger">*</span></label>
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
                                    <button type="button" class="btn btn-success btn-lg ms-2" name="sign">S'enregister</button>
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
