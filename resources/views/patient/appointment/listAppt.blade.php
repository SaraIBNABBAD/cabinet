@extends('patient.templatePt')
@section('title', 'Liste des Rendez-vous')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <!-- Topbar Search -->
    <form action="{{ route('srchAppntPatnt') }}" method="get"
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
    <div class="card-body">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title">Liste des Rendez-vous</h5>
            <a href="{{ route('rendezVous.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter Rdv</a>
        </div>
        <div class="table-responsive">
            <table class="mb-0 table table-striped">
                <thead class="text-center bg-primary text-white">
                    <tr>

                        <th>Docteur</th>
                        <th>Date & Heure</th>
                        <th>Maladie</th>
                        <th>Motif</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($appnts as $appnt)
                        <tr>
                            <td>{{ $appnt->name }}</td>
                            <td hidden>{{ $appnt->id }}</td>
                            <td>{{ $appnt->time }}</td>
                            <td>{{ $appnt->disease }}</td>
                            <td>{{ $appnt->motif }}</td>
                            <td><a type="button" class="btn" data-toggle="modal"
                                    data-target="#update{{ $appnt->id }}"><i
                                        class="fa-solid fa-pen-to-square text-info"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="update{{ $appnt->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modifier Rendez-vous</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('rendezVous.update', ['rendezVou' => $appnt->id]) }}">
                                                    @csrf
                                                    @method('put')

                                                    <div class="row">

                                                    </div>



                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Docteur : <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="doctor" id=""
                                                                class="form-select form-select-lg border-primary"
                                                                aria-label="Default select example">
                                                                @foreach (\App\Models\User::where('role', 'Doctor')->get() as $doctor)
                                                                    <option value="{{ $doctor->name }}">
                                                                        {{ $doctor->name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label for="splt">Département : <span
                                                                    class="text-danger">*</span></label>
                                                            <select
                                                                class="form-select form-select-lg border-primary @error('disease')is-invalid
                        
                                                                 @enderror"
                                                                aria-label="Default select example" name="disease">
                                                                @foreach (\App\Models\User::where('role', 'Doctor')->get('speciality') as $doctor)
                                                                    <option value="{{ $doctor->speciality }}">
                                                                        {{ $doctor->speciality }}</option>
                                                                @endforeach


                                                            </select>
                                                            @error('disease')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Motif : <span
                                                                    class="text-danger">*</span></label>
                                                            <select name="motif" id=""
                                                                class="form-select form-select-lg border-primary @error('motif')is-invalid
                            
                                                            @enderror"
                                                                aria-label="Default select example">
                                                                <option
                                                                    value="Consultation"{{ $appnt->motif === 'Consultation' ? 'selected' : '' }}>
                                                                    Consultation</option>
                                                                <option
                                                                    value="Traitement"{{ $appnt->motif === 'Traitement' ? 'selected' : '' }}>
                                                                    Traitement</option>
                                                            </select>
                                                            @error('motif')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="floatingInput">Date rendez-vous <span
                                                                    class="text-danger">*</span></label>

                                                            <input type="datetime-local"
                                                                class="form-control form-control-lg border-primary @error('time')is-invalid
                            
                                                                @enderror"
                                                                id="time" placeholder="Date rendez-vous "
                                                                name="time" value="{{ old('time', $appnt->time) }}" />


                                                            @error('time')
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

                                <form action="{{ route('rendezVous.destroy', ['rendezVou' => $appnt->id]) }}"
                                    class="d-inline" method="POST" id="appnt{{ $appnt->id }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn" type="button"
                                        onclick='handleDelete("appnt{{ $appnt->id }}")'><i
                                            class="fa-solid fa-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $appnts->links() }}
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
