@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Gestion de secciones</title>

@endsection

@section('content')
<div class="row">
  
    @livewire('secciones')

  <div class="content-backdrop fade"></div>
</div>
@endsection


