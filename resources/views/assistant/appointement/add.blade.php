@extends('assistant.templateAss')
@section('title', 'Rendez-vous')
@section('content')
@if (session('success'))
<x-alert :message="session('success')" />
@endif
@if (session('error'))
<x-alert type="danger" :message="session('error')" />
@endif
    <section class="h-100 ">
        <div class="card-body">
            <h2 class="text-uppercase text-center mb-3">Ajouter Rendez-vous</h2>
            <form method="POST" action="{{ route('asPoint.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6 ">

                        <label for="splt">Votre Nom : <span class="text-danger">*</span></label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="name">
                            @foreach (\App\Models\User::where('role', 'Patient')->get('name') as $patient)
                                <option value="{{ $patient->name }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-floating mb-4">
                            <input type="datetime-local"
                                class="form-control form-control-lg @error('time')is-invalid
                            
                        @enderror"
                                id="time" placeholder="Date rendez-vous " name="time">
                            <label for="floatingInput">Date rendez-vous <span class="text-danger">*</span></label>
                        </div>
                        @error('time')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-6 ">
                    <div class="form-floating mb-4">
                        <input type="date" class="form-control form-control-lg" id="floatingInput"
                            placeholder="Date de naissance" name="birth" />
                        <label for="floatingInput">Date de naissance</label>
                    </div>
                </div> --}}
                </div>
                <div class="row ">

                    {{-- <div class="col-md-6 mb-4">
                    <div class="form-floating mb-4">
                        <input type="time" class="form-control form-control-lg @error('hour')is-invalid
                            
                        @enderror" id="floatingInput"
                            placeholder="Heure rendez-vous" name="hour">
                        <label for="floatingInput">Heure rendez-vous <span class="text-danger">*</span></label>
                    </div>
                    @error('hour')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div> --}}
                </div>



                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="splt">Département : <span class="text-danger">*</span></label>
                        <select
                            class="form-select @error('disease')is-invalid
                        
                    @enderror"
                            aria-label="Default select example" name="disease">
                            @foreach (\App\Models\User::where('role', 'Doctor')->get('speciality') as $doctor)
                                <option value="{{$doctor->speciality}}">{{$doctor->speciality}}</option>
                            @endforeach


                        </select>
                        @error('disease')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Docteur : <span class="text-danger">*</span></label>
                        <select name="doctor" id="" class="form-select" aria-label="Default select example">
                            @foreach (\App\Models\User::where('role', 'Doctor')->get() as $doctor)
                                <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Motif : <span class="text-danger">*</span></label>
                        <select name="motif" id=""
                            class="form-select @error('motif')is-invalid
                            
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
                <div class="d-flex justify-content-end pt-3 me-5">
                    <button type="submit" class="btn btn-success btn-lg ms-2">Enregister</button>
                </div>


            </form>
        </div>
    </section>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
   flatpickr("#time", {
    enableTime: true,
    time_24hr: true,
    minTime:"9:00",
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
