@extends('layouts.app')

@section('content')
<div class="container2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card abi-border">
                <div class="card-header bg-abi text-white text-center font-weight-bold">LISTE DES EMPLOYES</div>
                  <div class="card-body mt-4 mx-4">
                       <div class="d-flex justify-content-between">
                          <input class="form-control" id="search" type="text" placeholder="Rechercher..." style="width:350px;border-radius: 50px">
                         <a href="{{ route('employes.create') }}"><i class="fa fa-plus-circle fa-3x text-dark" aria-hidden="true"></i>
                       </a>
                      </div>
                        <table class="table table-bordered" id="employes-table">
                                <thead style="background-color:#BBB">
                                  <tr>
                                    <th >Matricule</th>
                                    <th >Nom</th>
                                    <th >Prenoms</th>
                                    <th >Email</th>
                                    <th class="td-130">Date Naissance</th>
                                    <th  class="td-lg">Statut</th>
                                    <th class="td-130">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employes as $employe)
                                          <tr>
                                            <td>{{ $employe->matricule }}</td>
                                            <td>{{ $employe->nom }}</td>
                                            <td>{{ $employe->prenoms }}</td>
                                            <td>{{ $employe->email }}</td>
                                            <td class="td-130">{{ $employe->birth_date->format('Y-m-d') }}</td>
                                            <td class="td-lg" >@if ($employe->activer_envoi)
                                              <i class="fa fa-check-circle text-success fa-lg" aria-hidden="true"></i>
                                            @else
                                              <i class="fa fa-times text-danger fa-lg" aria-hidden="true"></i>
                                            @endif
                                           </td>
                                            <td class="td-130">
                                                <a href="{{ route('employes.show',$employe) }}"><i class="fa fa-eye fa-lg mr-3 text-success" aria-hidden="true"></i></a>
                                                <a href="{{ route('employes.edit',$employe) }}"><i class="fa fa-pencil-square-o text-primary fa-lg mr-3" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('employes.destroy',$employe) }}"  onclick="event.preventDefault();                                    document.getElementById('delete-employe').submit();">
                                                 <i class="fa fa-trash-o text-danger fa-lg" aria-hidden="true"></i>
                                                 </a>

                                                  <form id="delete-employe" action="{{ route('employes.destroy',$employe) }}" method="POST" style="display: none;">
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
                            <div class="d-flex justify-content-center"> {{ $employes->links() }} </div>
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
    width: 85%;
}
</style>
@endpush

@push('extra-js')
 <script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#employes-table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
@endpush
