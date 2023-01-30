@extends('assistant.templateAss')
@section('title', 'Liste des Rendez-vous')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des docteurs</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>

                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Date & Heure</th>
                    <th>Maladie</th>
                    <th>Motif</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
             <tbody>
                @foreach ($appnts as $appnt)
                    <tr>

                        <td hidden>{{ $appnt->id }}</td>
                        <td scope="row">{{ $appnt->name }}</td>
                        <td>{{ $appnt->phone }}</td>
                        <td>{{ $appnt->time }}</td>
                        <td>{{$appnt->disease}}</td>
                        <td>{{$appnt->motif}}</td>
                        <td>{{$appnt->state}}</td>

                        <td><a type="button" class="btn" href=""><i class="fa-solid fa-pen-to-square text-info"></i></a>

                            <form action="{{ route('asPoint.destroy', ['appnt'=>$appnt->id]) }}" class="d-inline"
                                method="POST" id="doctor{{ $appnt->id }}">
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
            if (confirm('Voluez-vous supprimer ce docteur ?')) {
                form.submit();
            }
        }
    </script>
@endsection
