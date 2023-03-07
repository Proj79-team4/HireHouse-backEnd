@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <form method="POST" action="{{ route('admin.apartments.update', $apartment->id) }}" class="row g-3 needs-validation " novalidate
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            {{-- Titolo --}}
            <div class="col-md-6">
                <label for="inputTitle" class="form-label ">Nome Immobile</label>
                <input type="text" class="form-control @error(' title') is-invalid @enderror" id="inputTitle"
                    name="title" value="{{ old('title') ? old('title') : $apartment->title }}" required minlength="8">

                    <div class="invalid-feedback">
                        Il campo è obbligatorio e deve avere almeno 8 caratteri
                      </div>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Immagine --}}
            <div class="col-md-3">
                <label for="cover_img" class="form-label">Immagine appartamento</label>
                <input type="file" class="form-control @error('cover_img') is-invalid @enderror" name="cover_img">

                @error('cover_img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Prezzo --}}
            <div class="col-md-3">
                <label for="inputPrice" class="form-label">Prezzo</label>
                <input type="number" class="form-control @error(' price') is-invalid @enderror" id="inputPrice"
                    name="price" value="{{ old('price') ? old('price') : $apartment->price }}"  required step=".01">
                    <div class="invalid-feedback">
                        Il campo è obbligatorio 
                      </div>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Indirizzo --}}
            <div class="col-12">
                <label for="inputAddress" class="form-label">Indirizzo</label>
                <input type="text" class="form-control @error(' full_address') is-invalid @enderror" id="inputAddress"
                    placeholder="1234 Main St" name="full_address"
                    value="{{ old('full_address') ? old('full_address') : $apartment->full_address }}" required>

                    <div class="invalid-feedback">
                        Il campo è obbligatorio 
                      </div>
                @error('full_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Descrizione --}}
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control @error(' description') is-invalid @enderror" placeholder="Leave a comment here"
                        id="floatingTextarea2" style="height: 100px" name="description">{{ old('description') ? old('description') : $apartment->description }}</textarea>
                    <label for="floatingTextarea2">Descrizione</label>


                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- Numero stanze --}}
            <div class="col-md-3">
                <label for="inputRomms" class="form-label">Numero stanze</label>
                <input type="number" class="form-control @error(' num_rooms') is-invalid @enderror" id="inputRooms"
                    name="num_rooms" value="{{ old('num_rooms') ? old('num_rooms') : $apartment->num_rooms }}">

                @error('num_rooms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Numero bagni --}}
            <div class="col-md-3">
                <label for="inputBathrooms" class="form-label">Numero bagni</label>
                <input type="number" class="form-control @error(' num_bathrooms') is-invalid @enderror" id="inputBathrooms"
                    name="num_bathrooms"
                    value="{{ old('num_bathrooms') ? old('num_bathrooms') : $apartment->num_bathrooms }}">

                @error('num_bathrooms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Numero letti --}}
            <div class="col-md-3">
                <label for="inputBeds" class="form-label">Numero letti</label>
                <input type="number" class="form-control @error(' num_beds') is-invalid @enderror" id="inputBeds"
                    name="num_beds" value="{{ old('num_beds') ? old('num_beds') : $apartment->num_beds }}">

                @error('num_beds')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Metri quadri --}}
            <div class="col-md-3">
                <label for="inputSquareMeters" class="form-label">Metri quadri</label>
                <input type="number" class="form-control @error(' square_meters') is-invalid @enderror"
                    id="inputSquareMeters" name="square_meters"
                    value="{{ old('square_meters') ? old('square_meters') : $apartment->square_meters }}">

                @error('square_meters')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Check-in --}}
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Check-in</label>
                <input type="text" class="form-control @error(' check_in') is-invalid @enderror" id="inputPassword4"
                    placeholder="10:00 am" name="check_in"
                    value="{{ old('check_in') ? old('check_in') : $apartment->check_in }}">

                @error('check_in')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Check-out --}}
            <div class="col-md-3">
                <label for="inputPassword4" class="form-label">Check-out</label>
                <input type="text" class="form-control @error(' check_out') is-invalid @enderror" id="inputPassword4"
                    placeholder="18:00 pm" name="check_out"
                    value="{{ old('check_out') ? old('check_out') : $apartment->check_out }}">

                @error('check_out')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Vuota --}}
            <div class="col-md-6">

            </div>

            {{-- Visibilità --}}
            <div class="col-md-3">
                <div class="form-switch">
                    <input type="hidden" name="visibile" value="0">
                    <input type="checkbox" class="form-check-input" value="1" name="visibile"
                        {{ $apartment->visibile ? 'checked' : '' }}>
                    <label class="form-check-label" for="gridCheck"> Visibilità </label>

                    @error('visibile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">

                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Regole
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                @foreach ($rules as $rule)
                                    <div class="form-check form-check @error('rules') is-invalid @enderror">
                                        {{-- @dd($apartment) --}}
                                        <input class="form-check-input @error('rules') is-invalid @enderror"
                                            type="checkbox" id="tagCheckbox_{{ $loop->index }}"
                                            value="{{ $rule->id }}" name="rules[]"
                                            {{ in_array($rule->id, $apartment->rules()->get()->pluck('id')->toArray()) ? 'checked' : '' }}>

                                        <i class="fa-solid {{ $rule->icon }}"></i>
                                        <label class="form-check-label"
                                            for="tagCheckbox_{{ $loop->index }}">{{ $rule->name }}</label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Servizi
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach ($services as $service)
                                    <div class="form-check form-check @error('services') is-invalid @enderror">

                                        <input class="form-check-input @error('services') is-invalid @enderror"
                                            type="checkbox" id="tagCheckbox2_{{ $loop->index }}"
                                            value="{{ $service->id }}" name="services[]"
                                            {{ in_array($service->id, $apartment->services()->get()->pluck('id')->toArray()) ? 'checked' : '' }}>

                                        <i class="fa-solid {{ $service->icon }}"></i>
                                        <label class="form-check-label"
                                            for="tagCheckbox2_{{ $loop->index }}">{{ $service->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-12">
                <button class="btn btn-primary">Sign in</button>
            </div>

        </form>

    </div>
    <script>
        const forms = document.querySelectorAll('.needs-validation')
    
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
    
        form.classList.add('was-validated')
      }, false)})
    </script>
@endsection
