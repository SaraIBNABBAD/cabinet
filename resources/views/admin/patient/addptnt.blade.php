@extends('admin.templateAd')
@section('title', 'fjj')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <section class="gradient-custom">
        <h3 class="text-uppercase text-center mb-3">Ajouter Patient</h3>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-9">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5 ">


                        <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control form-control-lg border-primary @error('name')is-invalid
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Nom complet" name="name" />
                                        <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="tel" id="floatingInput"
                                            class="form-control form-control-lg border-primary @error('phone')is-invalid
                                                        
                                                    @enderror"
                                            placeholder="Téléphone" name="phone" />
                                        <label for="floatingInput">Téléphone <span class="text-danger">*</span></label>
                                    </div>
                                    @error('phone')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control form-control-lg border-primary @error('address')is-invalid
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Adresse de résidence" name="address" />
                                        <label for="floatingInput">Adresse</label>
                                    </div>
                                    @error('address')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text"
                                            class="form-control form-control-lg border-primary @error('email')is-invalid
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Adresse mail" name="email" />
                                        <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="password"
                                            class="form-control form-control-lg border-primary @error('password')
                                                    
                                        @enderror"
                                            id="floatingInput" placeholder="Mot de passe" name="password" />
                                        <label for="floatingInput">Mot de passe <span class="text-danger">*</span></label>
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="password"
                                            class="form-control form-control-lg border-primary @error('password_confirmation')
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Confirmer le mot de passe"
                                            name="password_confirmation" />
                                        <label for="floatingInput">Confirmer mot de passe <span
                                                class="text-danger">*</span></label>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>




                            <div class="row mt-2">
                                <div class="col-md-4 ">
                                    <label>Groupe Sanguin :</label>
                                    <select class="form-select form-select-lg border-primary"
                                        aria-label="Default select example" name="sang">
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
                                    <div class="form-outline">
                                        <label>Photo :</label>
                                        <input type="file" id="picture"
                                            class="form-control form-control-lg border-primary" name="picture"
                                            accept="image/*" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date de naissance : </label>


                                    <input type="date"
                                        class="form-control form-control-lg border-primary 
                                        @error('birth') @enderror"
                                        placeholder="Date de naissance" name="birth">


                                    @error('birth')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
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
                                            <input
                                                class="form-check-input @error('mutuelle')is-invalid
                                                        
                                                    @enderror"
                                                type="radio" name="mutuelle" id="non" value="non" />
                                            <label class="form-check-label" for="non">Non</label>
                                        </div>
                                        @error('mutuelle')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                </div>
                            </div>
                            <div class="d-flex justify-content-end ">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-25"
                                    name="sign">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
