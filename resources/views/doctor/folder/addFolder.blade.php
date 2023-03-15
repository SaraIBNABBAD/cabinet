@extends('doctor.templateDt')
@section('title', 'dossier medical')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <section class=" gradient-custom">
        <h3 class="text-uppercase text-center mb-3">Ajouter Dossier Medical</h3>
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="{{ route('dFolder.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="splt">Choisissez Nom : <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-lg border-primary mb-3" aria-label=".form-select-lg example"
                                        name="name">
                                        @foreach (\App\Models\User::where('role', 'Patient')->get('name') as $patient)
                                            <option value="{{ $patient->name }}">{{ $patient->name }}</option>
                                        @endforeach


                                    </select>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prescription" class="form-label">
                                        Ordonnance :
                                    </label>
                                    <input type="file" name="prescription" id="prescription"
                                        class="form-control form-control-lg border-primary accept=".pdf">
                                </div>
                                <div class="col-md-6">
                                    <label for="report" class="form-label">
                                        Rapport :
                                    </label>
                                    <input type="file" id="report" class="form-control form-control-lg border-primary name="report"
                                        accept=".pdf">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cnssSheet" class="form-label">
                                        Fiche CNSS :
                                    </label>
                                    <input type="file" name="cnssSheet" id="cnssSheet"
                                        class="form-control form-control-lg border-primary accept=".pdf">
                                </div>
                                <div class="col-md-6">
                                    <label for="balanceSheet" class="form-label">
                                        Bilan :
                                    </label>
                                    <input type="file" name="balanceSheet" id="balanceSheet"
                                        class="form-control form-control-lg border-primary accept=".pdf">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end pt-3 ">
                                <button type="submit" class="btn btn-outline-primary btn-lg  mt-2 w-25">Enregister</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
