@extends('admin.templateAd')
@section('title', 'Liste des docteurs')
@section('content')
@if (session('success'))
<x-alert :message="session('success')" />
@endif
@if (session('error'))
<x-alert type="danger" :message="session('error')" />
@endif
    <div class="card-body">
        <h5 class="card-title">Liste des docteurs</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom </th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>

                        <td hidden>{{ $staff->id }}</td>
                        <td>
                            @if ($staff->picture==null)
                                <img src="{{ asset('img/avatar/avatar.png') }}" alt="" class="rounded" width="33px">
                            @else
                              <img src="{{ $staff->picture }}" alt="" class="rounded" width="33"></td>  
                            @endif
                            
                        <td scope="row">{{ $staff->name }}</td>
                        <td>{{ $staff->role }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->phone }}</td>
                        

                        <td><a type="button" class="btn" data-toggle="modal" data-target="#update{{$staff->id}}"><i class="fa-solid fa-pen-to-square text-info"></i></a>

                     
  
  <!-- Modal -->
  <div class="modal fade" id="update{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('staffs.update',['staff'=>$staff->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-4">

                            <input type="text" class="form-control form-control-lg"
                                id="floatingInput" placeholder="Nom complet" name="name" value="{{old('name',$staff->name)}}"/>

                            <label for="floatingInput">Nom complet <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-4">
                            <input type="text" id="floatingInput"
                                class="form-control form-control-lg" placeholder="Téléphone"
                                name="phone" value="{{old('phone',$staff->phone)}}"/>
                            <label for="floatingInput">Téléphone <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control form-control-lg" id="floatingInput"
                        placeholder="Adresse mail" name="email" value="{{old('email',$staff->email)}}"/>
                    <label for="floatingInput">E-mail <span class="text-danger">*</span></label>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 d-none" >
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control form-control-lg"
                                id="floatingInput" placeholder="Mot de passe" name="password"/>
                            <label for="floatingInput">Mot de passe <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 d-none" >
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control form-control-lg"
                                id="floatingInput" placeholder="Confirmer le mot de passe"
                                name="confirmation_password"/>
                            <label for="floatingInput">Confirmer le mot de passe <span
                                    class="text-danger">*</span></label>
                        </div>
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label>Photo :</label>
                    <input type="file" id="picture" class="form-control form-control-lg"
                        name="picture" accept="image/*" />
                </div>

                <label for="splt">Spécialté : <span class="text-danger">*</span></label>
                <select class="form-select" aria-label="Default select example" name="role">

                    <option value="Assistant" {{ $staff->role === 'Assistant' ? 'selected' : '' }}>Assistant</option>
                    <option value="Staff" {{ $staff->role === 'Staff' ? 'selected' : '' }}>Staff</option>
                    
                </select>
        </div>
        
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

                            <form action="{{ route('staffs.destroy', ['staff' => $staff->id]) }}" class="d-inline"
                                method="POST" id="staff{{ $staff->id }}">
                                @csrf
                                @method('delete')
                                <button class="btn" type="button"
                                    onclick='handleDelete("staff{{ $staff->id }}")'><i class="fa-solid fa-trash text-danger"></i></button>
                            </form>
                            <a type="button" class="btn" href="{{ route('staffs.create')}}"><i class="fa-solid fa-square-plus text-success "></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
