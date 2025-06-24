<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Auditoria;

class Auditorias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $usuario_id, $descripcion;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.auditorias.view', [
            'auditorias' => Auditoria::latest()
						->orWhere('usuario_id', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->usuario_id = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'usuario_id' => 'required',
		'descripcion' => 'required',
        ]);

        Auditoria::create([ 
			'usuario_id' => $this-> usuario_id,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Auditoria Successfully created.');
    }

    public function edit($id)
    {
        $record = Auditoria::findOrFail($id);
        $this->selected_id = $id; 
		$this->usuario_id = $record-> usuario_id;
		$this->descripcion = $record-> descripcion;
    }

    public function update()
    {
        $this->validate([
		'usuario_id' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Auditoria::find($this->selected_id);
            $record->update([ 
			'usuario_id' => $this-> usuario_id,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Auditoria Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Auditoria::where('id', $id)->delete();
        }
    }
}