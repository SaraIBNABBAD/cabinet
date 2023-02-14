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
        <h5 class="card-title">Liste des Patient</h5>
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
                        <td>{{ $folder->id }}</td>
                        <td>{{ $folder->name }}</td>
                        <td><embed src="{{ asset( $folder->prescription ) }}" width="100" height="100" type="application/pdf" /></td>
                        <td><embed src="{{ asset( $folder->report ) }}" width="100" height="100" type="application/pdf" /></td>
                        
                        <td><iframe src="{{ asset($folder->cnssSheet) }}" frameborder="0"></iframe></td>
                        <td>{{ $folder->balanceSheet }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
