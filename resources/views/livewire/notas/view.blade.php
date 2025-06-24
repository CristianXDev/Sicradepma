@section('title', __('Notas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="d-flex justify-content-start align-items-center">
							<img src="{{ asset('static/images/notas.gif') }}" width="50" height="50">
							<h4 class="mt-4">Listado de notas cargadas</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="w-25 input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>

							<input type="text" wire:model='keyWord' class="form-control" placeholder="Buscar notas..." aria-label="Search..." aria-describedby="basic-addon-search31" name="search" id="search"/>
						</div>
						<div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
							<i class="bi-plus-lg"></i>Agregar nota +
						</div>
					</div>
				</div>
				
				<div class="card-body">

					@include('livewire.notas.modals')

					<div class="table-responsive">
						<table class="table table-stripeed table-sm">
							<thead class="thead">
								<tr> 
									<th>Estudiante</th>
									<th>Primer Lapso</th>
									<th>Segundo Lapso</th>
									<th>Tercer Lapso</th>
									<th>Nota Final</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@forelse($notas as $row)
								<tr>
									<td>{{ $row->estudiante->nombre }} {{ $row->estudiante->apellido }}</td>
									<td>{{ Str::limit($row->primer_lapso, 50, '...') }}</td>
									<td> 
										@if($row->segundo_lapso == null)

										<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateDataModal2" wire:click="edit({{$row->id}})"><i class='bx bx-plus'></i></a>  

										@else

										{{ Str::limit($row->segundo_lapso, 50, '...') }}

										@endif
									</td>
									<td>
										@if($row->tercer_lapso == null)

										<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateDataModal3" wire:click="edit({{$row->id}})"><i class='bx bx-plus'></i></a>  

										@else

										{{ Str::limit($row->tercer_lapso, 50, '...') }}

										@endif
									</td>
									<td>
										@if($row->nota_final == null)

										<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateDataModal4" wire:click="edit({{$row->id}})"><i class='bx bx-plus'></i></a>  

										@else

										{{ $row->nota_final }}

										@endif
									</td>
									<td width="90">
										<div class="dropdown">
											<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
												Acciones
											</a>
											<ul class="dropdown-menu">
												<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class='bx bx-pencil'></i> Editar </a></li>
											</ul>
										</div>								
									</td>
								</tr>
								@empty
								<tr>
									<td class="text-center" colspan="100%">No se encontraron datos.</td>							</tr>
									@endforelse
								</tbody>
							</table>						
							<div class="float-end">{{ $notas->links() }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>