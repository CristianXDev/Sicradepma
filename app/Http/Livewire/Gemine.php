<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\GeminiChat;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Auth;

class Gemine extends Component{

  public $pregunta, $respuesta, $chat = [] , $showChat = false;

  private function resetInput(){

    $this->pregunta = null;
    $this->respuesta = null;
  }

 /*
    public function mount(){

     
          $this->chat = GeminiChat::where('usuario_id', Auth::user()->id)
          ->orderBy('created_at', 'desc')
          ->get();
     
    }
*/

  public function procesarMensaje(){

    $this->validate([
            'pregunta' => 'required|string|min:5', // Validación para asegurar que la pregunta no está vacía
          ]);

    // 1. Conecta con Gemini
    $result = Gemini::geminiPro()->generateContent($this->pregunta);

    // 2. Obtiene la respuesta
    $this->respuesta = str_replace("*", " ", $result->text());


    GeminiChat::create([ 
      'usuario_id' => Auth::user()->id,
      'pregunta' => $this-> pregunta,
      'respuesta' => $this-> respuesta
    ]);

    $this->resetInput();
    $this->emitSelf('refreshChat');
  }

  public function toggleChat(){

    $this->showChat = !$this->showChat;
  }

  public function render(){

    $this->chat = GeminiChat::latest()
    ->where('usuario_id', Auth::user()->id)
    ->orderBy('created_at', 'desc')
    ->take(10)
    ->get();

    return view('livewire.gemine.view');
  }

}