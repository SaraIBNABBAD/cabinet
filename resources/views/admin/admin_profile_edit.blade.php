@extends('admin.templateAd')
@section('title','dash')
@section('content')
{{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}

{{-- <img class="imageprofiledash" src="{{ asset($adminData->picture) }}" alt="profil">
<h4>Nom: {{$adminData->name}}</h4>
<h4>Email: {{$adminData->email}}</h4>
<h4>Téléphone: {{$adminData->phone}}</h4>
<h4>Adresse: {{$adminData->address}}</h4> --}}

<div class="card">
    {{-- <img src="{{ asset($adminData->picture) }}" class="card-img-top" alt="..."> --}}
    <div class="card-body">
        <form method="POST" action="{{ route('edited.profile') }}"
            enctype="multipart/form-data">
            @csrf
            {{-- @method('put') --}}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control form-control-lg" id="floatingInput" placeholder="Nom complet"
                            name="name" value="{{ old('name', $editData->name) }}" />
                        <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-4">
                        <input type="text" id="floatingInput" class="form-control form-control-lg"
                            placeholder="Téléphone" name="phone" value="{{ old('phone', $editData->phone) }}" />
                        <label for="floatingInput">Téléphone <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control form-control-lg" id="floatingInput" placeholder="Adresse mail"
                            name="email" value="{{ old('email', $editData->email) }}" />
                        <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                    </div>
                </div>
                          
                <div class="col-md-6">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control form-control-lg" id="floatingInput"
                            placeholder="Adresse de résidence" name="address" value="{{ old('address', $editData->address) }}" />
                        <label for="floatingInput">Adresse</label>
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <h6 class="form-labelv" for="picture">Photo :</h6>
                    <input type="file" id="picture" class="form-control form-control-lg" name="picture"
                        accept="image/*" />
                </div>
            </div>

            

           


            <div class="d-flex justify-content-end pt-3 me-5">
                <button type="submit" class="btn btn-primary btn-lg ms-2">Enregister</button>
            </div>


        </form>
      {{-- <h5 class="card-title">{{$adminData->name}}</h5>
      <p class="card-text">{{$adminData->email}}</p>
      <p class="card-text">{{$adminData->phone}}</p>
      <p class="card-text">{{$adminData->address}}</p> --}}
      {{-- <a href="{{route('edit.profile')}}" class="btn btn-primary">Modifier le profil</a> --}}
    </div>
  </div>


@endsection