@extends('patient.templatePt')
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
                        <form method="POST" action="{{ route('rendezVous.store') }}">
                            @csrf

                            <div class="row d-none">
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating mb-4">
                                        <input type="text"
                                            class="form-control form-control-lg border-primary @error('name')is-invalid @enderror"
                                            id="floatingInput" placeholder="Nom complet" name="name"
                                            value="{{ Auth::user()->name }}" />
                                        <label for="floatingInput">Nom complet <span class="text-danger">*</span></label>
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>


                            <div class="row">

                            </div>




                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Docteur : <span class="text-danger">*</span></label>
                                    <select name="doctor" id="" class="form-select form-select-lg border-primary"
                                        aria-label="Default select example">
                                        @foreach (\App\Models\User::where('role', 'Doctor')->get() as $doctor)
                                            <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="splt">Département : <span class="text-danger">*</span></label>
                                    <select
                                        class="form-select form-select-lg border-primary @error('disease')is-invalid
                
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Motif : <span class="text-danger">*</span></label>
                                    <select name="motif" id=""
                                        class="form-select form-select-lg border-primary @error('motif')is-invalid @enderror"
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
                                <div class="col-md-6 ">
                                    <label for="floatingInput">Date rendez-vous <span
                                        class="text-danger">*</span></label>
                                        <input type="datetime-local"
                                            class="form-control form-control-lg border-primary  @error('time')is-invalid
                    
                                          @enderror"
                                            id="time" placeholder="Date rendez-vous " name="time">
                                    @error('time')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-outline-primary btn-lg w-25">Enregister</button>
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
