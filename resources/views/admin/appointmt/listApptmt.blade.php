@extends('admin.templateAd')
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
                @foreach ($apponts as $appont)
                    <tr>

                        <td hidden>{{ $appont->id }}</td>
                        <td scope="row">{{ $appont->name }}</td>
                        <td>{{ $appont->phone }}</td>
                        <td>{{ $appont->time }}</td>
                        <td>{{$appont->disease}}</td>
                        <td>{{$appont->motif}}</td>
                        <td>{{$appont->state}}</td>

                        <td><a type="button" class="btn" href="{{ route('adApp.edit', ['adApp'=>$appont->id]) }}"><i class="fa-solid fa-pen-to-square text-info"></i></a>

                            <form action="{{ route('adApp.destroy', ['adApp'=>$appont->id]) }}" class="d-inline"
                                method="POST" id="appont{{ $appont->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("appont{{ $appont->id }}")'><i class="fa-solid fa-trash text-danger"></i></button>
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
