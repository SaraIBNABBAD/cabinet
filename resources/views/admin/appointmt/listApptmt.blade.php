@extends('admin.templateAd')
@section('title', 'Liste des Rendez-vous')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <div class="card-body">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title">Liste des Rendez-vous</h5>
            <a href="{{ route('adApp.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Ajouter Rdv</a>
        </div>
        <table class="mb-0 table table-striped">
            <thead class="text-center">
                <tr>

                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Date & Heure</th>
                    <th>Maladie</th>
                    <th>Docteur</th>
                    <th>Motif</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apponts as $appont)
                    <tr>

                        <td hidden>{{ $appont->patient_id }}</td>
                        <td scope="row">{{ $appont->patient->name }}</td>
                        <td>{{ $appont->patient->phone }}</td>
                        <td>{{ $appont->patient->email }}</td>
                        <td>{{ $appont->time }}</td>
                        <td>{{ $appont->disease }}</td>
                        <td>{{ $appont->doctor->name }}</td>
                        <td>{{ $appont->motif }}</td>
                        <td>{{ $appont->state }}</td>

                        <td><a type="button" class="btn" data-toggle="modal" data-target="#update{{ $appont->id }}"><i
                                    class="fa-solid fa-pen-to-square text-info"></i></a>


                            <!-- Modal -->
                            <div class="modal fade" id="update{{ $appont->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('adApp.update', ['adApp' => $appont->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input type="text" class="form-control form-control-lg"
                                                                id="floatingInput" placeholder="Nom complet" name="name"
                                                                value="{{ old('name', $appont->name) }}"@disabled(true) />
                                                            <label for="floatingInput">Nom complet <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="datetime-local"
                                                                class="form-control form-control-lg @error('time')is-invalid
                            
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
                                                    <div class="col-md-6 mb-4">
                                                        <label for="splt">Département : <span
                                                                class="text-danger">*</span></label>
                                                        <select
                                                            class="form-select @error('disease')is-invalid
                        
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
                                                    <div class="col-md-6">
                                                        <label for="">Docteur : <span
                                                                class="text-danger">*</span></label>
                                                        <select name="doctor" id="" class="form-select"
                                                            aria-label="Default select example">
                                                            @foreach (\App\Models\User::where('role', 'Doctor')->get() as $doctor)
                                                                <option value="{{ $doctor->name }}">{{ $doctor->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Motif : <span
                                                                class="text-danger">*</span></label>
                                                        <select name="motif" id=""
                                                            class="form-select @error('motif')is-invalid
                            
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

                                                    <div class="col-md-6">
                                                        <label for="">Statut : <span
                                                                class="text-danger">*</span></label>
                                                        <select name="state" id=""
                                                            class="form-select @error('state')is-invalid
                                
                                                       @enderror"
                                                            aria-label="Default select example">
                                                            <option
                                                                value="Valider"{{ $appont->state === 'Valider ' ? 'selected' : '' }}>
                                                                Validé</option>
                                                            <option
                                                                value="Terminer"{{ $appont->state === 'Terminer' ? 'selected' : '' }}>
                                                                Terminé</option>
                                                            <option
                                                                value="Annuler"{{ $appont->state === 'Annuler' ? 'selected' : '' }}>
                                                                Annulé</option>
                                                        </select>
                                                        @error('state')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
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

                            <form action="{{ route('adApp.destroy', ['adApp' => $appont->id]) }}" class="d-inline"
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
        {{ $apponts->links() }}
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
    </script>
@endsection
