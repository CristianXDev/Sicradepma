<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $image, $name, $email, $rol, $contrasena;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.users.view', [
            'users' => User::latest()
						->orWhere('image', 'LIKE', $keyWord)
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('rol', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->email = null;
		$this->contrasena = null;
    }

    public function store(){

    $this->validate([
    	'name' => 'required',
        'email' => 'required|email|unique:users,email', // Agregamos unique:users,email
        'contrasena' => 'required',
    ]);

    	User::create([
		'name' => $this->name,
		'email' => $this->email,
        'password' => Hash::make($this->contrasena), // Aún sin cifrar, lo arreglamos luego
        'rol' => '2',
    ]);

    	$this->resetInput();
    	$this->dispatchBrowserEvent('closeModal');
    	session()->flash('message', 'User Successfully created.');
    }


    public function edit($id)
    {
        $record = User::findOrFail($id);
        $this->selected_id = $id; 
		$this->image = $record-> image;
		$this->name = $record-> name;
		$this->email = $record-> email;
    }

    public function update(){

    	$this->validate([
    		'name' => 'required',
    		'email' => 'required',
            'contrasena' => 'nullable|min:6', // 'nullable' permite que esté vacío, 'min:6' si se proporciona
    ]);

    	if ($this->selected_id) {
    		$record = User::find($this->selected_id);

    		$updateData = [
    			'name' => $this->name,
    			'email' => $this->email,
    		];

        // Verifica si se proporcionó una contraseña
    		if (!empty($this->contrasena)) {
            $updateData['password'] = Hash::make($this->contrasena); // Cifra la contraseña
        }

        $record->update($updateData);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'User Successfully updated.');
	   }
	}

    public function destroy($id)
    {
        if ($id) {
            User::where('id', $id)->delete();
        }
    }
}