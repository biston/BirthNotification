@extends('layouts.app')

@section('content')
<div class="container2">


    <div class="row">
        <div class="col-md-9">
            <div class="card abi-border">
                <div class="card-header bg-abi text-white text-center font-weight-bold">NOS PROCHAINS ANNIVERSAIRES</div>
                  <div class="card-body m-4 bg-light">
                    <div class="row">
                        @foreach ($employes as $employe)
                        <a href="{{ route('employes.show',$employe) }}">
                        <div class="col-md-3 pb-4">
                            <div class="bg-secondary border border-dark">
                            <div class="p-3 d-flex justify-content-center">
                                <img src="{{ asset('img/').'/'.$employe->photo }}" class="rounded-circle border border-dark" width="150" height="150">
                            </div>
                            <div class="d-flex justify-content-center text-uppercase text-white font-weight-bold">
                              <span  class="mr-2">{{ $employe->prenoms }}</span>  <span>{{ $employe->nom }}</span>
                            </div>

                            @if ($employe->left_days===0)
                                <div class="d-flex justify-content-center bg-warning text-dark font-weight-bold p-2 m-2">
                                    <span  class="mr-2">Joyeux Anniversaire</span>
                                </div>
                            @elseif($employe->left_days<5)
                               <div class="d-flex justify-content-center bg-primary  text-white font-weight-bold p-2 m-2">
                                    <span  class="mr-2">Dans {{ $employe->left_days}} jour(s)</span>
                                </div>
                            @else
                                <div class="d-flex justify-content-center bg-white text-primary font-weight-bold p-2 m-2">
                                    <span  class="mr-2">Dans {{ $employe->left_days}} jour(s)</span>
                                </div>
                            @endif
                          </div>
                        </a>
                       </div>
                       @endforeach
                      </div>
                 </div>
            </div>

        </div>
        <div class="col-md-3">
                <calendar></calendar>

        </div>
    </div>
</div>
@endsection
@push('extra-css')
<style>
.container2{
    margin: 0 auto;
    width: 90%;
}
</style>
@endpush
