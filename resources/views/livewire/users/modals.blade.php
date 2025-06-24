<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear un usuario</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group mb-3">
                        <label for="name">Nombre</label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nombre">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Correo electronico</label>
                        <input wire:model="email" type="email" class="form-control" id="email" placeholder="Correo electronico">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-password-toggle mb-3">
                        <label class="form-label" for="basic-default-password32">Contraseña</label>
                        <div class="input-group input-group-merge">
                            <input wire:model="contrasena" type="password" placeholder="Contraseña" class="form-control"  id="basic-default-password32" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password" />
                          @error('contrasena') <span class="error text-danger">{{ $message }}</span> @enderror
                          <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                      </div>
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
            <h5 class="modal-title" id="updateModalLabel">Actualizar usuario</h5>
            <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
             <input type="hidden" wire:model="selected_id">
             <div class="form-group mb-3">
                <label for="name">Nombre</label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nombre">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Correo electronico</label>
                <input wire:model="email" type="email" class="form-control" id="email" placeholder="Correo electronico">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-password-toggle mb-3">
                <label class="form-label" for="basic-default-password32">Nueva contraseña</label>
                <div class="input-group input-group-merge">
                    <input wire:model="contrasena" type="password" placeholder="Contraseña" class="form-control"  id="basic-default-password32" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="basic-default-password"  autocomplete="off"/>
                    @error('contrasena') <span class="error text-danger">{{ $message }}</span> @enderror
                    <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="bx bx-hide"></i></span>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" wire:click.prevent="update()" class="btn btn-primary">Actualizar</button>
    </div>
</div>
</div>
</div>
