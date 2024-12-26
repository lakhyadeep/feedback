<?php

namespace App\Livewire;

use App\Models\Ward;
use Livewire\Component;
use App\Models\Feedback;
use App\Rules\AlphaSpace;
use Illuminate\Support\Facades\App;

class CreateFeedBack extends Component
{

    public $most_critical_issues = [''];
    public $totalSteps = 5;
    public $currentStep = 1;
    public $wards = [''];


    //////////////Form fields ////////
    public $preferred_language = "en";
    public $ward_id;
    public $name;
    public $address;
    public $phone_no;

    public $accessibility;
    public $responsiveness_grievances;
    public $proactive_step_issues;
    public $transparent_action_and_decision;
    public $suggestions;

    public $roads_pavements;
    public $drainage_system;
    public $waste_management;
    public $street_lighting;
    public $parks_public_spaces;
    public $sanitation_water_supply_adequate;
    public $feel_safe;
    public $environmentally_sustainable;

    public $attended_meeting_drive_event;
    public $opinions_considered_dev_plans;
    public $communication_citizens_municipality;
    public $additional_suggestions;

    public function mount()
    {
        $this->wards = Ward::where('status', true)->get();
    }


    public function nextStep()
    {
        // validate
        $this->validate($this->validationRules[$this->currentStep]);

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

    public function addIssue()
    {
        $this->most_critical_issues[] = '';
    }


    public function removeIssue($index)
    {
        unset($this->most_critical_issues[$index]);
        $this->most_critical_issues = array_values($this->most_critical_issues);
    }
    public function changeLanguage()
    {
        App::setLocale($this->preferred_language);
        session()->put('locale', $this->preferred_language);
        return $this->currentStep;
    }


    public function render()
    {
        return view('livewire.create-feed-back');
    }



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->validationRules[$this->currentStep]);
    }

    private $validationRules = [

        1 => [
            'preferred_language' => [
                'required',
                'message' => [
                    'required' => 'Please select a language'
                ]
            ],
            'ward_id' => ['required'],
            'name' => ['required', 'min:3', 'regex:/^[a-zA-Z\s]+$/'],
            'address' => ['required'],
            //'phoneNo' => ['required', 'regex:/^[6-9]\d{9}$/']
            'phone_no' => ['required']
        ],

        2 => [
            'accessibility' => ['required'],
            'responsiveness_grievances' => ['required'],
            'proactive_step_issues' => ['required'],
            'transparent_action_and_decision' => ['required'],
            'suggestions' => ['required'],
        ],

        3 => [
            'roads_pavements' => ['required'],
            'drainage_system' => ['required'],
            'waste_management' => ['required'],
            'street_lighting' => ['required'],
            'parks_public_spaces' => ['required'],
            'sanitation_water_supply_adequate' => ['required'],
            'feel_safe' => ['required'],
            'environmentally_sustainable' => ['required'],
        ],


        4 => [
            'attended_meeting_drive_event' => ['required'],
            'opinions_considered_dev_plans' => ['required'],
            'communication_citizens_municipality' => ['required'],
        ],

        5 => [
            'most_critical_issues.*' => ['required'],
            'additional_suggestions' => ['required'],
        ]

    ];


    public function save()
    {
        $rules = collect($this->validationRules)->collapse()->toArray();
        //dd($rules);
        $validatedData = $this->validate($rules);
        Feedback::create($validatedData);
        return redirect()->route('thankyou');
    }
}
