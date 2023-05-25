@extends('doctor.templateDt')
@section('title', 'Dossier medical')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <form action="{{ route('srchFolder') }}" method="get"
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
    <div class="h5 mb-0 font-weight-bold text-primary float-end me-5">Résultats trouvés : {{ $sum }}</div>
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title">Dossier Medical</h5>
            <a href="{{ route('dFolder.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter Dossier</a>
        </div>
        <table class="mb-4 table table-striped">
            <thead class="text-center bg-primary text-white">
                <tr>

                    <th>Image</th>
                    <th>Nom</th>
                    <th>Ordonnance</th>
                    <th>Rapport</th>
                    <th>Fiche CNSS</th>
                    <th>Bilan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">

                @foreach ($folder as $folder)
                    <tr>

                        <td>
                            @if ($folder->picture == null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded" width="33px">
                            @else
                                <img src="{{ $folder->picture }}" alt="" class="rounded" width="33px">
                            @endif
                        </td>
                        <td hidden>{{ $folder->patnt_id }}</td>

                        <td>{{ $folder->name }}</td>

                        <td>
                            @if ($folder->prescription == null)
                                <a href="{{ asset($folder->prescription) }}" target="_blank"></a>
                            @else
                                <a href="{{ asset($folder->prescription) }}" target="_blank"><img src="{{ asset('img/PDF_logo-1.png') }}"
                                        width="40" height="40" /></a>
                            @endif
                        </td>
                        <td>
                            @if ($folder->report == null)
                                <a href="{{ asset($folder->report) }}" target="_blank"></a>
                            @else
                                <a href="{{ asset($folder->report) }}" target="_blank"><img src="{{ asset('img/PDF_logo-1.png') }}"
                                        width="40" height="40" /></a>
                            @endif
                        </td>
                        <td>
                            @if ($folder->cnssSheet == null)
                                <a href="{{ asset($folder->cnssSheet) }}" target="_blank"></a>
                            @else
                                <a href="{{ asset($folder->cnssSheet) }}" target="_blank"><img src="{{ asset('img/PDF_logo-1.png') }}"
                                        width="40" height="40" /></a>
                            @endif
                        </td>
                        <td>
                            @if ($folder->balanceSheet == null)
                                <a href="{{ asset($folder->balanceSheet) }}" target="_blank"></a>
                            @else
                                <a href="{{ asset($folder->balanceSheet) }}" target="_blank"><img src="{{ asset('img/PDF_logo-1.png') }}"
                                        width="40" height="40" /></a>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn" data-toggle="modal"
                                data-target="#update{{ $folder->id }}">
                                <i class="fa-solid fa-pen-to-square text-info"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="update{{ $folder->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier le dossier</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST"
                                                action="{{ route('dFolder.update', ['dFolder' => $folder->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-md-6 mb-2">
                                                        <div class="form-floating ">
                                                            <input type="text"
                                                                class="form-control form-control-lg border-primary"
                                                                id="name" placeholder="Date rendez-vous "
                                                                name="name" value="{{ old('name', $folder->name) }}"  @disabled(true) />
                                                                <label for="floatingInput">Votre Nom</label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="prescription" class="form-label">
                                                            Ordonnance :
                                                        </label>
                                                        <input type="file" name="prescription" id="prescription"
                                                            class="form-control form-control-lg border-primary" accept=".pdf">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="report" class="form-label">
                                                            Rapport :
                                                        </label>
                                                        <input type="file" id="report"
                                                            class="form-control form-control-lg border-primary" name="report" accept=".pdf">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="cnssSheet" class="form-label">
                                                            Fiche CNSS :
                                                        </label>
                                                        <input type="file" name="cnssSheet" id="cnssSheet"
                                                            class="form-control form-control-lg border-primary" accept=".pdf">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="balanceSheet" class="form-label">
                                                            Bilan :
                                                        </label>
                                                        <input type="file" name="balanceSheet" id="balanceSheet"
                                                            class="form-control form-control-lg border-primary" accept=".pdf">
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

                            <form action="{{ route('dFolder.destroy', ['dFolder' => $folder->id]) }}" class="d-inline"
                                method="POST" id="folder{{ $folder->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn"
                                    type="button"onclick='handleDelete("folder{{ $folder->id }}")'><i
                                        class="fa-solid fa-trash text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{-- {{ $folders->links() }} --}}
    </div>
    <script>
        function handleDelete(idform) {
            let form = document.querySelector('#' + idform);
            if (confirm('Voluez-vous supprimer ce fichier ?')) {
                form.submit();
            }
        }
    </script>
@endsection
