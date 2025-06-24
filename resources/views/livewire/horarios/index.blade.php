@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Horarios de actividades</title>

@endsection

@section('content')
<div class="row">
  
    @livewire('horarios')

  <div class="content-backdrop fade"></div>
</div>
@endsection


