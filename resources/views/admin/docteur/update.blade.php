@extends('admin.templateAd')
@section('title', 'Modifier Docteur')
@section('content')
    <section class="h-100 ">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">

                                <h2 class="text-uppercase text-center mb-3">Modifier Docteur</h2>

                                <form action="{{ route('doctors.update', ['doctor' => $doctor->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">

                                                <input type="text" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Nom complet" name="name"
                                                    value="{{ old('name', $doctor->name) }}" />

                                                <label for="floatingInput">Nom complet <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text" id="floatingInput"
                                                    class="form-control form-control-lg" placeholder="Téléphone"
                                                    name="phone" value="{{ old('phone', $doctor->phone) }}" />
                                                <label for="floatingInput">Téléphone <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-control-lg" id="floatingInput"
                                            placeholder="Adresse mail" name="email"
                                            value="{{ old('email', $doctor->email) }}" />
                                        <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 d-none">
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Mot de passe" name="password" />
                                                <label for="floatingInput">Mot de passe <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 d-none">
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control form-control-lg"
                                                    id="floatingInput" placeholder="Confirmer le mot de passe"
                                                    name="confirmation_password" />
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

                                    <div class="d-none">
                                        <label for="slt">Role : <span class="text-danger">*</span></label>
                                        <select class="form-select" aria-label="Default select example" name="role">

                                            <option value="doctor">Docteur</option>
                                        </select>
                                    </div>

                                    <label for="splt">Spécialté : <span class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="speciality">

                                        <option value="Médecine_générale"
                                            {{ $doctor->speciality === 'Médecine_générale' ? 'selected' : '' }}>La médecine
                                            générale</option>
                                        <option value="Cardiologie"
                                            {{ $doctor->speciality === 'Cardiologie' ? 'selected' : '' }}>Cardiologie
                                        </option>
                                        <option value="Dermatologie"
                                            {{ $doctor->speciality === 'Dermatologie' ? 'selected' : '' }}>Dermatologie
                                        </option>
                                        <option value="Gastro_entérologie"
                                            {{ $doctor->speciality === 'Gastro_entérologie' ? 'selected' : '' }}>
                                            Gastro-entérologie</option>
                                        <option value="Ophtalmologie"
                                            {{ $doctor->speciality === 'Ophtalmologie' ? 'selected' : '' }}>L’ophtalmologie
                                        </option>
                                        <option value="Pédiatrie"
                                            {{ $doctor->speciality === 'Pédiatrie' ? 'selected' : '' }}>La pédiatrie
                                        </option>
                                        <option value="Pneumologie"
                                            {{ $doctor->speciality === 'Pneumologie' ? 'selected' : '' }}>La pneumologie
                                        </option>
                                    </select>
                            </div>





                            <div class="d-flex justify-content-end pt-3 me-5">
                                <button type="submit" class="btn btn-success btn-lg ms-2">Enregister</button>
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
