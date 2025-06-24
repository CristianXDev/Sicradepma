<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Horario;
use App\Models\Seccione;
use App\Models\Profesore;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;

class Horarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_seccion, $id_profesor, $dia_semana, $actividad, $hora_ini, $hora_fin, $secciones, $profesores;

    public $lunes, $martes, $miercoles, $jueves, $viernes;

    public function render(){
    	
    	//INFORMACIÓN ADICIONAL
    	$this->secciones = Seccione::all();
    	$this->profesores = Profesore::all();

    	//DÍAS DE LA SEMANA
    	$this->lunes = Horario::where('dia_semana', 'Lunes')->first();
    	$this->martes = Horario::where('dia_semana', 'Martes')->first();
    	$this->miercoles = Horario::where('dia_semana', 'Miercoles')->first();
    	$this->jueves = Horario::where('dia_semana', 'Jueves')->first();
    	$this->viernes = Horario::where('dia_semana', 'Viernes')->first();


		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.horarios.view', [
            'horarios' => Horario::latest()
						->orWhere('id_seccion', 'LIKE', $keyWord)
						->orWhere('id_profesor', 'LIKE', $keyWord)
						->orWhere('dia_semana', 'LIKE', $keyWord)
						->orWhere('actividad', 'LIKE', $keyWord)
						->orWhere('hora_ini', 'LIKE', $keyWord)
						->orWhere('hora_fin', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_seccion = null;
		$this->id_profesor = null;
		$this->dia_semana = null;
		$this->actividad = null;
		$this->hora_ini = null;
		$this->hora_fin = null;
    }

    public function store(){

        $this->validate([
		'id_seccion' => 'required',
		'id_profesor' => 'required',
		'dia_semana' => 'required|unique:horario,dia_semana',
		'actividad' => 'required',
		'hora_ini' => 'required',
		'hora_fin' => 'required',
        ]);

        Horario::create([ 
			'id_seccion' => $this-> id_seccion,
			'id_profesor' => $this-> id_profesor,
			'dia_semana' => $this-> dia_semana,
			'actividad' => $this-> actividad,
			'hora_ini' => $this-> hora_ini,
			'hora_fin' => $this-> hora_fin
        ]);


        //Auditoria
        Auditoria::create([ 
        	'usuario_id' => Auth::user()->id,
        	'descripcion' => 'El usuario ha agregado una nueva actividad: ' . $this->actividad,
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Horario Successfully created.');
    }

    public function edit($id)
    {
        $record = Horario::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_seccion = $record-> id_seccion;
		$this->id_profesor = $record-> id_profesor;
		$this->dia_semana = $record-> dia_semana;
		$this->actividad = $record-> actividad;
		$this->hora_ini = $record-> hora_ini;
		$this->hora_fin = $record-> hora_fin;
    }

    public function update()
    {
        $this->validate([
		'id_seccion' => 'required',
		'id_profesor' => 'required',
		'dia_semana' => 'required',
		'actividad' => 'required',
		'hora_ini' => 'required',
		'hora_fin' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Horario::find($this->selected_id);
            $record->update([ 
			'id_seccion' => $this-> id_seccion,
			'id_profesor' => $this-> id_profesor,
			'dia_semana' => $this-> dia_semana,
			'actividad' => $this-> actividad,
			'hora_ini' => $this-> hora_ini,
			'hora_fin' => $this-> hora_fin
            ]);


        	//Auditoria
            Auditoria::create([ 
            	'usuario_id' => Auth::user()->id,
            	'descripcion' => 'El usuario ha actualizado la actividad: ' . $this->actividad,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Horario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Horario::where('id', $id)->delete();
        }
    }
}