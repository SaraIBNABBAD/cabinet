@extends('admin.templateAd')
@section('title','Ajouter staff')
@section('content')
<section>
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <h2 class="text-uppercase text-center mb-3">Ajouter staff</h2>

            <form>

              <div class="row">
                  <div class="col-md-6">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control form-control-lg" id="floatingInput"
                            placeholder="Nom complet" name="name">
                        <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-floating mb-4">
                          <input type="text" id="floatingInput" class="form-control form-control-lg" placeholder="Téléphone"/>
                          <label class="form-label" for="floatingInput">Téléphone <span class="text-danger">*</span></label>
                        </div>
                  </div>
              </div>

              <div class="form-floating mb-4">
                <input type="text" class="form-control form-control-lg" id="floatingInput"
                    placeholder="Adresse mail" name="email">
                <label for="floatingInput">E-mail</label>
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
                  <label class="form-label" for="form3Example4cd">Photo</label>
                  <input type="file" id="form3Example4cd" class="form-control form-control-lg" name="picture"/>
               </div>

                <div class="row">
                  <div class="col-xl-6 mb-4 me-5">
                      <label>Role : <span class="text-danger">*</span></label>
                      <select class="form-select" aria-label="Default select example">
                          <option value="1">Assitant</option>
                          <option value="2">Infermiers</option>
                          <option value="3">Ouvrier de mennage</option>
                          <option value="4">Coursier</option>

                      </select>

                  </div>
              </div>

              <div class="d-flex justify-content-end">
                <button type="button"
                  class="btn btn-success btn-block btn-lg gradient-custom-4 text-white" name="sign">S'enregistrer</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection