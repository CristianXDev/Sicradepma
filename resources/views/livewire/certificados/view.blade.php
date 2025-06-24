@section('title', __('Estudiantes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="d-flex justify-content-start align-items-center">
							<img src="{{ asset('static/images/graduacion.gif') }}" width="50" height="50">
							<h4 class="mt-4">Certificación de 6to Grado</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="w-50 input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>

							<input type="text" wire:model='keyWord' class="form-control" placeholder="Buscar estudiante..." aria-label="Search..." aria-describedby="basic-addon-search31" name="search" id="search"/>
						</div>
					</div>
				</div>
				
				<div class="card-body">

					<div class="table-responsive">
						<table class="table table-stripeed table-sm">
							<thead class="thead">
								<tr> 
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Cedula</th>
									<th>Grado</th>
									<th>Periodo</th>
									<th>Estatus</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@forelse($estudiantes as $row)
								<tr>
									<td>{{ $row->nombre }}</td>
									<td>{{ $row->apellido }}</td>
									<td>{{ $row->cedula }}</td>
									<td>{{ $row->grado }}</td>
									<td>{{ $row->periodo }}</td>
									<td>
										@if($row->estatus=='activo')
										<span class="badge bg-label-primary me-1">Activo</span>
										@else
										<span class="badge bg-label-warning me-1">Inactivo</span>
										@endif
									</td>
									<td width="90">
										<div class="dropdown">
											<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												Acciones
											</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="{{ route('certificado-download',['id' => $row->id]) }}"><i class='bx bx-download'></i> Descargar certificado</a></li> 
											</ul>
										</div>								
									</td>
								</tr>
								@empty
								<tr>
									<td class="text-center" colspan="100%">No se encontraron datos.</td>
								</tr>
								@endforelse
							</tbody>
						</table>						
						<div class="float-end">{{ $estudiantes->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>