<div>
    <h4 class="heading-l">Citizen Feedback</h4>

    <form wire:submit.prevent="save">

        <div class="card" style="max-width: 600px; margin: auto">

            {{-- Step 1 --}}
            @if ($currentStep == 1)
                <div>
                    <div class="gap-3 card-header d-flex align-items-center">{{ __('label.selectPreferredLanguage') }}
                        <select class="w-auto form-select form-select-sm display-inline" id="wn"
                            wire:model.lazy='preferred_language' wire:click='changeLanguage()'>
                            <option value="en">English</option>
                            {{-- <option value="bn">বাংলা</option> --}}
                            <option value="as">অসমীয়া</option>
                        </select>
                    </div>
                    @error('preferred_language')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="wn" class="form-label">{{ __('label.wardNo') }}:<span
                                    class="redtxt">*</span></label>
                            <select class="form-select" id="wn" name="ward_id"
                                @if ($disabledOption) disabled @endif wire:model.lazy='ward_id'>
                                <option value="" selected>Select ward no</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}"> {{ $ward->title }}
                                    </option>
                                @endforeach
                            </select>

                            @error('ward_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('label.name') }}: <span
                                    class="redtxt">*</span></label>
                            <input type="type" class="form-control" id="name" wire:model.lazy='name'>

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="address" class="form-label">{{ __('label.address') }}:<span
                                    class="redtxt">*</span></label>
                            <input type="type" class="form-control" id="address" name="address"
                                wire:model.lazy='address'>

                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="ph" class="form-label">{{ __('label.PhoneNo') }}:<span
                                    class="redtxt">*</span></label>
                            <input type="text" class="form-control" id="ph" name="phone_no"
                                wire:model.lazy='phone_no'>

                            @error('phone_no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="p-3 text-right">

                            <button type="button" class="btn btn-primary" wire:click='nextStep()'>
                                {{ __('label.next') }}
                                <i class="fa fa-angle-double-right"></i></button>
                        </div>

                    </div>
                </div>
            @endif

            {{-- Step 2 --}}
            @if ($currentStep == 2)
                <div>
                    <div class="card-header">{{ __('label.wardCommissionerPerformance') }}</div>
                    <div class="p-0 card-body">

                        <div class="qset">
                            <h6>{{ __('label.accessibility') }} <span class="redtxt">*</span></label></h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="5"
                                    type="radio" name="accessibility" id="accessibility_very_satisfied">
                                <label class="form-check-label" for="accessibility_very_satisfied">
                                    {{ __('label.verySatisfied') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="4"
                                    type="radio" name="accessibility" id="accessibility_satisfied" checked>
                                <label class="form-check-label" for="accessibility_satisfied">
                                    {{ __('label.satisfied') }}

                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="3"
                                    type="radio" name="accessibility" id="accessibility_neutral">
                                <label class="form-check-label" for="accessibility_neutral">
                                    {{ __('label.neutral') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="2"
                                    type="radio" name="accessibility" id="accessibility_dissatisfied" checked>
                                <label class="form-check-label" for="accessibility_dissatisfied">
                                    {{ __('label.dissatisfied') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="1"
                                    type="radio" name="accessibility" id="accessibility_very_dissatisfied"
                                    value="1" checked>
                                <label class="form-check-label" for="accessibility_very_dissatisfied">
                                    {{ __('label.veryDissatisfied') }}
                                </label>
                            </div>

                            @error('accessibility')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="qset">
                            <h6>{{ __('label.responsivenessGrievances') }} <span class="redtxt">*</span></h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="5" name="responsiveness"
                                    id="responsiveness_excellent">
                                <label class="form-check-label" for="responsiveness_excellent">
                                    {{ __('label.excellent') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="4" name="responsiveness"
                                    id="responsiveness_good" checked>
                                <label class="form-check-label" for="responsiveness_good">
                                    {{ __('label.good') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="3" name="responsiveness"
                                    id="responsiveness_average">
                                <label class="form-check-label" for="responsiveness_average">
                                    {{ __('label.average') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="2" name="responsiveness"
                                    id="responsiveness_poor" checked>
                                <label class="form-check-label" for="responsiveness_poor">
                                    {{ __('label.poor') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="1" name="responsiveness"
                                    id="responsiveness_very_poor" checked>
                                <label class="form-check-label" for="responsiveness_very_poor">
                                    {{ __('label.veryPoor') }}
                                </label>
                            </div>

                            @error('responsiveness_grievances')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="qset">
                            <h6>{{ __('label.proactiveStepIssues') }} <span class="redtxt">*</span></label></h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='proactive_step_issues' value="4"
                                    name="proactive_step_issues" id="proactive_step_issues_always">
                                <label class="form-check-label" for="proactive_step_issues_always">
                                    {{ __('label.always') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='proactive_step_issues' value="3"
                                    name="proactive_step_issues" id="proactive_step_issues_sometimes" checked>
                                <label class="form-check-label" for="proactive_step_issues_sometimes">
                                    {{ __('label.sometimes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='proactive_step_issues'
                                    value="2" type="radio" name="proactive_step_issues"
                                    id="proactive_step_issues_rarely">
                                <label class="form-check-label" for="proactive_step_issues_rarely">
                                    {{ __('label.rarely') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='proactive_step_issues'
                                    value="1" type="radio" name="proactive_step_issues"
                                    id="proactive_step_issues_never" checked>
                                <label class="form-check-label" for="proactive_step_issues_never">
                                    {{ __('label.never') }}
                                </label>
                            </div>

                            @error('proactive_step_issues')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="qset">
                            <h6>{{ __('label.transparentActionAndDecisions') }} <span class="redtxt">*</span></label>
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='transparent_action_and_decision'
                                    value="1" type="radio" name="transparent_action_and_decision"
                                    id="transparent_action_and_decision_yes">
                                <label class="form-check-label" for="transparent_action_and_decision_yes">
                                    {{ __('label.yes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='transparent_action_and_decision'
                                    value="0" type="radio" name="transparent_action_and_decision"
                                    id="transparent_action_and_decision_no" checked>
                                <label class="form-check-label" for="transparent_action_and_decision_no">
                                    {{ __('label.no') }}
                                </label>
                            </div>

                            @error('transparent_action_and_decision')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="qset">
                            <h6>{{ __('label.suggestions') }} (optional)</h6>
                            <div>
                                <textarea class="form-control" wire:model.lazy='suggestions' name="suggestions" id="suggestions" rows="3"
                                    placeholder="{{ __('label.writeYourFeedback') }}"></textarea>
                            </div>

                            @error('suggestions')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="p-3 text-right">
                            <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                                    class="fa fa-angle-double-left"></i>
                                {{ __('label.previous') }}
                            </button>
                            <button type="button" class="btn btn-primary"
                                wire:click='nextStep()'>{{ __('label.next') }} <i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Step 3 --}}
            @if ($currentStep == 3)
                <div>
                    <div class="card-header">{{ __('label.developmentInfrastructure') }}</div>
                    <div class="p-0 card-body">
                        <div class="qset">
                            <h6>{{ __('label.rateCurrentStatus') }} <span class="redtxt">*</span></h6>
                            <div class="mb-2"><strong>{{ __('label.roadsAndPavements') }}</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='roads_pavements' value="4"
                                    type="radio" name="roads_pavements" id="roads_pavements_excellent">
                                <label class="form-check-label" for="roads_pavements_excellent">
                                    {{ __('label.excellent') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='roads_pavements' value="3"
                                    type="radio" name="roads_pavements" id="roads_pavements_good" checked>
                                <label class="form-check-label" for="roads_pavements_good">
                                    {{ __('label.good') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='roads_pavements' value="2"
                                    type="radio" name="roads_pavements" id="roads_pavements_average">
                                <label class="form-check-label" for="roads_pavements_average">
                                    {{ __('label.average') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='roads_pavements' value="1"
                                    type="radio" name="roads_pavements" id="roads_pavements_poor" checked>
                                <label class="form-check-label" for="roads_pavements_poor">
                                    {{ __('label.poor') }}
                                </label>
                            </div>

                            @error('roads_pavements')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 mb-2"><strong>{{ __('label.drainageSystem') }}</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='drainage_system' value="4"
                                    type="radio" name="drainage_system" id="drainage_system_excellent">
                                <label class="form-check-label" for="drainage_system_excellent">
                                    {{ __('label.excellent') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='drainage_system' value="3"
                                    type="radio" name="drainage_system" id="drainage_system_good" checked>
                                <label class="form-check-label" for="drainage_system_good">
                                    {{ __('label.good') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='drainage_system' value="2"
                                    type="radio" name="drainage_system" id="drainage_system_average">
                                <label class="form-check-label" for="drainage_system_average">
                                    {{ __('label.average') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='drainage_system' value="1"
                                    type="radio" name="drainage_system" id="drainage_system_poor" checked>
                                <label class="form-check-label" for="drainage_system_poor">
                                    {{ __('label.poor') }}
                                </label>
                            </div>
                            @error('drainage_system')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 mb-2"><strong>{{ __('label.wasteManagement') }}</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='waste_management' value="4"
                                    type="radio" name="waste_management" id="waste_management_excellent">
                                <label class="form-check-label" for="waste_management_excellent">
                                    {{ __('label.excellent') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='waste_management' value="3"
                                    type="radio" name="waste_management" id="waste_management_good" checked>
                                <label class="form-check-label" for="waste_management_good">
                                    {{ __('label.good') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='waste_management' value="2"
                                    type="radio" name="waste_management" id="waste_management_average">
                                <label class="form-check-label" for="waste_management_average">
                                    {{ __('label.average') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='waste_management' value="1"
                                    type="radio" name="waste_management" id="waste_management_poor" checked>
                                <label class="form-check-label" for="waste_management_poor">
                                    {{ __('label.poor') }}
                                </label>
                            </div>
                            @error('waste_management')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 mb-2"><strong>{{ __('label.streetLighting') }}</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='street_lighting' value="4"
                                    type="radio" name="street_lighting" id="street_lighting_excellent">
                                <label class="form-check-label" for="street_lighting_excellent">
                                    {{ __('label.excellent') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='street_lighting' value="3"
                                    type="radio" name="street_lighting" id="street_lighting_good" checked>
                                <label class="form-check-label" for="street_lighting_good">
                                    {{ __('label.good') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='street_lighting' value="2"
                                    type="radio" name="street_lighting" id="street_lighting_average">
                                <label class="form-check-label" for="street_lighting_average">
                                    {{ __('label.average') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='street_lighting' value="1"
                                    type="radio" name="street_lighting" id="street_lighting_poor" checked>
                                <label class="form-check-label" for="street_lighting_poor">
                                    {{ __('label.poor') }}
                                </label>
                            </div>

                            @error('street_lighting')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 mb-2"><strong>{{ __('label.parksPublicSpaces') }}</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='parks_public_spaces' value="4"
                                    type="radio" name="parks_public_spaces" id="parks_public_spaces_excellent">
                                <label class="form-check-label" for="parks_public_spaces_excellent">
                                    {{ __('label.excellent') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='parks_public_spaces' value="3"
                                    type="radio" name="parks_public_spaces" id="parks_public_spaces_good" checked>
                                <label class="form-check-label" for="parks_public_spaces_good">
                                    {{ __('label.good') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='parks_public_spaces' value="2"
                                    type="radio" name="parks_public_spaces" id="parks_public_spaces_average">
                                <label class="form-check-label" for="parks_public_spaces_average">
                                    {{ __('label.average') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='parks_public_spaces' value="1"
                                    type="radio" name="parks_public_spaces" id="parks_public_spaces_poor" checked>
                                <label class="form-check-label" for="parks_public_spaces_poor">
                                    {{ __('label.poor') }}
                                </label>
                            </div>

                            @error('parks_public_spaces')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="qset">
                            <h6>{{ __('label.sanitationWaterSupply') }} <span class="redtxt">*</span></h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='sanitation_water_supply_adequate'
                                    value="1" type="radio" name="sanitation_water_supply_adequate"
                                    id="sanitation_water_supply_adequate_yes">
                                <label class="form-check-label" for="sanitation_water_supply_adequate_yes">
                                    {{ __('label.yes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='sanitation_water_supply_adequate'
                                    value="0" type="radio" name="sanitation_water_supply_adequate"
                                    id="sanitation_water_supply_adequate_no" checked>
                                <label class="form-check-label" for="sanitation_water_supply_adequate_no">
                                    {{ __('label.no') }}
                                </label>
                            </div>

                            @error('sanitation_water_supply_adequate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="qset">
                            <h6>{{ __('label.feelSafe') }} <span class="redtxt">*</span></h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='feel_safe' value="1"
                                    type="radio" name="feel_safe" id="feel_safe_yes">
                                <label class="form-check-label" for="feel_safe_yes">
                                    {{ __('label.yes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='feel_safe' value="0"
                                    type="radio" name="feel_safe" id="feel_safe_no" checked>
                                <label class="form-check-label" for="feel_safe_no">
                                    {{ __('label.no') }}
                                </label>
                            </div>

                            @error('feel_safe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="qset">
                            <h6>{{ __('label.environmentallySustainable') }} <span class="redtxt">*</span></h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='environmentally_sustainable'
                                    value="1" type="radio" name="environmentally_sustainable"
                                    id="environmentally_sustainable_yes">
                                <label class="form-check-label" for="environmentally_sustainable_yes">
                                    {{ __('label.yes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='environmentally_sustainable'
                                    value="0" type="radio" name="environmentally_sustainable"
                                    id="environmentally_sustainable_no" checked>
                                <label class="form-check-label" for="environmentally_sustainable_no">
                                    {{ __('label.no') }}
                                </label>
                            </div>

                            @error('environmentally_sustainable')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="p-3 text-right">
                            <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                                    class="fa fa-angle-double-left"></i>
                                {{ __('label.previous') }}
                            </button>
                            <button type="button" class="btn btn-primary"
                                wire:click='nextStep()'>{{ __('label.next') }} <i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>

                    </div>

                </div>
            @endif

            {{-- Step 4 --}}

            @if ($currentStep == 4)
                <div>
                    <div class="card-header">{{ __('label.communityEngagement') }}</div>
                    <div class="p-0 card-body">
                        <div class="qset">
                            <h6>{{ __('label.attendedMeetingDriveEvent') }} <span class="redtxt">*</span></h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='attended_meeting_drive_event'
                                    value="1" type="radio" name="attended_meeting_drive_event"
                                    id="attended_meeting_drive_event_yes">
                                <label class="form-check-label" for="attended_meeting_drive_event_yes">
                                    {{ __('label.yes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='attended_meeting_drive_event'
                                    value="0" type="radio" name="attended_meeting_drive_event"
                                    id="attended_meeting_drive_event_no" checked>
                                <label class="form-check-label" for="attended_meeting_drive_event_no">
                                    {{ __('label.no') }}
                                </label>
                            </div>

                            @error('attended_meeting_drive_event')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="qset">
                            <h6>{{ __('label.opinionsConsideredDevPlans') }} <span class="redtxt">*</span></h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='opinions_considered_dev_plans'
                                    value="4" type="radio" name="opinions_considered_dev_plans"
                                    id="opinions_considered_dev_plans_always">
                                <label class="form-check-label" for="opinions_considered_dev_plans_always">
                                    {{ __('label.always') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='opinions_considered_dev_plans'
                                    value="3" type="radio" name="opinions_considered_dev_plans"
                                    id="opinions_considered_dev_plans_sometimes" checked>
                                <label class="form-check-label" for="opinions_considered_dev_plans_sometimes">
                                    {{ __('label.sometimes') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='opinions_considered_dev_plans'
                                    value="2" type="radio" name="opinions_considered_dev_plans"
                                    id="opinions_considered_dev_plans_rarely">
                                <label class="form-check-label" for="opinions_considered_dev_plans_rarely">
                                    {{ __('label.rarely') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='opinions_considered_dev_plans'
                                    value="1" type="radio" name="opinions_considered_dev_plans"
                                    id="opinions_considered_dev_plans_never" checked>
                                <label class="form-check-label" for="opinions_considered_dev_plans_never">
                                    {{ __('label.never') }}
                                </label>
                            </div>

                            @error('opinions_considered_dev_plans')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="qset">
                            <h6>{{ __('label.overallCommunication') }} <span class="redtxt">*</span></h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='communication_citizens_municipality'
                                    value="4" type="radio" name="communication_citizens_municipality"
                                    id="communication_citizens_municipality_excellent">
                                <label class="form-check-label" for="communication_citizens_municipality_excellent">
                                    {{ __('label.excellent') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='communication_citizens_municipality'
                                    value="3" type="radio" name="communication_citizens_municipality"
                                    id="communication_citizens_municipality_good" checked>
                                <label class="form-check-label" for="communication_citizens_municipality_good">
                                    {{ __('label.good') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='communication_citizens_municipality'
                                    value="2" type="radio" name="communication_citizens_municipality"
                                    id="communication_citizens_municipality_average">
                                <label class="form-check-label" for="communication_citizens_municipality_average">
                                    {{ __('label.average') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='communication_citizens_municipality'
                                    value="1" type="radio" name="communication_citizens_municipality"
                                    id="communication_citizens_municipality_poor" checked>
                                <label class="form-check-label" for="communication_citizens_municipality_poor">
                                    {{ __('label.poor') }}
                                </label>
                            </div>

                            @error('communication_citizens_municipality')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="p-3 text-right">
                            <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                                    class="fa fa-angle-double-left"></i>
                                {{ __('label.previous') }}
                            </button>
                            <button type="button" class="btn btn-primary"
                                wire:click='nextStep()'>{{ __('label.next') }}
                                <i class="fa fa-angle-double-right"></i></button>
                        </div>


                    </div>
                </div>
            @endif

            {{-- Step 5 --}}
            @if ($currentStep == 5)
                <div>
                    <div class="card-header">{{ __('label.suggestionsAdditionalFeedback') }}</div>
                    <div class="p-0 card-body">
                        <div class="qset">
                            <h6>{{ __('label.mostCriticalIssues') }}</h6>
                            @foreach ($most_critical_issues as $key => $value)
                                <small>{{ __('label.writeYourIssue') }} <span class="redtxt">*</span></small>
                                <div class="mb-2 inputrow">
                                    <input type="text" class="form-control"
                                        name="most_critical_issues{{ $key }}"
                                        wire:model.lazy='most_critical_issues.{{ $key }}'
                                        placeholder="{{ __('label.writeYourIssue') }}" id="feedback">
                                </div>
                                @error('most_critical_issues.*')
                                    <span class="text-danger">{{ $errors->first('most_critical_issues.' . $key) }}</span>
                                @enderror



                                <div class="mb-2 inputrow">
                                    <small>{{ __('label.uploadFile') }}({{ __('label.optional') }})</small>
                                    <input class="form-control" wire:model.lazy='attach_file.{{ $key }}'
                                        type="file" name="attach_file.{{ $key }}"
                                        id="attach_file.{{ $key }}">
                                </div>

                                @error('attach_file.*')
                                    <span class="text-danger">{{ $errors->first('attach_file.' . $key) }}</span>
                                @enderror





                                @if ($key > 0)
                                    <div>
                                        <a class="addfld text-danger"
                                            wire:click='removeIssue({{ $key }})'>-
                                            {{ __('label.remove') }}</a>
                                    </div>
                                @endif
                            @endforeach



                            <div class="text-right">
                                @if ($key >= 0 && $key < 2)
                                    <div wire:ignore>
                                        <a class="addfld" wire:click='addIssue()'>+
                                            {{ __('label.addMore') }}</a>
                                    </div>
                                @endif

                            </div>


                        </div>
                        <div class="qset">
                            <h6> {{ __('label.suggestionsAdditionalFeedback') }} ({{ __('label.optional') }})</h6>
                            <div>
                                <textarea class="form-control" name="additional_suggestions" id="additional_suggestions" rows="4"
                                    placeholder="{{ __('label.writeYourFeedback') }}" wire:model.lazy='additional_suggestions'></textarea>
                            </div>

                            @error('additional_suggestions')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="p-3 text-right">
                            <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                                    class="fa fa-angle-double-left"></i>
                                {{ __('label.previous') }}
                            </button>
                            <button type="submit" class="btn btn-primary">{{ __('label.submit') }}</button>
                        </div>
                    </div>
            @endif

        </div>


    </form>
</div>
