<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Thank You')]
class ThankYou extends Component
{
    public function render()
    {
        return view('livewire.thank-you');
    }
}
