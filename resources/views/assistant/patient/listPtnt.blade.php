@extends('assistant.templateAss')
@section('title', 'Liste des asPatient')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="card-title">Liste des Patients</h4>
            <a href="{{ route('Apatient.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter Patient</a>
        </div>
        <table class="mb-4 table table-striped">
            <thead class="text-center bg-primary text-white">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Sexe</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>email</th>
                    <th>Date de naissance</th>
                    <th>G.Sanguin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($asPatients as $asPatient)
                    <tr>

                        <td>{{ $asPatient->id }}</td>
                        <td>
                            @if ($asPatient->picture == null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded"
                                    width="33px">
                            @else
                                <img src="{{ $asPatient->picture }}" alt="" class="rounded" width="33px">
                        </td>
                @endif

                <td>{{ $asPatient->name }}</td>
                <td>{{ $asPatient->gender }}</td>
                <td>{{ $asPatient->address }}</td>
                <td>{{ $asPatient->phone }}</td>
                <td>{{ $asPatient->email }}</td>
                <td>{{ $asPatient->birth }}</td>
                <td>{{ $asPatient->sang }}</td>


                <td><a type="button" class="btn " data-toggle="modal" data-target="#update{{ $asPatient->id }}">
                        <i class="fa-solid fa-pen-to-square text-info"></i></a>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="update{{ $asPatient->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier Patient</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST"
                                        action="{{ route('Apatient.update', ['Apatient' => $asPatient->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control form-control-lg border-primary"
                                                        id="floatingInput" placeholder="Nom complet" name="name"
                                                        value="{{ old('name', $asPatient->name) }}" />
                                                    <label for="floatingInput">Nom complet <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-4">
                                                    <input type="text" id="floatingInput"
                                                        class="form-control form-control-lg border-primary" placeholder="Téléphone"
                                                        name="phone" value="{{ old('phone', $asPatient->phone) }}" />
                                                    <label for="floatingInput">Téléphone <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control form-control-lg border-primary"
                                                        id="floatingInput" placeholder="Adresse mail" name="email"
                                                        value="{{ old('email', $asPatient->email) }}" />
                                                    <label for="floatingInput">E-mail <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control form-control-lg border-primary"
                                                        id="floatingInput" placeholder="Adresse de résidence" name="address"
                                                        value="{{ old('address', $asPatient->address) }}" />
                                                    <label for="floatingInput">Adresse</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row d-none">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-4">
                                                    <input type="password" class="form-control form-control-lg border-primary"
                                                        id="floatingInput" placeholder="Mot de passe" name="password">
                                                    <label for="floatingInput">Mot de passe <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-floating mb-4">
                                                    <input type="password" class="form-control form-control-lg border-primary"
                                                        id="floatingInput" placeholder="Confirmer le mot de passe"
                                                        name="confirmation_password">
                                                    <label for="floatingInput">Confirmer le mot de passe <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <label>Groupe Sanguin :</label>
                                                <select class="form-select form-select-lg border-primary"
                                                    aria-label="Default select example" name="sang">
                                                    <option
                                                        value="O+"{{ $asPatient->sang === 'O+' ? 'selected' : '' }}>O+
                                                    </option>
                                                    <option
                                                        value="O-"{{ $asPatient->sang === 'O-' ? 'selected' : '' }}>O-
                                                    </option>
                                                    <option
                                                        value="A+"{{ $asPatient->sang === 'A+' ? 'selected' : '' }}>A+
                                                    </option>
                                                    <option
                                                        value="A-"{{ $asPatient->sang === 'A-' ? 'selected' : '' }}>A-
                                                    </option>
                                                    <option
                                                        value="B+"{{ $asPatient->sang === 'B+' ? 'selected' : '' }}>B+
                                                    </option>
                                                    <option
                                                        value="B-"{{ $asPatient->sang === 'B-' ? 'selected' : '' }}>B-
                                                    </option>
                                                    <option
                                                        value="AB+"{{ $asPatient->sang === 'AB+' ? 'selected' : '' }}>
                                                        AB+
                                                    </option>
                                                    <option
                                                        value="AB-"{{ $asPatient->gender === 'AB-' ? 'selected' : '' }}>
                                                        AB-</option>

                                                </select>

                                            </div>
                                            <div class="col-md-4 ">
                                                <label for="floatingInput">Date de naissance :</label>
                                                <input type="date" class="form-control form-control-lg border-primary"
                                                    id="floatingInput" placeholder="Date de naissance" name="birth"
                                                    value="{{ old('birth', $asPatient->birth) }}" />

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-outline mb-4">
                                                    <label class="form-labelv" for="picture">Photo :</label>
                                                    <input type="file" id="picture"
                                                        class="form-control form-control-lg border-primary" name="picture"
                                                        accept="image/*" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                                    <h6 class="mb-0 me-4">Sexe : <span class="text-danger">*</span></h6>

                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="femme" value="Femme"
                                                            {{ $asPatient->gender === 'Femme' ? 'checked' : '' }} />
                                                        <label class="form-check-label" for="femme">Femme</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="homme" value="Homme"
                                                            {{ $asPatient->gender === 'Homme' ? 'checked' : '' }} />
                                                        <label class="form-check-label" for="homme">Homme</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                                    <h6 class="mb-0 me-4">Mutuelle : <span class="text-danger">*</span>
                                                    </h6>

                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="mutuelle"
                                                            id="oui" value="oui"
                                                            {{ $asPatient->mutuelle === 'oui' ? 'checked' : '' }} />
                                                        <label class="form-check-label" for="oui">Oui</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-0 me-4">
                                                        <input class="form-check-input" type="radio" name="mutuelle"
                                                            id="non" value="non"
                                                            {{ $asPatient->mutuelle === 'non' ? 'checked' : '' }} />
                                                        <label class="form-check-label" for="non">Non</label>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>






                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
    </div>



    <form action="{{ route('Apatient.destroy', ['Apatient' => $asPatient->id]) }}" class="d-inline" method="POST"
        id="asPatient{{ $asPatient->id }}">
        @csrf
        @method('delete')
        <button class="btn" type="button" onclick='handleDelete("asPatient{{ $asPatient->id }}")'><i
                class="fa-solid fa-trash text-danger"></i></button>
    </form>

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    {{ $asPatients->links() }}
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
