@extends('assistant.templateAss')
@section('title', 'Liste des asPatient')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des asPatient</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Sexe</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Date de naissance</th>
                    <th>G.Sanguin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asPatients as $asPatient)
                    <tr>

                        <td hidden>{{ $asPatient->id }}</td>
                        <td><img src="{{ $asPatient->picture }}" alt="" class="rounded" width="33px"></td>
                        <td>{{ $asPatient->name }}</td>
                        <td>{{ $asPatient->gender }}</td>
                        <td>{{ $asPatient->address }}</td>
                        <td>{{ $asPatient->phone }}</td>
                        <td>{{ $asPatient->birth }}</td>
                        <td>{{ $asPatient->sang }}</td>
                        

                        <td><a type="button" href="{{ route('Apatient.edit',['asPatient' => $asPatient->id]) }}" class="btn">
                            <i class="fa-solid fa-pen-to-square text-info"></i></a>

                            

                            <form action="{{ route('Apatient.destroy', ['asPatient'=>$asPatient->id]) }}" class="d-inline"
                                method="POST" id="asPatient{{ $asPatient->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("asPatient{{ $asPatient->id }}")'><i class="fa-solid fa-trash text-danger"></i></button>
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
            if (confirm('Voluez-vous supprimer ce asPatient ?')) {
                form.submit();
            }
        }
    </script>
@endsection
