@extends('sources-dashboard')

@section('title')

<title>SICRADEPMA - Respaldar base de datos</title>

@endsection

@section('content')
<div class="row">

  <!--BACKUP-->
  <div class="col-md-5">
    <div class="card">
      <div class="card-body text-center">
        <h3>Realizar Respaldo</h3>
        <!--IMG-->
        <img src="{{ asset('static/images/servidor.gif') }}" class="img-fluid w-75 p-0">
        @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('backup-create') }}" method="GET" class="mt-3">
          <button type="submit" class="btn btn-primary">Crear Respaldo</button>
        </form>
      </div>
    </div>
  </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection


