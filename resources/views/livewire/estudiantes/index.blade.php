@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Gestion de estudiantes</title>

@endsection

@section('content')
<div class="row">
  
    @livewire('estudiantes')

  <div class="content-backdrop fade"></div>
</div>
@endsection


