@extends('doctor.templateDt')
@section('title', 'Dossier medical')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <div class="card-body">
        <h5 class="card-title">Dossier medical</h5>
        <table class="mb-0 table table-striped">
            <thead>
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
            <tbody>

                @foreach ($folders as $folder)
                    <tr>
                        <td hidden>{{ $folder->id }}</td>
                        <td>
                            @if ($folder->picture == null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded" width="33px">
                            @else
                                <img src="{{ $folder->picture }}" alt="" class="rounded" width="33px">
                            @endif
                        </td>

                        <td>{{ $folder->name }}</td>

                        <td>
                            @if ($folder->prescription == null)
                                <a href="{{ asset($folder->prescription) }}"></a>
                            @else
                                <a href="{{ asset($folder->prescription) }}"><img src="{{ asset('img/PDF_logo-1.png') }}"
                                        width="40" height="40" /></a>
                            @endif
                        </td>
                        <td>
                            @if ($folder->report == null)
                                <a href="{{ asset($folder->report) }}"></a>
                            @else
                                <a href="{{ asset($folder->report) }}"><img src="{{ asset('img/PDF_logo-1.png') }}"
                                        width="40" height="40" /></a>
                            @endif
                        </td>
                        <td>
                            @if ($folder->cnssSheet == null)
                                <a href="{{ asset($folder->cnssSheet) }}"></a>
                            @else
                                <a href="{{ asset($folder->cnssSheet) }}"><img src="{{ asset('img/PDF_logo-1.png') }}"
                                        width="40" height="40" /></a>
                            @endif
                        </td>
                        <td>
                            @if ($folder->balanceSheet == null)
                                <a href="{{ asset($folder->balanceSheet) }}"></a>
                            @else
                                <a href="{{ asset($folder->balanceSheet) }}"><img src="{{ asset('img/PDF_logo-1.png') }}"
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
                                                    <div class="col-md-9">
                                                        <div class="form-floating mb-4">
                                                            <input type="text"
                                                                class="form-control form-control-lg @error('name')is-invalid
                    
                                                            @enderror"
                                                                id="floatingInput" placeholder="Nom complet" name="name"
                                                                value="{{ old('name', $folder->name) }}" />
                                                            <label for="floatingInput">Nom Patient <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                        @error('name')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div>
                                                    <label for="prescription" class="form-label">
                                                        Ordonnance :
                                                    </label>
                                                    <input type="file" name="prescription" id="prescription"
                                                        class="form-control form-control-lg" accept=".pdf">
                                                </div>
                                                <div>
                                                    <label for="report" class="form-label">
                                                        Rapport :
                                                    </label>
                                                    <input type="file" id="report"
                                                        class="form-control form-control-lg" name="report" accept=".pdf">
                                                </div>


                                                <div>
                                                    <label for="cnssSheet" class="form-label">
                                                        Fiche CNSS :
                                                    </label>
                                                    <input type="file" name="cnssSheet" id="cnssSheet"
                                                        class="form-control form-control-lg" accept=".pdf">
                                                </div>
                                                <div>
                                                    <label for="balanceSheet" class="form-label">
                                                        Bilan :
                                                    </label>
                                                    <input type="file" name="balanceSheet" id="balanceSheet"
                                                        class="form-control form-control-lg" accept=".pdf">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
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
        {{ $folders->links() }}
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
