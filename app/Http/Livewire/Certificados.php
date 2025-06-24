<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Estudiante;
use App\Models\Estado;

class Certificados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord ='', $estado_id, $nombre, $apellido, $cedula, $grado, $periodo, $fecha_nacimiento, $estatus;

    public function render(){

    	$keyWord = '%' . $this->keyWord . '%';

    	$estudiantes = Estudiante::query()
    	->where('grado', '6to Grado')
        ->where('estatus', 'activo') // Filtra por grado específico
        ->when($this->keyWord, function ($query, $keyWord) {
        	$query->where(function ($query) use ($keyWord) {
        		$query->where('nombre', 'LIKE', $keyWord)
        		->orWhere('apellido', 'LIKE', $keyWord)
        		->orWhere('cedula', 'LIKE', $keyWord)
        		->orWhere('periodo', 'LIKE', $keyWord)
        		->orWhere('grado', 'LIKE', $keyWord);
        	});
        })->paginate(10);

        return view('livewire.certificados.view', [
        	'estudiantes' => $estudiantes,
        ]);
    }

}