@extends('layouts.app')

@section('content')
<div class="container2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card abi-border">
                <div class="card-header bg-abi text-white text-center font-weight-bold">MES HISTORIQUES D'ENVOI</div>
                  <div class="card-body mt-4 mx-4">
                       <div class="d-flex justify-content-between">
                          <input class="form-control" id="search" type="text" placeholder="Rechercher..." style="width:350px;border-radius: 50px">
                      </div>
                        <table class="table table-bordered" id="historiques-table">
                                <thead style="background-color:#BBB">
                                  <tr>
                                    <th >Date de traitement</th>
                                    <th >Matricule</th>
                                    <th >Nom employé</th>
                                    <th >Prenoms employé</th>
                                    <th class="td-130">Email</th>
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
                                            <a href="{{ route('historiques.destroy',$historique) }}"  onclick="event.preventDefault();                                    document.getElementById('delete-historiques').submit();">
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

@push('extra-js')
 <script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#historiques-table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
@endpush
