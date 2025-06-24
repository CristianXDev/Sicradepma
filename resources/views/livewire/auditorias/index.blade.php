@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Auditorias del sistema</title>

@endsection

@section('content')
<div class="row">
  
    @livewire('auditorias')

  <div class="content-backdrop fade"></div>
</div>
@endsection


