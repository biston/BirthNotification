@extends('layouts.app')

@section('content')
<div class="container2">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <employes></employes>

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

   });
</script>
@endpush
