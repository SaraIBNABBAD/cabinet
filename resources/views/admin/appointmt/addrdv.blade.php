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
                                <h2 class="text-uppercase text-center mb-3">Ajouter un Rendez Vous</h2>

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

                                    

                                    <div class="form-floating mb-4">
                                        <div class="form-outline">
                                            <label for="floatingInput">Motif</label>
                                            <textarea class="form-control form-control-lg" id="textAreaExample1" rows="4"> </textarea>
                                          </div>
                                    </div>

                                    <div class="d-flex justify-content-end pt-3">
                                        <button type="button" class="btn btn-success btn-lg ms-2"
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
