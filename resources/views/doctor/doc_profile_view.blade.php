@extends('doctor.templateDt')
{{-- @extends('patient.templatePt') --}}
{{-- @extends('doctor.templateAd')
@extends('assistant.templateAd') --}}
@section('title', 'dash')
@section('content')
    {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}

    {{-- <img class="imageprofiledash" src="{{ asset($adminData->picture) }}" alt="profil">
<h4>Nom: {{$adminData->name}}</h4>
<h4>Email: {{$adminData->email}}</h4>
<h4>Téléphone: {{$adminData->phone}}</h4>
<h4>Adresse: {{$adminData->address}}</h4> --}}

    <div class="card">
        <div class="row">
            <div class="col-md-5">
                @if (Auth::user()->picture == null)
                    <img src="{{ asset('img/avatar/avatar.png') }}" alt="" 
                    class="card-img-top">
                @else
                    <img class="card-img-top" src="{{ asset(Auth::user()->picture) }}">
                @endif
                {{-- <img src="{{ asset($adminData->picture) }}" class="card-img-top" alt="..."> --}}
            </div>
            {{-- <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title">{{$adminData->name}}</h5>
        <p class="card-text">{{$adminData->email}}</p>
        <p class="card-text">{{$adminData->phone}}</p>
        <p class="card-text">{{$adminData->address}}</p>
      </div>
    </div> --}}
            <div class="col-md-6">
                <div class="card-body">
                    <h6 class="text-danger">Information</h6>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                        <div class="col-12 mb-3">
                            <h6 class="text-secondary">Nom complet</h6>
                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                        </div>
                        <div class="col-12 mb-3">
                            <h6 class="text-secondary">Email</h6>
                            <h5 class="card-title">{{ Auth::user()->email }}</h5>
                        </div>
                        <div class="col-12 mb-3">
                            <h6 class="text-secondary">Numéro de téléphone</h6>
                            <h5 class="card-title">{{ Auth::user()->phone }}</h5>
                        </div>
                        <div class="col-12 mb-3">
                            <h6 class="text-secondary">Adresse</h6>
                            <h5 class="card-title">{{ Auth::user()->address }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center pt-3 me-6">
            <a href="{{ route('edit.profileDoc') }}" class="btn btn-lg btn-outline-primary">Modifier le profil</a>
        </div>

    </div>
    </div>



@endsection
