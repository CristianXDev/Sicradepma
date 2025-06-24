<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nueva actividad</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                
                    <div class="form-group mb-3">
                        <label for="id_seccion">Secciones</label>
                        <select wire:model="id_seccion" class="form-control" id="id_seccion">
                            <option value="">Selecciona una sección</option>
                            @foreach($secciones as $seccion)
                            <option value="{{ $seccion->id }}">{{ $seccion->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_seccion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="id_profesor">Profesores</label>
                        <select wire:model="id_profesor" class="form-control" id="id_profesor">
                            <option value="">Selecciona un profesor</option>
                            @foreach($profesores as $profesor)
                            <option value="{{ $profesor->id }}">{{ $profesor->nombre }} {{ $profesor->apellido }}</option>
                            @endforeach
                        </select>
                        @error('id_profesor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="dia_semana">Día de la semana</label>
                        <select wire:model="dia_semana" class="form-control" id="dia_semana">
                            <option value="">Selecciona un día</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                        </select>
                        @error('dia_semana') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="actividad">Descripción de la actividad</label>
                        <textarea wire:model="actividad" type="text" class="form-control" id="actividad" placeholder="Descripción de la actividad..."></textarea>@error('actividad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="hora_ini">Hora de inicio</label>
                        <input wire:model="hora_ini" type="time" class="form-control" id="hora_ini" placeholder="Hora Ini">@error('hora_ini') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="hora_fin">Hora de fin</label>
                        <input wire:model="hora_fin" type="time" class="form-control" id="hora_fin" placeholder="Hora Fin">@error('hora_fin') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar actividad</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">

                       <div class="form-group mb-3">
                        <label for="id_seccion">Secciones</label>
                        <select wire:model="id_seccion" class="form-control" id="id_seccion">
                            <option value="">Selecciona una sección</option>
                            @foreach($secciones as $seccion)
                            <option value="{{ $seccion->id }}">{{ $seccion->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_seccion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="id_profesor">Profesores</label>
                        <select wire:model="id_profesor" class="form-control" id="id_profesor">
                            <option value="">Selecciona un profesor</option>
                            @foreach($profesores as $profesor)
                            <option value="{{ $profesor->id }}">{{ $profesor->nombre }} {{ $profesor->apellido }}</option>
                            @endforeach
                        </select>
                        @error('id_profesor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="dia_semana">Día de la semana</label>
                        <select wire:model="dia_semana" class="form-control" id="dia_semana" disabled>
                            <option value="">Selecciona un día</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                        </select>
                        @error('dia_semana') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="actividad">Descripción de la actividad</label>
                        <textarea wire:model="actividad" type="text" class="form-control" id="actividad" placeholder="Descripción de la actividad..."></textarea>@error('actividad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="hora_ini">Hora de inicio</label>
                        <input wire:model="hora_ini" type="time" class="form-control" id="hora_ini" placeholder="Hora Ini">@error('hora_ini') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="hora_fin">Hora de fin</label>
                        <input wire:model="hora_fin" type="time" class="form-control" id="hora_fin" placeholder="Hora Fin">@error('hora_fin') <span class="error text-danger">{{ $message }}</span> @enderror
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
