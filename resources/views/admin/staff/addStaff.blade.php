@extends('admin.templateAd')
@section('title', 'Ajouter staff')
@section('content')

    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <section class=" gradient-custom">
        <h3 class="text-uppercase text-center mb-3">Ajouter Staff</h3>
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        

                        <form method="POST" action="{{ route('staffs.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg border-primary @error('name')is-invalid
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Nom complet" name="name">
                                        <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
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
                                            class="form-control form-control-lg border-primary @error('phone')
                                                        
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

                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-4">
                                        <input type="email"
                                            class="form-control form-control-lg border-primary @error('email')is-invalid
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Adresse mail" name="email" />
                                        <label for="floatingInput">E-mail</label>
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
                                            class="form-control form-control-lg border-primary @error('password')
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Mot de passe" name="password">
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
                                            class="form-control form-control-lg border-primary @error('password_confirmation')
                                                    
                                                @enderror"
                                            id="floatingInput" placeholder="Confirmer le mot de passe"
                                            name="password_confirmation">
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
                                <div class="col-md-6 mb-4">
                                    <label>Role : <span class="text-danger">*</span></label>
                                    <select
                                        class="form-select form-select-lg border-primary @error('role')
                                                
                                            @enderror"
                                        aria-label="Default select example" name="role">
                                        <option value="Assistant">Assistant</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                    @error('role')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cd">Photo</label>
                                        <input type="file" id="form3Example4cd" class="form-control form-control-lg"
                                            name="picture" />
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-primary btn-lg ms-2 w-25">Ajouter</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
