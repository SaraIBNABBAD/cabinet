@extends('admin.templateAd')
@section('title', 'Ajouter staff')
@section('content')
    <section>
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-3">Ajouter staff</h2>

                                <form method="POST" action="{{ route('staffs.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-4">
                                                <input type="text"
                                                    class="form-control form-control-lg @error('name')is-invalid
                                                    
                                                @enderror"
                                                    id="floatingInput" placeholder="Nom complet" name="name">
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
                                                    class="form-control form-control-lg @error('phone')
                                                        
                                                    @enderror"
                                                    placeholder="Téléphone" name="phone" />
                                                <label class="form-label" for="floatingInput">Téléphone <span
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
                                        <input type="email"
                                            class="form-control form-control-lg @error('email')is-invalid
                                            
                                        @enderror"
                                            id="floatingInput" placeholder="Adresse mail" name="email" />
                                        <label for="floatingInput">E-mail</label>
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password"
                                                    class="form-control form-control-lg @error('password')
                                                    
                                                @enderror"
                                                    id="floatingInput" placeholder="Mot de passe" name="password">
                                                <label for="floatingInput">Mot de passe <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating mb-4">
                                                <input type="password"
                                                    class="form-control form-control-lg @error('password_confirmation')
                                                    
                                                @enderror"
                                                    id="floatingInput" placeholder="Confirmer le mot de passe"
                                                    name="password_confirmation">
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



                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cd">Photo</label>
                                        <input type="file" id="form3Example4cd" class="form-control form-control-lg"
                                            name="picture" />
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6 mb-4 me-5">
                                            <label>Role : <span class="text-danger">*</span></label>
                                            <select
                                                class="form-select @error('role')
                                                
                                            @enderror"
                                                aria-label="Default select example" name="role">
                                                <option value="Assistant">Assistant</option>
                                                <option value="Staff">Staff</option>
                                            </select>

                                        </div>
                                        @error('role')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-success btn-block 
                                        btn-lg gradient-custom-4 text-white">Ajouter</button>
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
