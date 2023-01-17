@extends('admin.templateAd')
@section('title','Liste des docteurs')
@section('content')
<div class="card-body">
    <h5 class="card-title">Liste des docteurs</h5>
    <table class="mb-0 table table-striped">
    <thead>
    <tr>
    
    <th>Nom & Prénom</th>
    <th>Spécialité</th>
     <th>Email</th>
     <th>Téléphone</th>
     <th>Image</th>
     <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
          
            <td scope="row">{{$user->name}}</td>
            <td>{{$user->speciality}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td><img src="{{$user->picture}}" alt="" class="w-25"></td>
            <td><a class="btn  " href="" class="d-inline"><i class="fa-solid fa-pen-to-square text-info"></i></a>
        <form action="" class="d-inline"
            method="POST">
            @csrf
            @method('delete')
            <button class="btn" type="submit" class="d-inline"><i class="fa-solid fa-trash text-danger"></i></button>
        </form>
    </td>
            </tr>
        @endforeach
    
    </tbody>
    </table>
    </div>
@endsection