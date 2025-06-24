<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Estudiante;
use App\Models\Estado;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;

class Estudiantes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $estado_id, $nombre, $apellido, $cedula, $grado, $periodo, $fecha_nacimiento, $estatus, $estadoss;

    public function render(){


	//Listaoo de estados
    $this->estados = Estado::all();

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.estudiantes.view', [
            'estudiantes' => Estudiante::latest()
						->orWhere('estado_id', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido', 'LIKE', $keyWord)
						->orWhere('cedula', 'LIKE', $keyWord)
						->orWhere('grado', 'LIKE', $keyWord)
						->orWhere('periodo', 'LIKE', $keyWord)
						->orWhere('fecha_nacimiento', 'LIKE', $keyWord)
						->orWhere('estatus', 'LIKE', $keyWord)
						->paginate(10),
						
			'estados' => $this->estados,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->estado_id = null;
		$this->nombre = null;
		$this->apellido = null;
		$this->cedula = null;
		$this->grado = null;
		$this->periodo = null;
		$this->fecha_nacimiento = null;
		$this->estatus = null;
    }

    public function store()
    {
        $this->validate([
		'estado_id' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'grado' => 'required',
		'periodo' => 'required',
		'fecha_nacimiento' => 'required',
        ]);

        Estudiante::create([ 
			'estado_id' => $this-> estado_id,
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'cedula' => $this-> cedula,
			'grado' => $this-> grado,
			'periodo' => $this-> periodo,
			'fecha_nacimiento' => $this-> fecha_nacimiento,
        ]);


        //Auditoria
        Auditoria::create([ 
        	'usuario_id' => Auth::user()->id,
        	'descripcion' => 'El usuario ha registrado al estudiante: ' . $this->nombre,
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Estudiante Successfully created.');
    }

    public function edit($id)
    {
        $record = Estudiante::findOrFail($id);
        $this->selected_id = $id; 
		$this->estado_id = $record-> estado_id;
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->cedula = $record-> cedula;
		$this->grado = $record-> grado;
		$this->periodo = $record-> periodo;
		$this->fecha_nacimiento = $record-> fecha_nacimiento;
		$this->estatus = $record-> estatus;
    }

    public function update()
    {
        $this->validate([
		'estado_id' => 'required',
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'grado' => 'required',
		'periodo' => 'required',
		'fecha_nacimiento' => 'required',
		'estatus' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Estudiante::find($this->selected_id);
            $record->update([ 
			'estado_id' => $this-> estado_id,
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'cedula' => $this-> cedula,
			'grado' => $this-> grado,
			'periodo' => $this-> periodo,
			'fecha_nacimiento' => $this-> fecha_nacimiento,
			'estatus' => $this-> estatus
            ]);

			//Auditoria
            Auditoria::create([ 
            	'usuario_id' => Auth::user()->id,
            	'descripcion' => 'El usuario ha actualizado al estudiante: ' . $this->nombre,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Estudiante Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Estudiante::where('id', $id)->delete();
        }
    }
}