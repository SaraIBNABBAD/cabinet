@extends('patient.templatePt')
@section('title', 'dossier medical')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <div class="card-body">
        <h5 class="card-title">Dossier medical</h5>
        <table class="mb-0 table table-striped">
            <thead>
                <tr>

                    <th>Doctor</th>
                    <th>Ordonnance</th>
                    <th>Rapport</th>
                    <th>Fiche CNSS</th>
                    <th>Bilan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($folders as $folder)
                    <tr>

                        <td hidden>{{ $folder->id }}</td>
                        <td>{{ $folder ->name}}</td>
                        @if ($folder->prescription == null)
                            <td></td>
                        @else
                            <td><img src="{{ asset('img/PDF_logo-1.png') }}" width="40" height="40" />&nbsp;&nbsp;<a
                                    href="{{ asset($folder->prescription) }}" download><i
                                        class="fa-solid fa-cloud-arrow-down text-primary"></i></a></td>
                        @endif


                        @if ($folder->report == null)
                            <td></td>
                        @else
                            <td>
                                <img src="{{ asset('img/PDF_logo-1.png') }}" width="40" height="40"
                                    download />&nbsp;&nbsp;
                                <a href="{{ asset($folder->report) }}" download><i class="fa-solid fa-cloud-arrow-down"></i>
                                </a>
                            </td>
                        @endif


                        @if ($folder->cnssSheet == null)
                            <td></td>
                        @else
                            <td><img src="{{ asset('img/PDF_logo-1.png') }}" width="40" height="40"
                                download />&nbsp;&nbsp;
                            <a href="{{ asset($folder->cnssSheet) }}" download><i class="fa-solid fa-cloud-arrow-down"></i>
                            </a></td>
                        @endif


                        @if ($folder->balanceSheet == null)
                            <td></td>
                        @else
                            <td><img src="{{ asset('img/PDF_logo-1.png') }}" width="40" height="40"
                                download />&nbsp;&nbsp;
                            <a href="{{ asset($folder->balanceSheet) }}" download><i class="fa-solid fa-cloud-arrow-down"></i>
                            </a></td>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $folders->links() }}
    </div>
@endsection
