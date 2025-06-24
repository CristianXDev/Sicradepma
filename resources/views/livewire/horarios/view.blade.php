@section('title', __('Horarios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="d-flex justify-content-start align-items-center">
							<img src="{{ asset('static/images/reloj.gif') }}" width="50" height="50">
							<h4 class="mt-4">Horario de actividades</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
							<i class="bi-plus-lg"></i>Agregar actividad +
						</div>
					</div>
				</div>
				
				<div class="card-body">
				@include('livewire.horarios.modals')
				<div class="table-responsive">
					<table class="table table-stripeed table-sm">
						<thead class="thead">
							<tr> 
								<th>Lunes</th>
								<th>Martes</th>
								<th>Miercoles</th>
								<th>Jueves</th>
								<th>Viernes</th>
							</tr>
						</thead>
						<tbody>
							@if($horarios)
							<tr>
								<td>
									@if($lunes)

									<strong>Sección: </strong><span>{{ $lunes->seccione->nombre }}</span><br>
									<strong>Profesor: </strong><span>{{ $lunes->profesore->nombre }} {{ $lunes->profesore->apellido }}</span><br>
									<strong>Actividad: </strong><span>{{ $lunes->actividad }}</span><br>
									<strong>Hora: </strong><span>{{ $lunes->hora_ini }} {{ $lunes->hora_fin }}</span>

									<div class="d-flex my-3">
										<button class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#updateDataModal" wire:click="edit({{$lunes->id}})"><i class='bx bx-message-square-edit'></i></button>
										<button class="btn btn-danger mx-1" wire:click="destroy({{$lunes->id}})"><i class="bx bx-x"></i></button>
									</div>

									@else

									<span class="text-muted">No hay actividad</span>

									@endif
								</td>
								<td>
									@if($martes)

									<strong>Sección: </strong><span>{{ $martes->seccione->nombre }}</span><br>
									<strong>Profesor: </strong><span>{{ $martes->profesore->nombre }} {{ $martes->profesore->apellido }}</span><br>
									<strong>Actividad: </strong><span>{{ $martes->actividad }}</span><br>
									<strong>Hora: </strong><span>{{ $martes->hora_ini }} {{ $martes->hora_fin }}</span>

									<div class="d-flex my-3">
										<button class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#updateDataModal" wire:click="edit({{$martes->id}})"><i class='bx bx-message-square-edit'></i></button>
										<button class="btn btn-danger mx-1" wire:click="destroy({{$martes->id}})"><i class="bx bx-x"></i></button>
									</div>

									@else

									<span class="text-muted">No hay actividad</span>

									@endif
								</td>
								<td>
									@if($miercoles)

									<strong>Sección: </strong><span>{{ $miercoles->seccione->nombre }}</span><br>
									<strong>Profesor: </strong><span>{{ $miercoles->profesore->nombre }} {{ $miercoles->profesore->apellido }}</span><br>
									<strong>Actividad: </strong><span>{{ $miercoles->actividad }}</span><br>
									<strong>Hora: </strong><span>{{ $miercoles->hora_ini }} {{ $miercoles->hora_fin }}</span>

									<div class="d-flex my-3">
										<button class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#updateDataModal" wire:click="edit({{$miercoles->id}})"><i class='bx bx-message-square-edit'></i></button>
										<button class="btn btn-danger mx-1" wire:click="destroy({{$miercoles->id}})"><i class="bx bx-x"></i></button>
									</div>

									@else

									<span class="text-muted">No hay actividad</span>

									@endif
								</td>
								<td>
									@if($jueves)

									<strong>Sección: </strong><span>{{ $jueves->seccione->nombre }}</span><br>
									<strong>Profesor: </strong><span>{{ $jueves->profesore->nombre }} {{ $jueves->profesore->apellido }}</span><br>
									<strong>Actividad: </strong><span>{{ $jueves->actividad }}</span><br>
									<strong>Hora: </strong><span>{{ $jueves->hora_ini }} {{ $jueves->hora_fin }}</span>

									<div class="d-flex my-3">
										<button class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#updateDataModal" wire:click="edit({{$jueves->id}})"><i class='bx bx-message-square-edit'></i></button>
										<button class="btn btn-danger mx-1" wire:click="destroy({{$jueves->id}})"><i class="bx bx-x"></i></button>
									</div>

									@else

									<span class="text-muted">No hay actividad</span>

									@endif
								</td>
								<td>
									@if($viernes)

									<strong>Sección: </strong><span>{{ $viernes->seccione->nombre }}</span><br>
									<strong>Profesor: </strong><span>{{ $viernes->profesore->nombre }} {{ $viernes->profesore->apellido }}</span><br>
									<strong>Actividad: </strong><span>{{ $martes->actividad }}</span><br>
									<strong>Hora: </strong><span>{{ $viernes->hora_ini }} {{ $viernes->hora_fin }}</span>

									<div class="d-flex my-3">
										<button class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#updateDataModal" wire:click="edit({{$viernes->id}})"><i class='bx bx-message-square-edit'></i></button>
										<button class="btn btn-danger mx-1" wire:click="destroy({{$viernes->id}})"><i class="bx bx-x"></i></button>
									</div>

									@else

									<span class="text-muted">No hay actividad</span>

									@endif
								</td>
							</tr>

							@else

							<tr>
								<td class="text-center" colspan="100%">No se encontraron datos.</td>
							</tr>
							@endif
						</tbody>
					</table>						
					<div class="float-end">{{ $horarios->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>