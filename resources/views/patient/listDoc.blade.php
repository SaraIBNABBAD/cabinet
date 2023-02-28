@extends('patient.templatePt')
@section('title', 'Liste des Rendez-vous')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des docteurs</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>




                    <th>Image</th>
                    <th>Docteur</th>
                    <th>Rendez-vous</th>
                    <th>Maladie</th>
                    <th>Motif</th>
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
                            <img src="{{ $doc->picture }}" alt="" class="rounded" width="33px"></td>
                            @endif
                        <td>{{ $doc->doctor }}</td>
                        <td>{{ $doc->time }}</td>
                        <td>{{ $doc->disease }}</td>
                        <td>{{ $doc->motif }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $docs->links() }}
    </div>





@endsection
