@section('title', __('Auditorias'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="d-flex justify-content-start align-items-center">
							<img src="{{ asset('static/images/ojo-2.gif') }}" width="50" height="50">
							<h4 class="mt-3">Listado de acciones</h4>
						</div>

						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="w-50 input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>

							<input type="text" wire:model='keyWord' class="form-control" placeholder="Buscar acción..." aria-label="Search..." aria-describedby="basic-addon-search31" name="search" id="search"/>
						</div>
					</div>
				</div>
				
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-stripeed table-sm">
						<thead class="thead">
							<tr> 
								<th>Usuario</th>
								<th>Descripcion</th>
								<th>Fecha</th>
							</tr>
						</thead>
						<tbody>
							@forelse($auditorias as $row)
							<tr>
								<td>{{ $row->user->name }}</td>
								<td>{{ $row->descripcion }}</td>
								<td>{{ $row->created_at }}</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No se encontraron datos.</td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $auditorias->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>