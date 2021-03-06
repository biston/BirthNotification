@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card abi-border">
                <div class="card-header bg-abi text-white text-center font-weight-bold">PROFILE EMPLOYE</div>
                  <div class="card-body m-4 bg-light border border-dark">
                    <div>
                      @if (session('status'))
                        <div class="alert alert-success font-weight-bold text-center" role="alert">
                            {{ session('status') }}
                        </div>
                       @endif
                      <div class="bg-secondary mb-3 pb-4 border border-primary">
                          <div class="p-3 d-flex justify-content-center">
                              <img src="{{ asset('img').'/'.$employe->photo }}" class="rounded-circle" width="150" height="150">
                          </div>
                          <div class="text-uppercase text-white font-weight-bold text-center">
                            <span>{{ $employe->prenoms }}</span>  <span>{{ $employe->nom }}</span></div>
                      </div>

                      <div>
                        <div class="bg-white  m-4 py-3 px-4 border border-primary">
                              <span><i class="fa fa-birthday-cake fa-2x mr-5" aria-hidden="true"></i></span>
                              <span>Né le  {{ $employe->fr_birth_date }}</span>
                        </div>
                        <div class="bg-white m-4 py-3 px-4 border border-primary">
                          <span><i class="fa fa-envelope fa-2x mr-5" aria-hidden="true"></i></span>
                          <span>{{ $employe->email }}</span>
                        </div>
                      </div>
                      <hr>
                      <div  class="bg-white  m-4 py-3 px-4 border border-primary">
                        <div class="row mb-0  d-flex justify-content-center">
                             <div class="col-md-5">
                                <a href="{{ route('employes.index') }}" class="btn btn-primary btn-block font-weight-bolder">
                                  <i class="fa fa-undo mr-1" aria-hidden="true"></i>RETOUR </a>
                             </div>
                             <div class="col-md-5">
                                <a href="{{ route('employes.notify',$employe) }}" class="btn btn-dark btn-block font-weight-bolder">
                                  <i class="fa fa-envelope-o mr-1" aria-hidden="true"></i>NOTIFIER </a>
                             </div>
                        </div>

                      </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

