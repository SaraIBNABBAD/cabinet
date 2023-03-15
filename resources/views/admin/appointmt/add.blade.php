@extends('admin.templateAd')
@section('title', 'Rendez-vous')
@section('content')
    @if (session('success'))
        <x-alert :message="session('success')" />
    @endif
    @if (session('error'))
        <x-alert type="danger" :message="session('error')" />
    @endif
    <section class=" gradient-custom">
        <h3 class="text-uppercase text-center mb-3">Ajouter Rendez-vous</h3>
        <div class="row justify-content-center align-items-center ">
            <div class="col-12 col-lg-9">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">

                        <form method="POST" action="{{ route('adApp.store') }}">
                            @csrf
                            <div class="row justify-content-center gap-5 ">
                                <div class="col-md-4 ">

                                    <label for="splt">Sélectionnez le Nom : <span class="text-danger">*</span></label>
                                    <select class="form-select  mb-3 border-primary" aria-label=".form-select-lg example"
                                        name="name">
                                        @foreach (\App\Models\User::where('role', 'Patient')->get('name') as $patient)
                                            <option value="{{ $patient->name }}">{{ $patient->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <label for="">Docteur : <span class="text-danger">*</span></label>
                                    <select name="doctor" id="" class="form-select border-primary"
                                        aria-label="Default select example">
                                        @foreach (\App\Models\User::where('role', 'Doctor')->get() as $doctor)
                                            <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <div class="row justify-content-center gap-5">
                                <div class="col-md-4 mb-4">
                                    <label for="splt">Département : <span class="text-danger">*</span></label>
                                    <select
                                        class="form-select border-primary @error('disease')is-invalid
                
                                              @enderror"
                                        aria-label="Default select example" name="disease">
                                        @foreach (\App\Models\User::where('role', 'Doctor')->get('speciality') as $doctor)
                                            <option value="{{ $doctor->speciality }}">{{ $doctor->speciality }}</option>
                                        @endforeach


                                    </select>
                                    @error('disease')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="">Motif : <span class="text-danger">*</span></label>
                                    <select name="motif" id=""
                                        class="form-select border-primary @error('motif')is-invalid
                    
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
                            <div class="row justify-content-center gap-5">

                                <div class="col-md-4 mb-4">
                                    <div class="form-floating mb-4">
                                        <input type="datetime-local"
                                            class="form-control border-primary @error('time')is-invalid
                    
                                            @enderror"
                                            id="time" placeholder="Date rendez-vous " name="time">
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
                            <div class="d-flex justify-content-end pt-3 me-5">
                                <button type="submit" class="btn btn-outline-primary btn-lg ms-2 w-25">Enregister</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#time", {
            enableTime: true,
            time_24hr: true,
            minTime: "9:00",
            maxTime: "17:00",
            minDate: "today",
            locale: {
                firstDayOfWeek: 1
            },
            "disable": [

                function(date) {
                    return (date.getDay() === 0 || date.getDay() === 6);

                }

            ]
        });
    </script>
@endsection
