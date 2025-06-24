@section('title', __('Users'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="d-flex justify-content-start align-items-center">
							<img src="{{ asset('static/images/usuario.gif') }}" width="50" height="50">
							<h4 class="mt-3">Listado de usuarios</h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div class="w-25 input-group input-group-merge">
							<span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>

							<input type="text" wire:model='keyWord' class="form-control" placeholder="Buscar usuario..." aria-label="Search..." aria-describedby="basic-addon-search31" name="search" id="search"/>
						</div>
						<div class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createDataModal">
							<i class="bi-plus-lg"></i>Agregar usuario +
						</div>
					</div>
				</div>
				
				<div class="card-body">
				@include('livewire.users.modals')
				<div class="table-responsive">
					<table class="table table-stripeed table-sm">
						<thead class="thead">
							<tr> 
								<th>Foto</th>
								<th>Nombre</th>
								<th>Correo electronico</th>
								<th>Rol</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse($users as $row)
							<tr>
								<td><img src="{{ $row->image ? Storage::url($row->image) : asset('static/images/user.png') }}" class="rounded-circle" width="40" height="40"></td>
								<td>{{ $row->name }}</td>
								<td>{{ $row->email }}</td>
								<td>
									@if($row->rol == 1)
									<span class="badge bg-label-secondary me-1">Administrador</span>
									@else
									<span class="badge bg-label-primary me-1">Secretaria</span>
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
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $users->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>