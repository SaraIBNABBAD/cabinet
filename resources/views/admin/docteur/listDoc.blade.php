@extends('admin.templateAd')
@section('title', 'Liste des docteurs')
@section('content')
@if (session('success'))
<x-alert :message="session('success')" />
@endif
@if (session('error'))
<x-alert type="danger" :message="session('error')" />
@endif
    <div class="card-body">
        <h5 class="card-title">Liste des docteurs</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr >
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Spécialitée</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>

                        <td hidden>{{ $doctor->id }}</td>
                        <td>
                            @if ($doctor->picture == null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded" width="33px">
                            @else
                                <img src="{{ $doctor->picture }}" alt="" class="rounded" width="40">
                        </td>
                @endif

                <td scope="row">{{ $doctor->name }}</td>
                <td>{{ $doctor->speciality }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->phone }}</td>


                <td><a type="button" class="btn"  data-toggle="modal" data-target="#update{{$doctor->id}}"><i
                            class="fa-solid fa-pen-to-square text-info"></i></a>


  
  <!-- Modal -->
  <div class="modal fade" id="update{{$doctor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('doctors.update', ['doctor' => $doctor->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-4">

                            <input type="text" class="form-control form-control-lg"
                                id="floatingInput" placeholder="Nom complet" name="name"
                                value="{{ old('name', $doctor->name) }}" />

                            <label for="floatingInput">Nom complet <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input type="text" id="floatingInput"
                                class="form-control form-control-lg" placeholder="Téléphone"
                                name="phone" value="{{ old('phone', $doctor->phone) }}" />
                            <label for="floatingInput">Téléphone <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control form-control-lg" id="floatingInput"
                        placeholder="Adresse mail" name="email"
                        value="{{ old('email', $doctor->email) }}" />
                    <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 d-none">
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control form-control-lg"
                                id="floatingInput" placeholder="Mot de passe" name="password" />
                            <label for="floatingInput">Mot de passe <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 d-none">
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control form-control-lg"
                                id="floatingInput" placeholder="Confirmer le mot de passe"
                                name="confirmation_password" />
                            <label for="floatingInput">Confirmer le mot de passe <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label>Photo :</label>
                    <input type="file" id="picture" class="form-control form-control-lg"
                        name="picture" accept="image/*" />
                </div>

                <div class="d-none">
                    <label for="slt">Role : <span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Default select example" name="role">

                        <option value="doctor">Docteur</option>
                    </select>
                </div>

                <label for="splt">Spécialté : <span class="text-danger">*</span></label>
                <select class="form-select" aria-label="Default select example" name="speciality">

                    <option value="Médecine_générale"
                        {{ $doctor->speciality === 'Médecine_générale' ? 'selected' : '' }}>La médecine
                        générale</option>
                    <option value="Cardiologie"
                        {{ $doctor->speciality === 'Cardiologie' ? 'selected' : '' }}>Cardiologie
                    </option>
                    <option value="Dermatologie"
                        {{ $doctor->speciality === 'Dermatologie' ? 'selected' : '' }}>Dermatologie
                    </option>
                    <option value="Gastro_entérologie"
                        {{ $doctor->speciality === 'Gastro_entérologie' ? 'selected' : '' }}>
                        Gastro-entérologie</option>
                    <option value="Ophtalmologie"
                        {{ $doctor->speciality === 'Ophtalmologie' ? 'selected' : '' }}>L’ophtalmologie
                    </option>
                    <option value="Pédiatrie"
                        {{ $doctor->speciality === 'Pédiatrie' ? 'selected' : '' }}>La pédiatrie
                    </option>
                    <option value="Pneumologie"
                        {{ $doctor->speciality === 'Pneumologie' ? 'selected' : '' }}>La pneumologie
                    </option>
                </select>
        </div>





        

        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

                    <form action="{{ route('doctors.destroy', ['doctor' => $doctor->id]) }}" class="d-inline" method="POST"
                        id="doctor{{ $doctor->id }}">
                        @csrf
                        @method('delete')
                        <button class="btn" type="button" onclick='handleDelete("doctor{{ $doctor->id }}")'><i
                                class="fa-solid fa-trash text-danger"></i></button>
                    </form>
                    <a type="button" class="btn" href="{{ route('doctors.create')}}"><i class="fa-solid fa-square-plus text-success "></i></a>
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
