@extends('admin.templateAd')
@section('title', 'Liste des docteurs')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des docteurs</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom </th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>

                        <td hidden>{{ $staff->id }}</td>
                        <td><img src="{{ $staff->picture }}" alt="" class="rounded" width="33"></td>
                        <td scope="row">{{ $staff->name }}</td>
                        <td>{{ $staff->role }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->phone }}</td>
                        

                        <td><a type="button" class="btn" href="{{ route('staffs.edit', ['staff'=>$staff->id]) }}"><i class="fa-solid fa-pen-to-square text-info"></i></a>

                            <form action="{{ route('staffs.destroy', ['staff' => $staff->id]) }}" class="d-inline"
                                method="POST" id="staff{{ $staff->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("staff{{ $staff->id }}")'><i class="fa-solid fa-trash text-danger"></i></button>
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
            if (confirm('Voluez-vous supprimer ce membre ?')) {
                form.submit();
            }
        }
    </script>
@endsection
