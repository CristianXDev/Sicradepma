@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Gestion de estudiantes</title>

@endsection

@section('content')
<div class="row">
  
    @livewire('certificados')

  <div class="content-backdrop fade"></div>
</div>
@endsection


