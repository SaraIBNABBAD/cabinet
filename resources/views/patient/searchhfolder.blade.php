@extends('patient.templatePt')
@section('title', 'dossier medical')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <form action="{{ route('srchFolderPatnt') }}" method="get"
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
    </form>
    <div class="h5 mb-0 font-weight-bold text-primary float-end me-5">{{ $sum }} Résultats trouvés</div>
    <div class="card-body  mt-2">
        <h4 class="card-title">Dossier medical</h4>
        <table class="mb-4  mt-4 table table-striped">
            <thead class="text-center bg-primary text-white">
                <tr>

                    <th>Doctor</th>
                    <th>Ordonnance</th>
                    <th>Rapport</th>
                    <th>Fiche CNSS</th>
                    <th>Bilan</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($folder as $folder)
                    <tr>

                        <td hidden>{{ $folder->id }}</td>
                        <td>{{ $folder ->name}}</td>
                        @if ($folder->prescription == null)
                            <td></td>
                        @else
                            <td><img src="{{ asset('img/PDF_logo-1.png') }}" width="40" height="40" />&nbsp;&nbsp;<a
                                    href="{{ asset($folder->prescription) }}" target="_blank" download><i
                                        class="fa-solid fa-cloud-arrow-down text-primary"></i></a></td>
                        @endif


                        @if ($folder->report == null)
                            <td></td>
                        @else
                            <td>
                                <img src="{{ asset('img/PDF_logo-1.png') }}" width="40" height="40"
                                    download />&nbsp;&nbsp;
                                <a href="{{ asset($folder->report) }}" target="_blank" download><i class="fa-solid fa-cloud-arrow-down"></i>
                                </a>
                            </td>
                        @endif


                        @if ($folder->cnssSheet == null)
                            <td></td>
                        @else
                            <td><img src="{{ asset('img/PDF_logo-1.png') }}" width="40" height="40"
                                download />&nbsp;&nbsp;
                            <a href="{{ asset($folder->cnssSheet) }}" target="_blank" download><i class="fa-solid fa-cloud-arrow-down"></i>
                            </a></td>
                        @endif


                        @if ($folder->balanceSheet == null)
                            <td></td>
                        @else
                            <td><img src="{{ asset('img/PDF_logo-1.png') }}" width="40" height="40"
                                download />&nbsp;&nbsp;
                            <a href="{{ asset($folder->balanceSheet) }}" target="_blank" download><i class="fa-solid fa-cloud-arrow-down"></i>
                            </a></td>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $folders->links() }} --}}
    </div>
@endsection
