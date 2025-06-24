<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nota;
use App\Models\Estudiante;
use Gemini\Laravel\Facades\Gemini;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;

class Notas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_estudiante, $primer_lapso, $segundo_lapso, $tercer_lapso, $nota_final, $periodo, $estudiantes;

    public function render(){

        $keyWord = trim($this->keyWord);

        $notas = Nota::latest()
        ->when(!empty($keyWord), function ($query) use ($keyWord) {
            $keyWord = '%' . strtolower($keyWord) . '%';

            $query->where(function ($query) use ($keyWord) {
                $query->where('primer_lapso', 'LIKE', $keyWord)
                ->orWhere('segundo_lapso', 'LIKE', $keyWord)
                ->orWhere('tercer_lapso', 'LIKE', $keyWord)
                ->orWhere('nota_final', 'LIKE', $keyWord)
                ->orWhere('periodo', 'LIKE', $keyWord)
                ->orWhereHas('estudiante', function ($query) use ($keyWord) {
                    $query->where('nombre', 'LIKE', $keyWord)
                    ->orWhere('apellido', 'LIKE', $keyWord)
                    ->orWhere('cedula', 'LIKE', $keyWord);
                });
            });
        })
        ->paginate(10);

        return view('livewire.notas.view', [
            'notas' => $notas,
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->id_estudiante = null;
		$this->primer_lapso = null;
		$this->segundo_lapso = null;
		$this->tercer_lapso = null;
		$this->nota_final = null;
		$this->periodo = null;
    }

    public function store()
    {
        $this->validate([
		'id_estudiante' => 'required',
		'primer_lapso' => 'required',
		'segundo_lapso' => 'nullable',
		'tercer_lapso' => 'nullable',
		'nota_final' => 'nullable',
		'periodo' => 'required',
        ]);

        Nota::create([ 
			'id_estudiante' => $this-> id_estudiante,
			'primer_lapso' => $this-> primer_lapso,
			'segundo_lapso' => $this-> segundo_lapso ?? null,
			'tercer_lapso' => $this-> tercer_lapso ?? null,
			'nota_final' => $this-> nota_final ?? null,
			'periodo' => $this-> periodo,
        ]);

        //Auditoria
        Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha cargado una nota',
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Nota Successfully created.');
    }

    public function edit($id){

        $record = Nota::findOrFail($id);
        $this->selected_id = $id; 
		$this->id_estudiante = $record-> id_estudiante;
		$this->primer_lapso = $record-> primer_lapso;
		$this->segundo_lapso = $record-> segundo_lapso;
		$this->tercer_lapso = $record-> tercer_lapso;
		$this->nota_final = $record-> nota_final;
		$this->periodo = $record-> periodo;
    }

    public function update(){

        $this->validate([
		'id_estudiante' => 'required',
		'primer_lapso' => 'required',
		'segundo_lapso' => 'nullable',
		'tercer_lapso' => 'nullable',
		'nota_final' => 'nullable',
		'periodo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Nota::find($this->selected_id);

		$updateData = [
			'id_estudiante' => $this-> id_estudiante,
			'primer_lapso' => $this-> primer_lapso,
			'periodo' => $this-> periodo,
		];

		if (!empty($this->segundo_lapso)) {
            $updateData['segundo_lapso'] = $this->segundo_lapso;
        }

		if (!empty($this->tercer_lapso)) {
            $updateData['tercer_lapso'] = $this->tercer_lapso;
        }

        if (!empty($this->nota_final)) {
            $updateData['nota_final'] = $this->nota_final;
        }

        $record->update($updateData);

        //Auditoria
        Auditoria::create([ 
            'usuario_id' => Auth::user()->id,
            'descripcion' => 'El usuario ha editado una nota',
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Nota Successfully updated.');

        }
    }


    public function updateSegundoLapso(){

        $this->validate([
		'segundo_lapso' => 'required',
        ]);

        if($this->selected_id){

        	$record = Nota::find($this->selected_id);

        	$updateData = [
        		'segundo_lapso' => $this-> segundo_lapso,
        	];

        	$record->update($updateData);

            //Auditoria
            Auditoria::create([ 
                'usuario_id' => Auth::user()->id,
                'descripcion' => 'El usuario ha cargado la nota del segundo lapso de un estudiante',
            ]);

        	$this->resetInput();
        	$this->dispatchBrowserEvent('closeModal');
        	session()->flash('message', 'Nota Successfully updated.');
        }
    }


    public function updateTercerLapso(){

        $this->validate([
		'tercer_lapso' => 'required',
        ]);

        if($this->selected_id){

        	$record = Nota::find($this->selected_id);

        	$updateData = [
        		'tercer_lapso' => $this-> tercer_lapso,
        	];

        	$record->update($updateData);

            //Auditoria
            Auditoria::create([ 
                'usuario_id' => Auth::user()->id,
                'descripcion' => 'El usuario ha cargado la nota del tercer lapso de un estudiante',
            ]);

        	$this->resetInput();
        	$this->dispatchBrowserEvent('closeModal');
        	session()->flash('message', 'Nota Successfully updated.');
        }
    }

        public function updateNotaFinal(){

        $this->validate([
		  'nota_final' => 'required|in:A,B,C,D',
        ]);

        if($this->selected_id){

        	$record = Nota::find($this->selected_id);

        	$updateData = [
        		'nota_final' => $this-> nota_final,
        	];

        	$record->update($updateData);

            //Auditoria
            Auditoria::create([ 
                'usuario_id' => Auth::user()->id,
                'descripcion' => 'El usuario ha cargado la nota final de un estudiante',
            ]);

        	$this->resetInput();
        	$this->dispatchBrowserEvent('closeModal');
        	session()->flash('message', 'Nota Successfully updated.');
        }
    }

    public function geminiPrimerLapso(){

    	$this->validate([
    		'primer_lapso' => 'required', 
    	]);

    // 1. Conecta con Gemini (ya tienes la lógica aquí)
    	$result = Gemini::geminiPro()->generateContent(
    		'Mejora la redacción de esta descripcion de como le fue este estudiante duarnte este lapso de estudio y hazlo un poco más llamativo: '. $this->primer_lapso .
    		'Necestio que la redacción sea limpia y sin dialogos adicionales.'
    	);

    	$result = $result->text();

    // 2. Guardar el nuevo nombre
    	$this->primer_lapso = str_replace("*", " ", $result);
    }


    public function geminiSegundoLapso(){

    	$this->validate([
    		'segundo_lapso' => 'required', 
    	]);

    // 1. Conecta con Gemini (ya tienes la lógica aquí)
    	$result = Gemini::geminiPro()->generateContent(
    		'Mejora la redacción de esta descripcion de como le fue este estudiante duarnte este lapso de estudio y hazlo un poco más llamativo: '. $this->segundo_lapso .
    		'Necestio que la redacción sea limpia y sin dialogos adicionales.'
    	);

    	$result = $result->text();

    // 2. Guardar el nuevo nombre
    	$this->segundo_lapso = str_replace("*", " ", $result);

    }

   public function geminiTercerLapso(){

    	$this->validate([
    		'tercer_lapso' => 'required', 
    	]);

    // 1. Conecta con Gemini (ya tienes la lógica aquí)
    	$result = Gemini::geminiPro()->generateContent(
    		'Mejora la redacción de esta descripcion de como le fue este estudiante duarnte este lapso de estudio y hazlo un poco más llamativo: '. $this->tercer_lapso .
    		'Necestio que la redacción sea limpia y sin dialogos adicionales.'
    	);

    	$result = $result->text();

    // 2. Guardar el nuevo nombre
    	$this->tercer_lapso = str_replace("*", " ", $result);

    }

    public function destroy($id)
    {
        if ($id) {
            Nota::where('id', $id)->delete();
        }
    }

    public function mount(){

    	$this->estudiantes = Estudiante::all();

    }
}