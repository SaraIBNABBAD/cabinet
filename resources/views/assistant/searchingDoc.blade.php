@extends('assistant.templateAss')
@section('title', 'Liste des docteurs')
@section('content')
<form action="{{ route('srchDocAss') }}" method="get"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Votre recherche..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="card-body mt-2">
        <h4 class="card-title">Liste des docteurs</h4>
        <table class="mb-4 table table-striped mt-4">
            <thead class="text-center bg-primary text-white">
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Spécialitée</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($doc as $doc)
                    <tr>

                        <td hidden>{{ $doc->id }}</td>
                        <td>
                            @if ($doc->picture==null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded" width="33px">
                            @else
                                <img src="{{ $doc->picture }}" alt="" class="rounded" width="40"></td>
                            @endif
                            
                        <td scope="row">{{ $doc->name }}</td>
                        <td>{{ $doc->speciality }}</td>
                        <td>{{ $doc->email }}</td>
                        <td>{{ $doc->phone }}</td>
                        

                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$docs->links()}} --}}
    </div>
    
@endsection
