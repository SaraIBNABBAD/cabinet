@extends('admin.templateAd')
@section('title', 'Liste des docteurs')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif

    <!-- Topbar Search -->
    <form action="{{ route('searchDoc') }}" method="get"
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Votre recherche..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h4 class="card-title">Liste des Docteurs</h4>
            <a href="{{ route('doctors.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter Docteur</a>
        </div>
        <div class="table-responsive">
            <table class="mb-4 table table-striped  ">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Spécialitée</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($doctors as $doctor)
                        <tr>

                            <td hidden>{{ $doctor->id }}</td>
                            <td>
                                @if ($doctor->picture == null)
                                    <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded"
                                        width="33px">
                                @else
                                    <img src="{{ $doctor->picture }}" alt="" class="rounded" width="40">
                            </td>
                    @endif

                    <td scope="row">{{ $doctor->name }}</td>
                    <td>{{ $doctor->speciality }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone }}</td>


                    <td><a type="button" class="btn" data-toggle="modal" data-target="#update{{ $doctor->id }}"><i
                                class="fa-solid fa-pen-to-square text-info"></i></a>



                        <!-- Modal -->
                        <div class="modal fade" id="update{{ $doctor->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modifier Docteur</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('doctors.update', ['doctor' => $doctor->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">

                                                        <input type="text"
                                                            class="form-control form-control-lg border-primary"
                                                            id="floatingInput" placeholder="Nom complet" name="name"
                                                            value="{{ old('name', $doctor->name) }}" />

                                                        <label for="floatingInput">Nom complet <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" id="floatingInput"
                                                            class="form-control form-control-lg border-primary"
                                                            placeholder="Téléphone" name="phone"
                                                            value="{{ old('phone', $doctor->phone) }}" />
                                                        <label for="floatingInput">Téléphone <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">
                                                        <input type="text"
                                                            class="form-control form-control-lg border-primary"
                                                            id="floatingInput" placeholder="Adresse mail" name="email"
                                                            value="{{ old('email', $doctor->email) }}" />
                                                        <label for="floatingInput">E-mail <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">
                                                        <input type="text"
                                                            class="form-control form-control-lg border-primary @error('speciality') is-invalid
                                                        
                                                    @enderror"
                                                            id="floatingInput" placeholder="Adresse mail" name="speciality"
                                                            value="{{ old('speciality', $doctor->speciality) }}" />
                                                        <label for="floatingInput">Spécialité <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                    @error('speciality')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-outline mb-4">
                                                {{-- <label>Photo :</label> --}}
                                                <input type="file" id="picture"
                                                    class="form-control form-control-lg border-primary" name="picture"
                                                    accept="image/*" />
                                            </div>

                                            <div class="d-none">
                                                <label for="slt">Role : <span class="text-danger">*</span></label>
                                                <select class="form-select border-primary"
                                                    aria-label="Default select example" name="role">

                                                    <option value="doctor">Docteur</option>
                                                </select>
                                            </div>
                                    </div>








                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('doctors.destroy', ['doctor' => $doctor->id]) }}" class="d-inline"
                            method="POST" id="doctor{{ $doctor->id }}">
                            @csrf
                            @method('delete')
                            <button class="btn" type="button" onclick='handleDelete("doctor{{ $doctor->id }}")'><i
                                    class="fa-solid fa-trash text-danger"></i></button>
                        </form>

                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $doctors->links() }}
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
