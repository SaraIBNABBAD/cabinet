@extends('doctor.templateDt')
@section('title', 'Liste des Rendez-vous')
@section('content')

    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <!-- Topbar Search -->
    <form action="{{ route('srchApptDoc') }}" method="get"
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
        <div class="input-group mt-4">
            <label for="date"> from : </label>
            <input type="datetime-local" name="from" class="form-control bg-light border-0 small"
                placeholder="Votre recherche..." aria-label="Search" aria-describedby="basic-addon2" id="time1">
            <label for="date"> to : </label>
            <input type="datetime-local" name="to" class="form-control bg-light border-0 small"
                placeholder="Votre recherche..." aria-label="Search" aria-describedby="basic-addon2" id="time2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    {{-- <div class="h5 mb-0 font-weight-bold text-primary float-end me-5">{{ $sumP }} Rendez-vous trouvé(s)</div> --}}
  
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="card-title">Liste des Rendez-vous</h4>
            <a href="{{ route('docApp.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter Rdv</a>
        </div>
        <table class="mb-4 table table-striped">
            <thead class="text-center bg-primary text-white">
                <tr>
                    <th hidden>#</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Date & Heure</th>
                    <th>Motif</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($appont as $appont)
                    <tr>

                        <td>
                            @if ($appont->picture == null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded"
                                    width="33px">
                            @else
                                <img src="{{ $appont->picture }}" alt="" class="rounded" width="33px">
                            @endif
                        </td>
                        <td scope="row">{{ $appont->patient->name }}</td>
                        <td>{{ $appont->patient->phone }}</td>
                        <td>{{ $appont->time }}</td>
                        <td>{{ $appont->motif }}</td>
                        <td>{{ $appont->state }}</td>

                        <td><button type="button" class="btn" data-toggle="modal"
                                data-target="#update{{ $appont->id }}"><i
                                    class="fa-solid fa-pen-to-square text-info"></i></button>


                            <!-- Modal -->
                            <div class="modal fade" id="update{{ $appont->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modifier Rendez-vous</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{ route('docApp.update', ['docApp' => $appont->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">

                                                    <div class="col-md-6 mb-2">
                                                        <div class="form-floating ">
                                                            <input type="text"
                                                                class="form-control form-control-lg border-primary"
                                                                id="name" placeholder="Date rendez-vous "
                                                                name="name" value="{{ old('name', $appont->name) }}"
                                                                @disabled(true) />
                                                            <label for="floatingInput">Votre Nom</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-floating ">
                                                            <input type="datetime-local"
                                                                class="form-control form-control-lg border-primary @error('time')is-invalid

                                                                            @enderror"
                                                                id="time" placeholder="Date rendez-vous "
                                                                name="time" value="{{ old('time', $appont->time) }}">
                                                            <label for="floatingInput">Date rendez-vous <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                        @error('time')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Statut : <span
                                                                class="text-danger">*</span></label>
                                                        <select name="state" id=""
                                                            class="form-select border-primary @error('state')is-invalid

                                                                  @enderror"
                                                            aria-label="Default select example">
                                                            <option
                                                                value="Valider"{{ $appont->state === 'Valider ' ? 'selected' : '' }}
                                                                class="text-success">
                                                                Validé <i
                                                                    class="fa-regular fa-circle-check text-success"></i>
                                                            </option>
                                                            <option
                                                                value="Terminer"{{ $appont->state === 'Terminer' ? 'selected' : '' }}
                                                                class="text-primary">
                                                                Terminé <i
                                                                    class="fa-solid fa-calendar-check text-primary"></i>
                                                            </option>
                                                            <option
                                                                value="Annuler"{{ $appont->state === 'Annuler' ? 'selected' : '' }}
                                                                class="text-danger">
                                                                Annulé <i
                                                                    class="fa-regular fa-circle-xmark text-danger"></i>
                                                            </option>
                                                        </select>
                                                        @error('state')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Motif : <span
                                                                class="text-danger">*</span></label>
                                                        <select name="motif" id=""
                                                            class="form-select border-primary @error('motif')is-invalid

                                                           @enderror"
                                                            aria-label="Default select example">
                                                            <option
                                                                value="Consultation"{{ $appont->motif === 'Consultation ' ? 'selected' : '' }}>
                                                                Consultation</option>
                                                            <option
                                                                value="Traitement"{{ $appont->motif === 'Traitement' ? 'selected' : '' }}>
                                                                Traitement</option>
                                                        </select>
                                                        @error('motif')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
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

                            <form action="{{ route('docApp.destroy', ['docApp' => $appont->id]) }}" class="d-inline"
                                method="POST" id="appont{{ $appont->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("appont{{ $appont->id }}")'><i
                                        class="fa-solid fa-trash text-danger"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $apponts->links() }} --}}
    </div>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        function handleDelete(idform) {
            let form = document.querySelector('#' + idform);
            if (confirm('Voluez-vous supprimer ce Rendez-vous ?')) {
                form.submit();
            }
        }
        flatpickr("#time", {
            enableTime: true,
            time_24hr: true,
            minTime: "9:00",
            maxTime: "17:00",
            minDate: "today",
            locale: {
                firstDayOfWeek: 1
            },
            "disable": [

                function(date) {
                    return (date.getDay() === 0 || date.getDay() === 6);

                }

            ]
        });

        flatpickr("#time1", {
            enableTime: true,
            time_24hr: true,
            minTime: "9:00",
            maxTime: "17:00",
            // minDate: "today",
            locale: {
                firstDayOfWeek: 1
            },
            "disable": [

                function(date) {
                    return (date.getDay() === 0 || date.getDay() === 6);

                }

            ]
        });

        flatpickr("#time2", {
            enableTime: true,
            time_24hr: true,
            minTime: "9:00",
            maxTime: "17:00",
            // minDate: "today",
            locale: {
                firstDayOfWeek: 1
            },
            "disable": [

                function(date) {
                    return (date.getDay() === 0 || date.getDay() === 6);

                }

            ]
        });

    </script>
@endsection
