<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Insights')]
class Insights extends Component
{
    public function render()
    {
        return view('livewire.insights');
    }
}
