<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Seccione;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;

class Secciones extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $num_estudiantes;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.secciones.view', [
            'secciones' => Seccione::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('num_estudiantes', 'LIKE', $keyWord)
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
		$this->num_estudiantes = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'num_estudiantes' => 'required',
        ]);

        Seccione::create([ 
			'nombre' => $this-> nombre,
			'num_estudiantes' => $this-> num_estudiantes
        ]);

        //Auditoria
        Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha creado la sección: ' . $this->nombre,
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Seccione Successfully created.');
    }

    public function edit($id)
    {
        $record = Seccione::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->num_estudiantes = $record-> num_estudiantes;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'num_estudiantes' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Seccione::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'num_estudiantes' => $this-> num_estudiantes
            ]);

            //Auditoria
            Auditoria::create([ 
                'usuario_id' => Auth::user()->id,
                'descripcion' => 'El usuario ha actualizado a la sección: ' . $this->nombre,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Seccione Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Seccione::where('id', $id)->delete();
        }
    }
}