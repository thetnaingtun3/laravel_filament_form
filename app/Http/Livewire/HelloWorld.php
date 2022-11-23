<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = "Coffee";
    public $check = false;
    public $greeting = ['hello'];
    // public function resteName($name = 'Chico')
    // {
    //     $this->name = $name;
    // }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
