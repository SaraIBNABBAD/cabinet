@extends('admin.templateAd')
@section('title', 'Ajouter Docteur')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif



    <section class="gradient-custom">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-9">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">

                        <h3 class="text-uppercase text-center mb-3">Ajouter docteur</h3>

                        <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">

                                        <input type="text"
                                            class="form-control  border-primary @error('name') is-invalid @enderror"
                                            id="floatingInput" placeholder="Nom complet" name="name">

                                        <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input type="text"
                                            class="form-control  border-primary @error('speciality') is-invalid
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Adresse mail" name="speciality" />
                                        <label for="floatingInput">Spécialité <span class="text-danger"
                                                required>*</span></label>
                                    </div>
                                    @error('speciality')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input type="tel" id="floatingInput"
                                            class="form-control  border-primary @error('phone') is-invalid
                                                        
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
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input type="text"
                                            class="form-control  border-primary @error('email') is-invalid
                                                    
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

                                <div class="col-md-4 mb-4">
                                    <div class="form-floating mb-4">
                                        <input type="password"
                                            class="form-control border-primary @error('password')
                                                    
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

                                <div class="col-md-4 mb-4">
                                    <div class="form-floating mb-4">
                                        <input type="password"
                                            class="form-control border-primary @error('password_confirmation')is-invalid
                                                    
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

                            <div class="row">
                                <div class="col-md-8">

                                    <div class="form-outline mb-4">
                                        <label>Photo :</label>
                                        <input type="file" id="picture"
                                            class="form-control form-control-lg border-primary " name="picture" required
                                            accept="image/*" />
                                    </div>
                                </div>
                            </div>

                            <div class="d-none">
                                <label for="slt">Role : <span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="role">

                                    <option value="doctor">Docteur</option>
                                </select>
                            </div>





                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-25">Ajouter</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
@endsection
