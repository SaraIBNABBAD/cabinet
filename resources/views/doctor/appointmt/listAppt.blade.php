@extends('doctor.templateDt')
@section('title', 'Liste des Rendez-vous')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des Rendez-vous</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>

                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Date & Heure</th>
                    <th>Maladie</th>
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
                        <td>{{$appont->disease}}</td>
                        <td>{{$appont->motif}}</td>
                        <td>{{$appont->state}}</td>

                        <td><button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#update{{ $appont->id }}"><i class="fa-solid fa-pen-to-square text-info"></i></button>

                                 
                            <div class="modal fade" id="update{{ $appont->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('docApp.update', ['docApp'=>$appont->id]) }}">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">
                                                        <input type="text"
                                                            class="form-control form-control-lg @error('name')is-invalid
                                                        
                                                    @enderror"
                                                            id="floatingInput" placeholder="Nom complet" name="name" />
                                                        <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
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
                                                            placeholder="Téléphone" name="phone" />
                                                        <label for="floatingInput">Téléphone <span class="text-danger">*</span></label>
                                                    </div>
                                                    @error('phone')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-4">
                                                        <input type="text" class="form-control form-control-lg" id="floatingInput"
                                                            placeholder="Adresse de résidence" name="address" />
                                                        <label for="floatingInput">Adresse</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-floating mb-4">
                                                        <input type="datetime-local"
                                                            class="form-control form-control-lg @error('time')is-invalid
                                                        
                                                    @enderror"
                                                            id="floatingInput" placeholder="Date rendez-vous " name="time">
                                                        <label for="floatingInput">Date rendez-vous <span class="text-danger">*</span></label>
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
                                                    <label for="splt">Département : <span class="text-danger">*</span></label>
                                                    <select
                                                        class="form-select @error('disease')is-invalid
                                                    
                                                @enderror"
                                                        aria-label="Default select example" name="disease">
                                                        
                                                            <option value="{{Auth::user()->speciality}}">{{Auth::user()->speciality}}</option>
                                                        
                                    
                                    
                                                    </select>
                                                    @error('disease')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Docteur : <span class="text-danger">*</span></label>
                                                    <select name="doctor" id="" class="form-select" aria-label="Default select example">
                                                        
                                                            <option value="{{ Auth::user()->name}}">{{ Auth::user()->name}}</option>
                                                        
                                    
                                                    </select>
                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Motif : <span class="text-danger">*</span></label>
                                                    <select name="motif" id=""
                                                        class="form-select @error('motif')is-invalid
                                                        
                                                    @enderror"
                                                        aria-label="Default select example">
                                                        <option value="Consultation">Consultation</option>
                                                        <option value="Traitement">Traitement</option>
                                                    </select>
                                                    @error('motif')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end pt-3 me-5">
                                                <button type="submit" class="btn btn-success btn-lg ms-2">Enregister</button>
                                            </div>
                                    
                                    
                                        </form>
                                      {{-- ... --}}
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <form action="{{ route('docApp.destroy', ['docApp'=>$appont->id]) }}" class="d-inline"
                                method="POST" id="appont{{ $appont->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("appont{{ $appont->id }}")'><i class="fa-solid fa-trash text-danger"></i></button>
                            </form>
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
