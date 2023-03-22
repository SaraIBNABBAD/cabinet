@extends('doctor.templateDt')
@section('title', 'Liste des Patient')
@section('content')

    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <form action="{{ route('srchPatntDoc') }}" method="get"
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

            <h4 class="card-title">Liste des Patient</h4>
            <a href="{{ route('Dpatients.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter Patient</a>
        </div>
        <table class="mb-4 table table-striped">
            <thead class="text-center text-white bg-primary">
                <tr>
                    <th>#</th>
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
            <tbody class="text-center">
                @foreach ($patient as $patient)
                    <tr>

                        <td>{{ $patient->id }}</td>
                        <td>
                            @if ($patient->picture == null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded"
                                    width="33px">
                            @else
                                <img src="{{ $patient->picture }}" alt="" class="rounded" width="33px">
                            @endif
                        </td>


                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>{{ $patient->birth }}</td>
                        <td>{{ $patient->sang }}</td>


                        <td><a type="button" data-toggle="modal" data-target="#update{{ $patient->id }}">
                                <i class="fa-solid fa-pen-to-square text-info"></i></a>


                            <!-- Modal -->
                            <div class="modal fade" id="update{{ $patient->id }}" tabindex="-1"
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
                                                action="{{ route('Dpatients.update', ['Dpatient' => $patient->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input type="text" class="form-control form-control-lg border-primary"
                                                                id="floatingInput" placeholder="Nom complet" name="name"
                                                                value="{{ old('name', $patient->name) }}" />
                                                            <label for="floatingInput">Nom complet <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input type="text" id="floatingInput"
                                                                class="form-control form-control-lg border-primary" placeholder="Téléphone"
                                                                name="phone"
                                                                value="{{ old('phone', $patient->phone) }}" />
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
                                                                value="{{ old('email', $patient->email) }}" />
                                                            <label for="floatingInput">E-mail <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input type="text" class="form-control form-control-lg border-primary"
                                                                id="floatingInput" placeholder="Adresse de résidence"
                                                                name="address"
                                                                value="{{ old('address', $patient->address) }}" />
                                                            <label for="floatingInput">Adresse</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row d-none">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="password" class="form-control form-control-lg border-primary"
                                                                id="floatingInput" placeholder="Mot de passe"
                                                                name="password">
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




                                                <div class="row mb-4">
                                                    <div class="col-md-4 ">
                                                        <label>Groupe Sanguin :</label>
                                                        <select class="form-select form-select-lg border-primary border-primary border-primary " aria-label="Default select example"
                                                            name="sang">
                                                            <option
                                                                value="O+"{{ $patient->sang === 'O+' ? 'selected' : '' }}>
                                                                O+</option>
                                                            <option
                                                                value="O-"{{ $patient->sang === 'O-' ? 'selected' : '' }}>
                                                                O-</option>
                                                            <option
                                                                value="A+"{{ $patient->sang === 'A+' ? 'selected' : '' }}>
                                                                A+</option>
                                                            <option
                                                                value="A-"{{ $patient->sang === 'A-' ? 'selected' : '' }}>
                                                                A-</option>
                                                            <option
                                                                value="B+"{{ $patient->sang === 'B+' ? 'selected' : '' }}>
                                                                B+</option>
                                                            <option
                                                                value="B-"{{ $patient->sang === 'B-' ? 'selected' : '' }}>
                                                                B-</option>
                                                            <option
                                                                value="AB+"{{ $patient->sang === 'AB+' ? 'selected' : '' }}>
                                                                AB+
                                                            </option>
                                                            <option
                                                                value="AB-"{{ $patient->gender === 'AB-' ? 'selected' : '' }}>
                                                                AB-</option>

                                                        </select>

                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <label for="floatingInput">Date de naissance :</label>
                                                            <input type="date" class="form-control form-control-lg border-primary"
                                                                id="floatingInput" placeholder="Date de naissance"
                                                                name="birth"
                                                                value="{{ old('birth', $patient->birth) }}" />
                                                            
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
                                                        <div
                                                            class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                                            <h6 class="mb-0 me-4">Sexe : <span
                                                                    class="text-danger">*</span></h6>

                                                            <div class="form-check form-check-inline mb-0 me-4">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" id="femme" value="Femme"
                                                                    {{ $patient->gender === 'Femme' ? 'checked' : '' }} />
                                                                <label class="form-check-label"
                                                                    for="femme">Femme</label>
                                                            </div>
                                                            <div class="form-check form-check-inline mb-0 me-4">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" id="homme" value="Homme"
                                                                    {{ $patient->gender === 'Homme' ? 'checked' : '' }} />
                                                                <label class="form-check-label"
                                                                    for="homme">Homme</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div
                                                            class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                                            <h6 class="mb-0 me-4">Mutuelle : <span
                                                                    class="text-danger">*</span>
                                                            </h6>

                                                            <div class="form-check form-check-inline mb-0 me-4">
                                                                <input class="form-check-input" type="radio"
                                                                    name="mutuelle" id="oui" value="oui"
                                                                    {{ $patient->mutuelle === 'oui' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="oui">Oui</label>
                                                            </div>
                                                            <div class="form-check form-check-inline mb-0 me-4">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="non"
                                                                    value="non"
                                                                    {{ $patient->mutuelle === 'non' ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="non">Non</label>
                                                            </div>


                                                        </div>
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
                            </div>

                            <form action="{{ route('Dpatients.destroy', ['Dpatient' => $patient->id]) }}"
                                class="d-inline" method="POST" id="patient{{ $patient->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("patient{{ $patient->id }}")'><i
                                        class="fa-solid fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $patients->links() }} --}}
    </div>
    <script>
        function handleDelete(idform) {
            let form = document.querySelector('#' + idform);
            if (confirm('Voluez-vous supprimer ce patient ?')) {
                form.submit();
            }
        }
    </script>
@endsection
