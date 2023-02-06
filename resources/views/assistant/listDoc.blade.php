@extends('assistant.templateAss')
@section('title', 'Liste des docteurs')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des docteurs</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Spécialitée</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docs as $doc)
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
    </div>
    
@endsection
