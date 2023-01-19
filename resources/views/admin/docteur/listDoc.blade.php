@extends('admin.templateAd')
@section('title', 'Liste des docteurs')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des docteurs</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>

                    <th>Nom & Prénom</th>
                    <th>Spécialité</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>

                        <td hidden>{{ $doctor->id }}</td>
                        <td scope="row">{{ $doctor->name }}</td>
                        <td>{{ $doctor->speciality }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td><img src="{{ $doctor->picture }}" alt="" class="w-25"></td>

                        <td><a type="button" class="btn" href="{{ route('doctors.edit', ['doctor'=>$doctor->id]) }}"><i class="fa-solid fa-pen-to-square text-info"></i></a>

                            <form action="{{ route('doctors.destroy', ['doctor' => $doctor->id]) }}" class="d-inline"
                                method="POST" id="doctor{{ $doctor->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("doctor{{ $doctor->id }}")'><i class="fa-solid fa-trash text-danger"></i></button>
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
