<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SeccionPolimorfa;
use App\Models\Estudiante;
use App\Models\Seccione;

class SeccionPolimorfas extends Component{

    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $keyWord, $keyWordTwo, $id_seccion, $id_estudiante, $estudiantesEnSeccion, $estudiantesFueraSeccion, $seccion;

    public function render(){

        //Obtener el nombre de la sección
        $this->seccion = Seccione::where('id', $this->id_seccion)->first();

        // 1. Obtener todos los IDs de estudiantes en SeccionPolimorfa
        $estudiantesEnSeccionIds = SeccionPolimorfa::where('id_seccion', $this->id_seccion)->get()->pluck('id_estudiante')->toArray();

        // 2. Obtener estudiantes EN seccionPolimorfa
        $this->estudiantesEnSeccion = Estudiante::whereIn('id', $estudiantesEnSeccionIds)
        ->when($this->keyWord, function($query){
            return $query->where('nombre', 'LIKE', '%'.$this->keyWord.'%')
            ->orWhere('apellido', 'LIKE', '%'.$this->keyWord.'%')
            ->orWhere('cedula', 'LIKE', '%'.$this->keyWord.'%');
        })->get();



        // 1. Obtener todos los IDs de estudiantes en SeccionPolimorfa
        $estudiantesNotSeccionIds = SeccionPolimorfa::whereNotIn('id', $estudiantesEnSeccionIds)->get()->pluck('id_estudiante')->toArray();

        // 3. Obtener estudiantes FUERA de seccionPolimorfa
        $this->estudiantesFueraSeccion = Estudiante::whereNotIn('id', $estudiantesNotSeccionIds)
        ->when($this->keyWordTwo, function($query){
            return $query->where('nombre', 'LIKE', '%'.$this->keyWordTwo.'%')
            ->orWhere('apellido', 'LIKE', '%'.$this->keyWordTwo.'%')
            ->orWhere('cedula', 'LIKE', '%'.$this->keyWordTwo.'%');
        })->get();

        return view('livewire.seccion-polimorfas.view',[
           'estudiantesEnSeccion' => $this->estudiantesEnSeccion,
           'estudiantesFueraSeccion' => $this->estudiantesFueraSeccion,
           'seccion' => $this->seccion,
        ]);
    }

    public function store($id){

        //Cantidad de estudiantes totales
        $estudiantes_totales =  $this->estudiantesEnSeccion->count();


        if($estudiantes_totales <= $this->seccion->num_estudiantes){

            SeccionPolimorfa::create([ 
                'id_seccion' => $this->id_seccion,
                'id_estudiante' => $id,
            ]);

        } else {

            session()->flash('message', '¡La sección ya está llena!.');
        }
       
    }


    public function destroy($id){

        if($id){
            SeccionPolimorfa::where('id_estudiante', $id)->delete();
        }
    }

    public function mount($id){

        $this->id_seccion = $id;
    }
}