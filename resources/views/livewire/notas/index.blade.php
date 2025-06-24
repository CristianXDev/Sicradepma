@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Carga de notas</title>

@endsection

@section('content')
<div class="row">
  
    @livewire('notas')

  <div class="content-backdrop fade"></div>
</div>
@endsection


