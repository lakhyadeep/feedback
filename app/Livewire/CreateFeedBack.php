<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class CreateFeedBack extends Component
{

    public $issues;
    public $iCounter;
    public $language;

    public $totaliCounter = 3;
    public $totalSteps = 5;
    public $currentStep = 1;

    public function mount()
    {
        $this->issues = [];
        $this->iCounter = 1;
        return $this->currentStep = 1;
    }

    public function addIssue($iCounter)
    {

        array_push($this->issues, $iCounter);
        if ($this->iCounter < $this->totaliCounter) {
            $this->iCounter++;
        }
    }


    public function removeIssue()
    {
        array_pop(($this->issues));
        if ($this->iCounter > 1)
            $this->iCounter--;
    }

    public function nextStep()
    {
        //dd("hello");
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }

        //dd($this->currentStep);
    }

    public function previousStep()
    {

        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }


    public function save()
    {

        dd("Save");
    }

    public function changeLanguage()
    {
        App::setLocale($this->language);
        session()->put('locale', $this->language);
        return $this->currentStep;
    }


    public function render()
    {
        return view('livewire.create-feed-back');
    }
}
