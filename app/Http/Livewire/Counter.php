<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
   public $counter  = 0;
    public function render()
    {
        return view('livewire.counter');
    }
    public $titulo, $descripcion;
    public function mount($data){
        $this->titulo = $data['titulo'];
        $this->descripcion = $data['descripcion'];
    }

    public function aumentar()
    {
       $this->counter++;
    }
}
