@extends('patient.templatePt')
@section('title', 'Liste des Rendez-vous')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des docteurs</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>




                    <th>Docteur</th>
                    <th>Rendez-vous</th>
                    <th>Ordonnace</th>
                    <th>Motif</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docs as $doc)
                    <tr>

                        <td hidden>{{ $doc->id }}</td>
                        <td>{{ $doc->doctor }}</td>
                        <td>{{ $doc->time }}</td>
                        <td>{{ $doc->prescription }}</td>
                        <td>{{ $doc->motif }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>





@endsection
