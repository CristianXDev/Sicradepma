@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Gestion de profesores</title>

@endsection

@section('content')
<div class="row">
  
    @livewire('profesores')

  <div class="content-backdrop fade"></div>
</div>
@endsection


