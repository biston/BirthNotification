<template>
  <div class="card abi-border">
      <div class="card-header bg-abi text-white text-center font-weight-bold">LISTE DES EMPLOYES</div>
        <div class="card-body mt-4 mx-4">
              <div class="d-flex justify-content-between">
                <input class="form-control" id="search" type="text" placeholder="Rechercher..." style="width:350px;border-radius: 50px">
                <a href=""><i class="fa fa-plus-circle fa-3x text-dark" aria-hidden="true"></i>
              </a>
            </div>

              <table class="table table-bordered mt-2" id="employes-table">
                      <thead class=" bg-dark text-white">
                        <tr>
                          <th >Matricule</th>
                          <th >Civilite</th>
                          <th >Nom</th>
                          <th >Prenoms</th>
                          <th >Email</th>
                          <th class="td-130">Date Naissance</th>
                          <th  class="td-lg">Statut</th>
                          <th class="td-130">Actions</th>
                        </tr>
                      </thead>
                      <tbody  v-for="employe in employes" :key="employe.id">

                                <tr>
                                  <td>{{ employe.matricule }}</td>
                                  <td>{{ employe.civilite }}</td>
                                  <td>{{ employe.nom }}</td>
                                  <td>{{ employe.prenoms }}</td>
                                  <td>{{ employe.email }}</td>
                                  <td class="td-130">{{ employe.fr_birth_date }}</td>
                                  <td class="td-lg" >
                                    <i class="fa fa-check-circle text-success fa-lg" aria-hidden="true" v-if="employe.activer_envoi"></i>
                                    <i class="fa fa-times text-danger fa-lg" aria-hidden="true" v-else></i>

                                  </td>
                                  <td class="td-130">
                                      <a><i class="fa fa-eye fa-lg mr-3 text-success" aria-hidden="true"></i></a>
                                      <a><i class="fa fa-pencil-square-o text-primary fa-lg mr-3" aria-hidden="true"><i/></a>
                                      <a><i class="fa fa-trash-o text-danger fa-lg" aria-hidden="true"></i> </a>
                                  </td>
                                </tr>
                           </tbody>
                    </table>



        </div>
  </div>
</template>

<script>


export default {
    props:['employes'],
    data() {
        return {

        }
    },
}

</script>
