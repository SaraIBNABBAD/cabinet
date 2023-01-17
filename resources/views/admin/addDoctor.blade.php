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

                                                <label for="floatingInput">Nom complet <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" id="floatingInput"
                                                    class="form-control form-control-lg" placeholder="Téléphone"
                                                    name="phone" />
                                                <label for="floatingInput">Téléphone <span
                                                        class="text-danger">*</span></label>
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
                                                <input type="password" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Mot de passe" name="password">
                                                <label for="floatingInput">Mot de passe <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Confirmer le mot de passe"
                                                    name="confirmation_password">
                                                <label for="floatingInput">Confirmer le mot de passe <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label>Photo :</label>
                                        <input type="file" id="picture" class="form-control form-control-lg"
                                            name="picture" accept="image/*" />
                                    </div>


                                    <label for="splt">Spécialté : <span class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="specialty">

                                        <option value="La médecine générale">La médecine générale</option>
                                        <option value="Cardiologie">Cardiologie</option>
                                        <option value="Dermatologie">Dermatologie</option>
                                        <option value="Gastro-entérologie">Gastro-entérologie</option>
                                        <option value="L’ophtalmologie">L’ophtalmologie</option>
                                        <option value="La pédiatrie">La pédiatrie</option>
                                        <option value="La pneumologie">La pneumologie</option>
                                    </select>
                            </div>



                            <div class="d-flex justify-content-end pt-3 me-5">
                                <button type="button" class="btn btn-success btn-lg ms-2"
                                    name="sign">S'enregister</button>
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
