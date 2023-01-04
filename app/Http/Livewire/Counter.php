<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public function render()
    {
        return view('livewire.counter');
    }
    public function increase() {
        flash()->addSuccess('Hello');
        $this->count++;
    }
    public function decrease() {
        flash()->addWarning('Hello');
        $this->count--;
    }
}
