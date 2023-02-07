@extends('admin.templateAd')
@section('title', 'fjj')
@section('content')
    <section class="h-100 ">
        
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-3">Ajouter Patient</h2>

                                <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text"
                                                    class="form-control form-control-lg @error('name')is-invalid
                                                    
                                                @enderror"
                                                    id="floatingInput" placeholder="Nom complet" name="name" />
                                                <label for="floatingInput">Nom complet <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="tel" id="floatingInput"
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

                                    <div class="form-floating mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('email')is-invalid
                                            
                                        @enderror"
                                            id="floatingInput" placeholder="Adresse mail" name="email" />
                                        <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Mot de passe" name="password" />
                                                <label for="floatingInput">Mot de passe <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password"
                                                    class="form-control form-control-lg @error('password_confirmation')
                                                    
                                                @enderror"
                                                    id="floatingInput" placeholder="Confirmer le mot de passe"
                                                    name="password_confirmation" />
                                                <label for="floatingInput">Confirmer le mot de passe <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            @error('password_confirmation')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg @error('address')is-invalid
                                            
                                        @enderror"
                                            id="floatingInput" placeholder="Adresse de résidence" name="address" />
                                        <label for="floatingInput">Adresse</label>
                                    </div>
                                    @error('address')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                        <h6 class="mb-0 me-4">Sexe : <span class="text-danger">*</span></h6>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input
                                                class="form-check-input @error('gender')is-invalid
                                                
                                            @enderror"
                                                type="radio" name="gender" id="femme" value="Femme" />
                                            <label class="form-check-label" for="femme">Femme</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender" id="homme"
                                                value="Homme" />
                                            <label class="form-check-label" for="homme">Homme</label>
                                        </div>
                                        @error('gender')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                                                <input type="date"
                                                    class="form-control form-control-lg @error('birth')
                                                    
                                                @enderror"
                                                    id="floatingInput" placeholder="Date de naissance" name="birth">
                                                <label for="floatingInput">Date de naissance</label>
                                            </div>
                                            @error('birth')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                        <h6 class="mb-0 me-4">Mutuelle : <span class="text-danger">*</span></h6>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input
                                                class="form-check-input @error('mutuelle')
                                                
                                            @enderror"
                                                type="radio" name="mutuelle" id="oui" value="oui" />
                                            <label class="form-check-label" for="oui">Oui</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input @error('mutuelle')
                                                
                                            @enderror" type="radio" name="mutuelle"
                                                id="non" value="non" />
                                            <label class="form-check-label" for="non">Non</label>
                                        </div>
                                        @error('mutuelle')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror

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
                    
    </section>
@endsection
