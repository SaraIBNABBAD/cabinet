@extends('admin.templateAd')
@section('title', 'Ajouter Docteur')
@section('content')
@if (session('success'))
<x-alert :message="session('success')" />
@endif
@if (session('error'))
<x-alert type="danger" :message="session('error')" />
@endif
    <section class="h-100 ">
        
       
                            <div class="card-body p-4">

                                <h2 class="text-uppercase text-center mb-3">Ajouter docteur</h2>

                                <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">

                                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                    id="floatingInput" placeholder="Nom complet" name="name" >

                                                <label for="floatingInput">Nom complet <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            @error('name')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="tel" id="floatingInput"
                                                    class="form-control form-control-lg @error('phone') is-invalid
                                                        
                                                    @enderror" placeholder="Téléphone"
                                                    name="phone"/>
                                                <label for="floatingInput">Téléphone <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            @error('phone')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                           @enderror
                                        </div>
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control form-control-lg @error('email') is-invalid
                                            
                                        @enderror" id="floatingInput"
                                            placeholder="Adresse mail" name="email"/>
                                        <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control form-control-lg @error('password')
                                                    
                                                @enderror"
                                                    id="floatingInput" placeholder="Mot de passe" name="password"/>
                                                <label for="floatingInput">Mot de passe <span
                                                        class="text-danger">*</span></label>
                                            </div> 
                                            @error('password')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                        </div>
                                       
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password" class="form-control form-control-lg @error('password_confirmation')is-invalid
                                                    
                                                @enderror"
                                                    id="floatingInput" placeholder="Confirmer le mot de passe"
                                                    name="password_confirmation"/>
                                                <label for="floatingInput">Confirmer le mot de passe <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            @error('password_confirmation')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
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

                                        <option value="Médecine_générale">La médecine générale</option>
                                        <option value="Cardiologie">Cardiologie</option>
                                        <option value="Dermatologie">Dermatologie</option>
                                        <option value="Gastro_entérologie">Gastro-entérologie</option>
                                        <option value="Ophtalmologie">L’ophtalmologie</option>
                                        <option value="Pédiatrie">La pédiatrie</option>
                                        <option value="Pneumologie">La pneumologie</option>
                                    </select>
                            </div>
                            



                            <div class="d-flex justify-content-end pt-3 me-5">
                                <button type="submit" class="btn btn-primary btn-lg ms-2"
                                    >Ajouter</button>
                            </div>

                            </form>
                        </div>
               
    </section>
@endsection
