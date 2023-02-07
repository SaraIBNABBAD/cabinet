@extends('admin.templateAd')
@section('title', 'Liste des Patient')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des Patient</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>
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
            <tbody>
                @foreach ($patients as $patient)
                    <tr>

                        <td hidden>{{ $patient->id }}</td>
                        <td>
                            @if ($patient->picture == null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded" width="33px">
                            @else
                                <img src="{{ $patient->picture }}" alt="" class="rounded" width="33px">
                        </td>
                @endif

                <td>{{ $patient->name }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->birth }}</td>
                <td>{{ $patient->sang }}</td>


                <td><a type="button" class="btn" data-toggle="modal" data-target="#update{{$patient->id}}">
                        <i class="fa-solid fa-pen-to-square text-info"></i></a>

                   <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="update{{$patient->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('patients.update', ['patient' => $patient->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg" id="floatingInput" placeholder="Nom complet"
                                name="name" value="{{ old('name', $patient->name) }}" />
                            <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input type="text" id="floatingInput" class="form-control form-control-lg"
                                placeholder="Téléphone" name="phone" value="{{ old('phone', $patient->phone) }}" />
                            <label for="floatingInput">Téléphone <span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
    
                <div class="form-floating mb-4">
                    <input type="text" class="form-control form-control-lg" id="floatingInput" placeholder="Adresse mail"
                        name="email" value="{{ old('email', $patient->email) }}" />
                    <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                </div>
    
                <div class="row d-none">
                    <div class="col-md-6 mb-4">
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control form-control-lg" id="floatingInput"
                                placeholder="Mot de passe" name="password">
                            <label for="floatingInput">Mot de passe <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control form-control-lg" id="floatingInput"
                                placeholder="Confirmer le mot de passe" name="confirmation_password">
                            <label for="floatingInput">Confirmer le mot de passe <span class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>
    
                <div class="form-floating mb-4">
                    <input type="text" class="form-control form-control-lg" id="floatingInput"
                        placeholder="Adresse de résidence" name="address" value="{{ old('address', $patient->address) }}" />
                    <label for="floatingInput">Adresse</label>
                </div>
    
                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
    
                    <h6 class="mb-0 me-4">Sexe : <span class="text-danger">*</span></h6>
    
                    <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="femme" value="Femme"
                            {{ $patient->gender === 'Femme' ? 'checked' : '' }} />
                        <label class="form-check-label" for="femme">Femme</label>
                    </div>
                    <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="homme" value="Homme"
                            {{ $patient->gender === 'Homme' ? 'checked' : '' }} />
                        <label class="form-check-label" for="homme">Homme</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 me-5">
                        <label>Groupe Sanguin :</label>
                        <select class="form-select" aria-label="Default select example" name="sang">
                            <option value="O+"{{ $patient->sang === 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-"{{ $patient->sang === 'O-' ? 'selected' : '' }}>O-</option>
                            <option value="A+"{{ $patient->sang === 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-"{{ $patient->sang === 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+"{{ $patient->sang === 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-"{{ $patient->sang === 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+"{{ $patient->sang === 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-"{{ $patient->gender === 'AB-' ? 'selected' : '' }}>AB-</option>
    
                        </select>
    
                    </div>
                    <div class="col-md-6 mb-4 me-5">
                        <div class="form-floating mb-4">
                            <input type="date" class="form-control form-control-lg" id="floatingInput"
                                placeholder="Date de naissance" name="birth" value="{{ old('birth', $patient->birth) }}" />
                            <label for="floatingInput">Date de naissance</label>
                        </div>
                    </div>
                </div>
    
                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
    
                    <h6 class="mb-0 me-4">Mutuelle : <span class="text-danger">*</span></h6>
    
                    <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="mutuelle" id="oui" value="oui"
                            {{ $patient->mutuelle === 'oui' ? 'checked' : '' }} />
                        <label class="form-check-label" for="oui">Oui</label>
                    </div>
                    <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="mutuelle" id="non"
                            value="non" {{ $patient->mutuelle === 'non' ? 'checked' : '' }} />
                        <label class="form-check-label" for="non">Non</label>
                    </div>
    
    
                </div>
    
    
    
                <div class="form-outline mb-4">
                    <h6 class="form-labelv" for="picture">Photo :</h6>
                    <input type="file" id="picture" class="form-control form-control-lg" name="picture"
                        accept="image/*" />
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
                        <form action="{{ route('patients.destroy', ['patient' => $patient->id]) }}" class="d-inline"
                            method="POST" id="patient{{ $patient->id }}">
                            @csrf
                            @method('delete')
                            <button class="btn" type="button"
                                onclick='handleDelete("patient{{ $patient->id }}")'><i
                                    class="fa-solid fa-trash text-danger"></i></button>
                        </form>
                        <a type="button" class="btn" href="{{ route('patients.create')}}"><i class="fa-solid fa-square-plus text-success "></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
