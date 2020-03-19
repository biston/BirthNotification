@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card abi-border">
                <div class="card-header bg-abi text-white text-center font-weight-bold">{{ isset($employe->id)?'MODIFICATION EMPLOYE':'CREATION EMPLOYE' }}  </div>
                  <div class="card-body mt-4 mx-4">

                    @if (isset($employe->id))
                       <form method="POST" action="{{ route('employes.update',$employe) }}" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('employes.store') }}" enctype="multipart/form-data">
                    @endif

                        @csrf
                        <div class="form-group row">
                            <label for="matricule" class="col-md-3 col-form-label text-md-left font-weight-bold">Matricule</label>

                            <div class="col-md-5">
                                <input id="matricule" type="text" class="form-control @error('matricule') is-invalid @enderror" name="matricule" value="{{ old('matricule',$employe->matricule) }}" autofocus>

                                @error('matricule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="civilite" class="col-md-3 col-form-label text-md-left font-weight-bold">Civilite</label>

                            <div class="col-md-5">
                                <select name="civilite" id="civilite" class="form-control  @error('civilite') is-invalid @enderror" autofocus>
                                    <option value="M."    {{ old('civilite',$employe->civilite) == 'M.' ? 'selected' : '' }}>Monsieur</option>
                                    <option value="Mme."  {{ old('civilite',$employe->civilite) == 'Mme.' ? 'selected' : '' }}>Madame</option>
                                </select>

                                @error('civilite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-md-3 col-form-label text-md-left font-weight-bold">Nom</label>

                            <div class="col-md-5">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom',$employe->nom) }}" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenoms" class="col-md-3 col-form-label text-md-left font-weight-bold">Prenoms</label>

                            <div class="col-md-9">
                                <input id="prenoms" type="text" class="form-control @error('prenoms') is-invalid @enderror" name="prenoms" value="{{ old('prenoms',$employe->prenoms)}}" >

                                @error('prenoms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-left font-weight-bold">Adresse mail</label>

                                <div class="col-md-9">

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$employe->email)}}" @isset($employe->id)) readonly  @endisset >

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                         </div>
                        <div class="form-group row">
                            <label for="birth_date" class="col-md-3 col-form-label text-md-left font-weight-bold">Date de naissance</label>

                            <div class="col-md-5">
                                <input id="birth_date" type="text" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date',$employe->birth_date) }}">

                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-md-3 col-form-label text-md-left font-weight-bold">Photo</label>

                            <div class="col-md-9">
                                <input id="photo" type="file" class="@error('photo') is-invalid @enderror" name="photo" >
                            </div>

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-group row">
                            <label  class="col-md-3 col-form-label text-md-left font-weight-bold">Statut d'envoi</label>
                            <div class="col-md-4">
                                <div class="form-check pt-1">
                                    <input class="form-check-input" type="checkbox" name="activer_envoi" id="activer_envoi" {{(old('activer_envoi',$employe->activer_envoi)) ? 'checked' : '' }}>

                                    <label class="form-check-label" for="activer_envoi">
                                        Activé
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-5">

                        <div class="form-group row mb-0  d-flex justify-content-center">
                            <div class="col-md-3">
                                <a class="btn btn-primary btn-block font-weight-bolder" href="{{ route('employes.index') }}">
                                  <i class="fa fa-undo" aria-hidden="true"></i> RETOUR
                                </a>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-dark btn-block font-weight-bolder">
                                   <i class="fa fa-floppy-o" aria-hidden="true"></i> VALIDER
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('extra-js')

   <script type="text/javascript">

      $('#birth_date').datepicker({
        dateFormat: 'yy-mm-dd'
      });

   </script>
@endpush
