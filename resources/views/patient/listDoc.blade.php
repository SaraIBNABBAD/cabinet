@extends('patient.templatePt')
@section('title', 'Liste des Rendez-vous')
@section('content')
    <div class="card-body mt-2">
        <h4 class="card-title">Liste des docteurs</h4>
        <table class="mb-4 mt-4 table table-striped">
            <thead class="text-center bg-primary text-white">
                <tr>
                    <th>Image</th>
                    <th>Docteur</th>
                    <th>Spécialité</th>
                    <th>Email</th>
                    <th>phone</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($docs as $doc)
                    <tr>

                        <td hidden>{{ $doc->id }}</td>
                        <td>
                            @if ($doc->picture==null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded" width="33px">
                            @else
                            <img src="{{ $doc->picture }}" alt="" class="rounded" width="33px"></td>
                            @endif
                        <td>{{ $doc->name }}</td>
                        <td>{{ $doc->speciality }}</td>
                        <td>{{ $doc->email }}</td>
                        <td>{{ $doc->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $docs->links() }}
    </div>





@endsection
