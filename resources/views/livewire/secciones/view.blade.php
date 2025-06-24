@section('title', __('Secciones'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="d-flex justify-content-start align-items-center">
							<img src="{{ asset('static/images/maestro.gif') }}" width="50" height="50">
							<h4 class="mt-4">Listado de secciones</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="w-25 input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>

							<input type="text" wire:model='keyWord' class="form-control" placeholder="Buscar sección..." aria-label="Search..." aria-describedby="basic-addon-search31" name="search" id="search"/>
						</div>
						<div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="bi-plus-lg"></i>Agregar sección +
						</div>
					</div>
				</div>
				
				<div class="card-body">
				@include('livewire.secciones.modals')
				<div class="table-responsive">
					<table class="table table-stripeed table-sm">
						<thead class="thead">
							<tr> 
								<th>Nombre</th>
								<th>Maximo de estudiantes</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse($secciones as $row)
							<tr> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->num_estudiantes }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Acciones
										</a>
										<ul class="dropdown-menu">
											<li><a href="{{ route('seccion-gestion',['id'=> $row->id]) }}" class="dropdown-item"><i class='bx bx-wrench'></i> Gestionar estudiantes</a></li>
										</ul>
									</div>								
								</td>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No se encontraron datos.</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $secciones->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>