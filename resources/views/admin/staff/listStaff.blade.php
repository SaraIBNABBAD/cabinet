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
    <form action="{{ route('searchStaff') }}" method="get"
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
            <h4 class="card-title">Liste de Staff</h4>
            <a href="{{ route('staffs.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter Staff</a>
        </div>
        <div class="table-responsive">
            <table class="mb-4 table table-striped">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th>Image</th>
                        <th>Nom </th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($staffs as $staff)
                        <tr>

                            <td hidden>{{ $staff->id }}</td>
                            <td>
                                @if ($staff->picture == null)
                                    <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded"
                                        width="33px">
                                @else
                                    <img src="{{ $staff->picture }}" alt="" class="rounded" width="33">
                            </td>
                    @endif

                    <td scope="row">{{ $staff->name }}</td>
                    <td>{{ $staff->role }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->phone }}</td>


                    <td><a type="button" class="btn" data-toggle="modal" data-target="#update{{ $staff->id }}"><i
                                class="fa-solid fa-pen-to-square text-info"></i></a>



                        <!-- Modal -->
                        <div class="modal fade" id="update{{ $staff->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modifier Staff</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('staffs.update', ['staff' => $staff->id]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">

                                                        <input type="text"
                                                            class="form-control form-control-lg border-primary"
                                                            id="floatingInput" placeholder="Nom complet" name="name"
                                                            value="{{ old('name', $staff->name) }}" />

                                                        <label for="floatingInput">Nom complet <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" id="floatingInput"
                                                            class="form-control form-control-lg border-primary"
                                                            placeholder="Téléphone" name="phone"
                                                            value="{{ old('phone', $staff->phone) }}" />
                                                        <label for="floatingInput">Téléphone <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-floating mb-4">
                                                        <input type="text"
                                                            class="form-control form-control-lg border-primary"
                                                            id="floatingInput" placeholder="Adresse mail" name="email"
                                                            value="{{ old('email', $staff->email) }}" />
                                                        <label for="floatingInput">E-mail <span
                                                                class="text-danger">*</span></label>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4 d-none">
                                                    <div class="form-floating mb-4">
                                                        <input type="password"
                                                            class="form-control form-control-lg border-primary"
                                                            id="floatingInput" placeholder="Mot de passe" name="password" />
                                                        <label for="floatingInput">Mot de passe <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4 d-none">
                                                    <div class="form-floating mb-4">
                                                        <input type="password"
                                                            class="form-control form-control-lg border-primary"
                                                            id="floatingInput" placeholder="Confirmer le mot de passe"
                                                            name="confirmation_password" />
                                                        <label for="floatingInput">Confirmer le mot de passe <span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-outline mb-4">
                                                        <label>Photo :</label>
                                                        <input type="file" id="picture"
                                                            class="form-control form-control-lg border-primary"
                                                            name="picture" accept="image/*" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <label for="splt">Role : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select border-primary"
                                                        aria-label="Default select example" name="role">

                                                        <option value="Assistant"
                                                            {{ $staff->role === 'Assistant' ? 'selected' : '' }}>Assistant
                                                        </option>
                                                        <option value="Staff"
                                                            {{ $staff->role === 'Staff' ? 'selected' : '' }}>Staff</option>

                                                    </select>
                                                </div>
                                            </div>

                                    </div>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Femer</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('staffs.destroy', ['staff' => $staff->id]) }}" class="d-inline"
                            method="POST" id="staff{{ $staff->id }}">
                            @csrf
                            @method('delete')
                            <button class="btn" type="button" onclick='handleDelete("staff{{ $staff->id }}")'><i
                                    class="fa-solid fa-trash text-danger"></i></button>
                        </form>

                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $staffs->links() }}
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
