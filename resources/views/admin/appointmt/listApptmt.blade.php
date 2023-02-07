@extends('admin.templateAd')
@section('title', 'Liste des Rendez-vous')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des Rendez-vous</h5>
        <table class="mb-0 table table-striped">
            <thead class="text-center">
                <tr>

                    <th>Nom</th>
                    <th>Téléphone</th>
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

                        <td hidden>{{ $appont->id }}</td>
                        <td scope="row">{{ $appont->name }}</td>
                        <td>{{ $appont->phone }}</td>
                        <td>{{ $appont->time }}</td>
                        <td>{{ $appont->disease }}</td>
                        <td>{{ $appont->doctor }}</td>
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
                                                            <input type="text"
                                                                class="form-control form-control-lg @error('name')is-invalid
                            
                        @enderror"
                                                                id="floatingInput" placeholder="Nom complet" name="name"
                                                                value="{{ old('name', $appont->name) }}" />
                                                            <label for="floatingInput">Nom complet <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                        @error('name')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-4">
                                                            <input type="tel" id="floatingInput"
                                                                class="form-control form-control-lg @error('phone')is-invalid
                            
                        @enderror"
                                                                placeholder="Téléphone" name="phone"
                                                                value="{{ old('phone', $appont->phone) }}" />
                                                            <label for="floatingInput">Téléphone <span
                                                                    class="text-danger">*</span></label>
                                                        </div>
                                                        @error('phone')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-floating mb-4">
                                                            <input type="datetime-local"
                                                                class="form-control form-control-lg @error('time')is-invalid
                            
                        @enderror"
                                                                id="floatingInput" placeholder="Date rendez-vous "
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
                            <a type="button" class="btn" href="{{ route('adApp.create')}}"><i class="fa-solid fa-square-plus text-success "></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function handleDelete(idform) {
            let form = document.querySelector('#' + idform);
            if (confirm('Voluez-vous supprimer ce Rendez-vous ?')) {
                form.submit();
            }
        }
    </script>
@endsection
