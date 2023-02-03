@extends('patient.templatePt')
@section('title', 'Liste des Rendez-vous')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des Rendez-vous</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>

                    
                    <th>Date & Heure</th>
                    <th>Maladie</th>
                    <th>Motif</th>
                    <th>Docteur</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
             <tbody>
                @foreach ($appnts as $appnt)
                    <tr>

                        <td hidden>{{ $appnt->id }}</td>
                        <td>{{ $appnt->time }}</td>
                        <td>{{$appnt->disease}}</td>
                        <td>{{$appnt->motif}}</td>
                        <td>{{$appnt->doctor}}</td>
                        <td>{{$appnt->state}}</td>

                        <td><a type="button" class="btn" href="{{ route('rendezVous.edit', ['rendezVou'=>$appnt->id]) }}"><i class="fa-solid fa-pen-to-square text-info"></i></a>

                            <form action="{{ route('rendezVous.destroy', ['rendezVou' => $appnt->id]) }}" class="d-inline"
                                method="POST" id="appnt{{ $appnt->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("appnt{{ $appnt->id }}")'><i class="fa-solid fa-trash text-danger"></i></button>
                            </form>
                        </td> 
                    </tr>
                @endforeach
            </tbody> 
        </table>
    </div>
    <script>
        function handleDelete(idform) {
            let form = document.querySelector('#' + idform);
            if (confirm('Voluez-vous supprimer ce Rendez-vous ?')) {
                form.submit();
            }
        }
    </script>
@endsection
