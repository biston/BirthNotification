@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card abi-border">
                <div class="card-header bg-abi text-white text-center font-weight-bold">PROFILE EMPLOYE</div>
                  <div class="card-body m-4 bg-light border border-dark">
                    <div>

                      <div class="bg-secondary mb-3 pb-4 border border-primary">
                          <div class="p-3 d-flex justify-content-center">
                              <img src="{{ asset('storage').'/'.$employe->photo }}" class="rounded-circle" width="150" height="150">
                          </div>
                          <div class="d-flex justify-content-center text-uppercase text-white font-weight-bold">
                            <span class="mr-2" >{{ $employe->prenoms }}</span>  <span>{{ $employe->nom }}</span></div>
                      </div>

                      <div>
                        <div class="bg-white  m-4 py-3 px-4 border border-primary">
                              <span><i class="fa fa-birthday-cake fa-2x mr-5" aria-hidden="true"></i></span>
                              <span>Né le  {{ $employe->birth_date->format('l j F Y')  }}</span>
                        </div>
                        <div class="bg-white m-4 py-3 px-4 border border-primary">
                          <span><i class="fa fa-envelope fa-2x mr-5" aria-hidden="true"></i></span>
                          <span>{{ $employe->email }}</span>
                        </div>
                      </div>
                      <hr>
                      <div  class="bg-white  m-4 py-3 px-4 border border-primary">
                        <div class="row mb-0  d-flex justify-content-end">
                             <div class="col-md-4">
                                <a href="#" class="btn btn-dark btn-block font-weight-bolder">Notifier </a>
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

