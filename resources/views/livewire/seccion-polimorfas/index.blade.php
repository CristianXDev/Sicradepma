@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Gestion de estudiantes en la seccion</title>

@endsection

@section('content')
<div class="row">
  
    @livewire('seccion-polimorfas',['id' => Route::current()->parameter('id')])

  <div class="content-backdrop fade"></div>
</div>
@endsection





