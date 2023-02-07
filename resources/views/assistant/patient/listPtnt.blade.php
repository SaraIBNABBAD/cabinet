@extends('assistant.templateAss')
@section('title', 'Liste des asPatient')
@section('content')
    <div class="card-body">
        <h5 class="card-title">Liste des asPatient</h5>
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
                @foreach ($asPatients as $asPatient)
                    <tr>

                        <td hidden>{{ $asPatient->id }}</td>
                        <td>
                            @if ($asPatient->picture==null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded" width="33px">
                            @else
                                <img src="{{ $asPatient->picture }}" alt="" class="rounded" width="33px"></td>
                            @endif
                            
                        <td>{{ $asPatient->name }}</td>
                        <td>{{ $asPatient->gender }}</td>
                        <td>{{ $asPatient->address }}</td>
                        <td>{{ $asPatient->phone }}</td>
                        <td>{{ $asPatient->birth }}</td>
                        <td>{{ $asPatient->sang }}</td>
                        

                        <td><button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-pen-to-square text-info"></i></button>
                            </button><div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      ...
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            

                            <form action="{{ route('Apatient.destroy', ['Apatient'=>$asPatient->id]) }}" class="d-inline"
                                method="POST" id="asPatient{{ $asPatient->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("asPatient{{ $asPatient->id }}")'><i class="fa-solid fa-trash text-danger"></i></button>
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
            if (confirm('Voluez-vous supprimer ce asPatient ?')) {
                form.submit();
            }
        }
    </script>
@endsection
