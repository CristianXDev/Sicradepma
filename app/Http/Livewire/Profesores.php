<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Profesore;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;

class Profesores extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellido, $cedula, $rol, $estatus;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.profesores.view', [
            'profesores' => Profesore::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido', 'LIKE', $keyWord)
						->orWhere('cedula', 'LIKE', $keyWord)
						->orWhere('rol', 'LIKE', $keyWord)
						->orWhere('estatus', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->apellido = null;
		$this->cedula = null;
		$this->rol = null;
		$this->estatus = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
        ]);

        Profesore::create([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'cedula' => $this-> cedula,
			'rol' => 'Profesor',
        ]);

         //Auditoria
        Auditoria::create([ 
        	'usuario_id' => Auth::user()->id,
        	'descripcion' => 'El usuario ha registrado al profesor: ' . $this->nombre,
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Profesore Successfully created.');
    }

    public function edit($id)
    {
        $record = Profesore::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellido = $record-> apellido;
		$this->cedula = $record-> cedula;
		$this->rol = $record-> rol;
		$this->estatus = $record-> estatus;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'apellido' => 'required',
		'cedula' => 'required',
		'rol' => 'required',
		'estatus' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Profesore::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellido' => $this-> apellido,
			'cedula' => $this-> cedula,
			'rol' => $this-> rol,
			'estatus' => $this-> estatus
            ]);

        	 //Auditoria
            Auditoria::create([ 
            	'usuario_id' => Auth::user()->id,
            	'descripcion' => 'El usuario ha editado al profesor: ' . $this->nombre,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Profesore Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Profesore::where('id', $id)->delete();
        }
    }
}