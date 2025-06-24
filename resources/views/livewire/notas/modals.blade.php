<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Cargar nota</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>

                    <div class="form-group mb-3">
                        <label for="id_estudiante">Estudiante</label>
                        <select wire:model="id_estudiante" class="form-control" id="id_estudiante">
                            <option value="">Selecciona un estudiante</option>
                            @foreach($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                            @endforeach
                        </select>
                        @error('id_estudiante') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="primer_lapso">Primer lapso</label>
                        <textarea wire:model="primer_lapso" type="text" class="form-control" id="primer_lapso" placeholder="Primer Lapso..." required></textarea><button type="button" wire:click.prevent="geminiPrimerLapso()" class="btn btn-primary mt-3" style="height:40px;"><strong><i class='bx bx-bulb'></i> Mejorar redacción con Gemini IA</strong></button>@error('primer_lapso') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="segundo_lapso">Segundo lapso</label>
                        <textarea wire:model="segundo_lapso" type="text" class="form-control" id="segundo_lapso" placeholder="Segundo Lapso..."></textarea><button type="button" wire:click.prevent="geminiSegundoLapso()" class="btn btn-primary mt-3" style="height:40px;"><strong><i class='bx bx-bulb'></i> Mejorar redacción con Gemini IA</strong></button>@error('segundo_lapso') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tercer_lapso">Tercer lapso</label>
                        <textarea wire:model="tercer_lapso" type="text" class="form-control" id="tercer_lapso" placeholder="Tercer Lapso..."></textarea><button type="button" wire:click.prevent="geminiTercerLapso()" class="btn btn-primary mt-3" style="height:40px;"><strong><i class='bx bx-bulb'></i> Mejorar redacción con Gemini IA</strong></button>@error('tercer_lapso') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
              
                    <div class="form-group mb-3">
                        <label for="nota_final">Nota final</label>
                        <select wire:model="nota_final" class="form-control" id="nota_final">
                             <option value="">Seleccione la califiación</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        @error('nota_final') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Actualizar nota</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                  
                    <div class="form-group mb-3">
                        <label for="id_estudiante">Estudiante</label>
                        <select wire:model="id_estudiante" class="form-control" id="id_estudiante">
                            <option value="">Selecciona un estudiante</option>
                            @foreach($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                            @endforeach
                        </select>
                        @error('id_estudiante') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="primer_lapso">Primer lapso</label>
                        <textarea wire:model="primer_lapso" type="text" class="form-control" id="primer_lapso" placeholder="Primer Lapso..." required></textarea>
                        <button type="button" wire:click.prevent="geminiPrimerLapso()" class="btn btn-primary mt-3" style="height:40px;"><strong><i class='bx bx-bulb'></i> Mejorar redacción con Gemini IA</strong></button>@error('primer_lapso') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="segundo_lapso">Segundo lapso</label>
                        <textarea wire:model="segundo_lapso" type="text" class="form-control" id="segundo_lapso" placeholder="Segundo Lapso..."></textarea>
                        <button type="button" wire:click.prevent="geminiSegundoLapso()" class="btn btn-primary mt-3" style="height:40px;"><strong><i class='bx bx-bulb'></i> Mejorar redacción con Gemini IA</strong></button>@error('segundo_lapso') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tercer_lapso">Tercer lapso</label>
                        <textarea wire:model="tercer_lapso" type="text" class="form-control" id="tercer_lapso" placeholder="Tercer Lapso..."></textarea><button type="button" wire:click.prevent="geminiTercerLapso()" class="btn btn-primary mt-3" style="height:40px;"><strong><i class='bx bx-bulb'></i> Mejorar redacción con Gemini IA</strong></button>@error('tercer_lapso') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
              
                    <div class="form-group mb-3">
                        <label for="nota_final">Nota final</label>
                        <select wire:model="nota_final" class="form-control" id="nota_final">
                            <option value="">Seleccione la califiación</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        @error('nota_final') <span class="error text-danger">{{ $message }}</span> @enderror
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

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Actualizar</button>
            </div>
       </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal2" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar nota</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                
                    <div class="form-group mb-3">
                        <label for="segundo_lapso">Segundo lapso</label>
                        <textarea wire:model="segundo_lapso" type="text" class="form-control" id="segundo_lapso" placeholder="Segundo Lapso..."></textarea><button type="button" wire:click.prevent="geminiSegundoLapso()" class="btn btn-primary mt-3" style="height:40px;"><strong><i class='bx bx-bulb'></i> Mejorar redacción con Gemini IA</strong></button>@error('segundo_lapso') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="updateSegundoLapso()" class="btn btn-primary">Actualizar</button>
            </div>
       </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal3" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar nota</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
               
                    <div class="form-group mb-3">
                        <label for="tercer_lapso">Tercer lapso</label>
                        <textarea wire:model="tercer_lapso" type="text" class="form-control" id="tercer_lapso" placeholder="Tercer Lapso..."></textarea><button type="button" wire:click.prevent="geminiTercerLapso()" class="btn btn-primary mt-3" style="height:40px;"><strong><i class='bx bx-bulb'></i> Mejorar redacción con Gemini IA</strong></button>@error('tercer_lapso') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="updateTercerLapso()" class="btn btn-primary">Actualizar</button>
            </div>
       </div>
    </div>
</div>


<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal4" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar nota</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
               
                    <div class="form-group mb-3">
                        <label for="nota_final">Nota final</label>
                        <select wire:model="nota_final" class="form-control" id="nota_final">
                           <option value="">Seleccione la califiación</option>
                           <option value="A">A</option>
                           <option value="B">B</option>
                           <option value="C">C</option>
                           <option value="D">D</option>
                       </select>
                       @error('nota_final') <span class="error text-danger">{{ $message }}</span> @enderror
                   </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="updateNotaFinal()" class="btn btn-primary">Actualizar</button>
            </div>
       </div>
    </div>
</div>