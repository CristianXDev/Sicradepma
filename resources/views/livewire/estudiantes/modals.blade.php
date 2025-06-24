<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Cargar nuevo estudiante</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                 <div class="form-group mb-3">
                    <label for="estado_id">Estado</label>
                    <select wire:model="estado_id" class="form-control" id="estado_id">
                        <option value="">Seleccione un estado</option>
                        @foreach($estados as $row)
                        <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                        @endforeach
                    </select>
                    @error('estado_id') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nombre">Nombre</label>
                    <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre...">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="apellido">Apellido</label>
                    <input wire:model="apellido" type="text" class="form-control" id="apellido" placeholder="Apellido...">@error('apellido') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="cedula">Cedula / Cedula estudiantil</label>
                    <input wire:model="cedula" type="number" class="form-control" id="cedula" placeholder="Cedula...">@error('cedula') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="grado">Grado</label>
                    <select wire:model="grado" class="form-control" id="grado">
                        <option value="">Seleccione un grado</option>
                        <option value="1er Grado">1er Grado</option>
                        <option value="2do Grado">2do Grado</option>
                        <option value="3er Grado">3er Grado</option>
                        <option value="4to Grado">4to Grado</option>
                        <option value="5to Grado">5to Grado</option>
                        <option value="6to Grado">6to Grado</option>
                    </select>
                    @error('grado') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="periodo">Periodo escolar</label>
                    <select wire:model="periodo" class="form-control" id="periodo">
                        <option value="">Seleccione un año</option>
                        @for ($ano = date('Y'); $ano >= 1959; $ano--)
                        <option value="{{ $ano }}">{{ $ano }}</option>
                        @endfor
                    </select>
                    @error('periodo') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input wire:model="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" placeholder="Fecha Nacimiento">@error('fecha_nacimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" wire:click.prevent="store()" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateModalLabel">Actualizar estudiante</h5>
            <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
               <input type="hidden" wire:model="selected_id">
               <div class="form-group mb-3">
                <label for="estado_id">Estado</label>
                <select wire:model="estado_id" class="form-control" id="estado_id">
                    <option value="">Seleccione un estado</option>
                    @foreach($estados as $row)
                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                    @endforeach
                </select>
                @error('estado_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre...">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="apellido">Apellido</label>
                <input wire:model="apellido" type="text" class="form-control" id="apellido" placeholder="Apellido...">@error('apellido') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="cedula">Cedula / Cedula estudiantil</label>
                <input wire:model="cedula" type="number" class="form-control" id="cedula" placeholder="Cedula...">@error('cedula') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="grado">Grado</label>
                <select wire:model="grado" class="form-control" id="grado">
                    <option value="">Seleccione un grado</option>
                    <option value="1er Grado">1er Grado</option>
                    <option value="2do Grado">2do Grado</option>
                    <option value="3er Grado">3er Grado</option>
                    <option value="4to Grado">4to Grado</option>
                    <option value="5to Grado">5to Grado</option>
                    <option value="6to Grado">6to Grado</option>
                </select>
                @error('grado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="periodo">Periodo escolar</label>
                <select wire:model="periodo" class="form-control" id="periodo">
                    <option value="">Seleccione un año</option>
                    @for ($ano = date('Y'); $ano >= 1959; $ano--)
                    <option value="{{ $ano }}">{{ $ano }}</option>
                    @endfor
                </select>
                @error('periodo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input wire:model="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" placeholder="Fecha Nacimiento">@error('fecha_nacimiento') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="estatus">Estatus</label>
                <select wire:model="estatus" class="form-control" id="estatus">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
                @error('estatus') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
    </div>
</div>
</div>
</div>
