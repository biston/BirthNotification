@extends('layouts.app')

@section('content')
<div class="container2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card abi-border">
                <div class="card-header bg-abi text-white text-center font-weight-bold">MES HISTORIQUES D'ENVOI</div>
                  <div class="card-body mt-4 mx-4">
                    <div>
                      <form action="{{route('historiques.search')}}" method="post" width="700px">
                          @csrf
                           <div class="d-flex justify-content-start">
                                 <input class="form-control mr-2 @error('motCle') is-invalid @enderror" id="motCle" name="motCle" type="text" placeholder="Rechercher..." style="width:350px;border-radius: 50px">
                                 <button type="submit" class="btn btn-dark btn-block font-weight-bolder mr-3" style="border-radius: 50px ;width: 120px">
                                     <i class="fa fa-search-o" aria-hidden="true"></i>Chercher
                                 </button>
                           </div>
                      </form>
                    </div>
                        <table class="table table-bordered mt-2" id="historiques-table">
                                <thead class=" bg-dark text-white">
                                  <tr>
                                    <th >Date de traitement</th>
                                    <th >Matricule</th>
                                    <th >Nom employé</th>
                                    <th >Prenoms employé</th>
                                    <th class="td-130 text-left">Email</th>
                                    <th  class="td-lg">Statut</th>
                                    <th  class="td-lg">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($historiques as $historique)
                                          <tr>
                                            <td>{{ $historique->date_traitement->format('Y-m-d') }}</td>
                                            <td>{{ $historique->employe->matricule }}</td>
                                            <td>{{ $historique->employe->nom }}</td>
                                            <td>{{ $historique->employe->prenoms }}</td>
                                            <td>{{ $historique->employe->email }}</td>
                                             <td class="td-lg" >@if ($historique->status)
                                              <i class="fa fa-check-circle text-success fa-lg" aria-hidden="true"></i>
                                            @else
                                              <i class="fa fa-times text-danger fa-lg" aria-hidden="true"></i>
                                            @endif
                                           </td>
                                           <td>
                                            <a href="{{ route('historiques.destroy',$historique) }}"  onclick="event.preventDefault();
                                                    if(confirm('Etes vous sur de vouloir supprimer?')){
                                                          document.getElementById('delete-historiques').submit();
                                                          }">
                                              <i class="fa fa-trash-o text-danger fa-lg" aria-hidden="true"></i>
                                              </a>

                                               <form id="delete-historiques" action="{{ route('historiques.destroy',$historique) }}" method="POST" style="display: none;">
                                                   @csrf
                                                   @method('DELETE')
                                               </form>
                                           </td>
                                          </tr>
                                    @empty
                                    <tr>
                                      Aucune données
                                    </tr>
                                    @endforelse

                                </tbody>
                              </table>
                            <div class="d-flex justify-content-center"> {{ $historiques->links() }} </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('extra-css')
<style>
.container2{
    margin: 0 auto;
    width: 80%;
}
</style>
@endpush
