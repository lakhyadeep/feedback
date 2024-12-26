<div>
    <h4 class="heading-l">Citizen Feedback</h4>

    <form wire:submit.prevent="save">

        <div class="card" style="max-width: 600px; margin: auto">

            {{-- Step 1 --}}
            @if ($currentStep == 1)
                <div>
                    <div class="gap-3 card-header d-flex align-items-center">Select preferred language <select
                            class="w-auto form-select form-select-sm display-inline" id="wn"
                            wire:model.lazy='preferred_language' wire:click='changeLanguage()'>
                            <option value="en">English</option>
                            <option value="be">বাংলা</option>
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
                            <select class="form-select" id="wn" name="ward_id" wire:model.lazy='ward_id'>
                                <option value="" selected>Select ward no</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}">{{ $ward->title }}</option>
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

                            <button type="button" class="btn btn-primary" wire:click='nextStep()'>Next <i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>

                    </div>
                </div>
            @endif

            {{-- Step 2 --}}
            @if ($currentStep == 2)
                <div>
                    <div class="card-header">Ward Commissioner Performance</div>
                    <div class="p-0 card-body">

                        <div class="qset">
                            <h6>{{ __('label.accessibility') }}</h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="Very Satisfied"
                                    type="radio" name="accessibility" id="accessibility_very_satisfied">
                                <label class="form-check-label" for="accessibility_very_satisfied">
                                    {{ __('label.accOption.verySatisfied') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="Satisfied"
                                    type="radio" name="accessibility" id="accessibility_satisfied" checked>
                                <label class="form-check-label" for="accessibility_satisfied">
                                    Satisfied
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="Neutral"
                                    type="radio" name="accessibility" id="accessibility_neutral">
                                <label class="form-check-label" for="accessibility_neutral">
                                    Neutral
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility' value="Dissatisfied"
                                    type="radio" name="accessibility" id="accessibility_dissatisfied" checked>
                                <label class="form-check-label" for="accessibility_dissatisfied">
                                    Dissatisfied
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='accessibility'
                                    value="Very Dissatisfied" type="radio" name="accessibility"
                                    id="accessibility_very_dissatisfied" value="Very Dissatisfied" checked>
                                <label class="form-check-label" for="accessibility_very_dissatisfied">
                                    Very Dissatisfied
                                </label>
                            </div>

                            @error('accessibility')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="qset">
                            <h6>How do you rate the responsiveness of the Ward Commissioner to citizen grievances?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="Excellent"
                                    name="responsiveness" id="responsiveness_excellent">
                                <label class="form-check-label" for="responsiveness_excellent">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="Good" name="responsiveness"
                                    id="responsiveness_good" checked>
                                <label class="form-check-label" for="responsiveness_good">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="Average" name="responsiveness"
                                    id="responsiveness_average">
                                <label class="form-check-label" for="responsiveness_average">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="Poor" name="responsiveness"
                                    id="responsiveness_poor" checked>
                                <label class="form-check-label" for="responsiveness_poor">
                                    Poor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='responsiveness_grievances' value="Very Poor"
                                    name="responsiveness" id="responsiveness_very_poor" checked>
                                <label class="form-check-label" for="responsiveness_very_poor">
                                    Very Poor
                                </label>
                            </div>

                            @error('responsiveness_grievances')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="qset">
                            <h6>Has the Ward Commissioner taken proactive steps to address key issues in your ward?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='proactive_step_issues' value="Always"
                                    name="proactive_step_issues" id="proactive_step_issues_always">
                                <label class="form-check-label" for="proactive_step_issues_always">
                                    Always
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    wire:model.lazy='proactive_step_issues' value="Sometimes"
                                    name="proactive_step_issues" id="proactive_step_issues_sometimes" checked>
                                <label class="form-check-label" for="proactive_step_issues_sometimes">
                                    Sometimes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='proactive_step_issues'
                                    value="Rarely" type="radio" name="proactive_step_issues"
                                    id="proactive_step_issues_rarely">
                                <label class="form-check-label" for="proactive_step_issues_rarely">
                                    Rarely
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='proactive_step_issues'
                                    value="Never" type="radio" name="proactive_step_issues"
                                    id="proactive_step_issues_never" checked>
                                <label class="form-check-label" for="proactive_step_issues_never">
                                    Never
                                </label>
                            </div>

                            @error('proactive_step_issues')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="qset">
                            <h6>Do you feel the Ward Commissioner is transparent in their actions and decisions?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='transparent_action_and_decision'
                                    value="Yes" type="radio" name="transparent_action_and_decision"
                                    id="transparent_action_and_decision_yes">
                                <label class="form-check-label" for="transparent_action_and_decision_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='transparent_action_and_decision'
                                    value="No" type="radio" name="transparent_action_and_decision"
                                    id="transparent_action_and_decision_no" checked>
                                <label class="form-check-label" for="transparent_action_and_decision_no">
                                    No
                                </label>
                            </div>

                            @error('transparent_action_and_decision')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="qset">
                            <h6>Please share any suggestions or feedback for your Ward Commissioner:</h6>
                            <div>
                                <textarea class="form-control" wire:model.lazy='suggestions' name="suggestions" id="suggestions" rows="3"
                                    placeholder="Write your feedback"></textarea>
                            </div>

                            @error('suggestions')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="p-3 text-right">
                            <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                                    class="fa fa-angle-double-left"></i>
                                Previous
                            </button>
                            <button type="button" class="btn btn-primary" wire:click='nextStep()'>Next <i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Step 3 --}}
            @if ($currentStep == 3)
                <div>
                    <div class="card-header">Development & Infrastructure</div>
                    <div class="p-0 card-body">
                        <div class="qset">
                            <h6>Rate the current status of the following services in your ward:</h6>
                            <div class="mb-2"><strong>a. Roads and Pavements</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='roads_pavements' value="Excellent"
                                    type="radio" name="roads_pavements" id="roads_pavements_excellent">
                                <label class="form-check-label" for="roads_pavements_excellent">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='roads_pavements' value="Good"
                                    type="radio" name="roads_pavements" id="roads_pavements_good" checked>
                                <label class="form-check-label" for="roads_pavements_good">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='roads_pavements' value="Average"
                                    type="radio" name="roads_pavements" id="roads_pavements_average">
                                <label class="form-check-label" for="roads_pavements_average">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='roads_pavements' value="Poor"
                                    type="radio" name="roads_pavements" id="roads_pavements_poor" checked>
                                <label class="form-check-label" for="roads_pavements_poor">
                                    Poor
                                </label>
                            </div>

                            @error('roads_pavements')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 mb-2"><strong>b. Drainage System</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='drainage_system' value="Excellent"
                                    type="radio" name="drainage_system" id="drainage_system_excellent">
                                <label class="form-check-label" for="drainage_system_excellent">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='drainage_system' value="Good"
                                    type="radio" name="drainage_system" id="drainage_system_good" checked>
                                <label class="form-check-label" for="drainage_system_good">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='drainage_system' value="Average"
                                    type="radio" name="drainage_system" id="drainage_system_average">
                                <label class="form-check-label" for="drainage_system_average">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='drainage_system' value="Poor"
                                    type="radio" name="drainage_system" id="drainage_system_poor" checked>
                                <label class="form-check-label" for="drainage_system_poor">
                                    Poor
                                </label>
                            </div>
                            @error('drainage_system')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 mb-2"><strong>c. Waste Management</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='waste_management' value="Excellent"
                                    type="radio" name="waste_management" id="waste_management_excellent">
                                <label class="form-check-label" for="waste_management_excellent">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='waste_management' value="Good"
                                    type="radio" name="waste_management" id="waste_management_good" checked>
                                <label class="form-check-label" for="waste_management_good">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='waste_management' value="Average"
                                    type="radio" name="waste_management" id="waste_management_average">
                                <label class="form-check-label" for="waste_management_average">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='waste_management' value="Poor"
                                    type="radio" name="waste_management" id="waste_management_poor" checked>
                                <label class="form-check-label" for="waste_management_poor">
                                    Poor
                                </label>
                            </div>
                            @error('waste_management')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 mb-2"><strong>d. Street Lighting</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='street_lighting' value="Excellent"
                                    type="radio" name="street_lighting" id="street_lighting_excellent">
                                <label class="form-check-label" for="street_lighting_excellent">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='street_lighting' value="Good"
                                    type="radio" name="street_lighting" id="street_lighting_good" checked>
                                <label class="form-check-label" for="street_lighting_good">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='street_lighting' value="Average"
                                    type="radio" name="street_lighting" id="street_lighting_average">
                                <label class="form-check-label" for="street_lighting_average">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='street_lighting' value="Poor"
                                    type="radio" name="street_lighting" id="street_lighting_poor" checked>
                                <label class="form-check-label" for="street_lighting_poor">
                                    Poor
                                </label>
                            </div>

                            @error('street_lighting')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-4 mb-2"><strong>e. Parks and Public Spaces</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='parks_public_spaces'
                                    value="Excellent" type="radio" name="parks_public_spaces"
                                    id="parks_public_spaces_excellent">
                                <label class="form-check-label" for="parks_public_spaces_excellent">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='parks_public_spaces' value="Good"
                                    type="radio" name="parks_public_spaces" id="parks_public_spaces_good" checked>
                                <label class="form-check-label" for="parks_public_spaces_good">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='parks_public_spaces' value="Average"
                                    type="radio" name="parks_public_spaces" id="parks_public_spaces_average">
                                <label class="form-check-label" for="parks_public_spaces_average">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='parks_public_spaces' value="Poor"
                                    type="radio" name="parks_public_spaces" id="parks_public_spaces_poor" checked>
                                <label class="form-check-label" for="parks_public_spaces_poor">
                                    Poor
                                </label>
                            </div>

                            @error('parks_public_spaces')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="qset">
                            <h6>Are sanitation and water supply services adequate in your ward?</h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='sanitation_water_supply_adequate'
                                    value="Yes" type="radio" name="sanitation_water_supply_adequate"
                                    id="sanitation_water_supply_adequate_yes">
                                <label class="form-check-label" for="sanitation_water_supply_adequate_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='sanitation_water_supply_adequate'
                                    value="No" type="radio" name="sanitation_water_supply_adequate"
                                    id="sanitation_water_supply_adequate_no" checked>
                                <label class="form-check-label" for="sanitation_water_supply_adequate_no">
                                    No
                                </label>
                            </div>

                            @error('sanitation_water_supply_adequate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="qset">
                            <h6>Do you feel safe in your ward (e.g., security, street lighting)?</h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='feel_safe' value="Yes"
                                    type="radio" name="feel_safe" id="feel_safe_yes">
                                <label class="form-check-label" for="feel_safe_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='feel_safe' value="No"
                                    type="radio" name="feel_safe" id="feel_safe_no" checked>
                                <label class="form-check-label" for="feel_safe_no">
                                    No
                                </label>
                            </div>

                            @error('feel_safe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                        <div class="qset">
                            <h6>Do you think the ward is environmentally sustainable (e.g., green spaces, waste
                                segregation)?</h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='environmentally_sustainable'
                                    value="Yes" type="radio" name="environmentally_sustainable"
                                    id="environmentally_sustainable_yes">
                                <label class="form-check-label" for="environmentally_sustainable_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='environmentally_sustainable'
                                    value="No" type="radio" name="environmentally_sustainable"
                                    id="environmentally_sustainable_no" checked>
                                <label class="form-check-label" for="environmentally_sustainable_no">
                                    No
                                </label>
                            </div>

                            @error('environmentally_sustainable')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="p-3 text-right">
                            <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                                    class="fa fa-angle-double-left"></i>
                                Previous
                            </button>
                            <button type="button" class="btn btn-primary" wire:click='nextStep()'>Next <i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>

                    </div>

                </div>
            @endif

            {{-- Step 4 --}}

            @if ($currentStep == 4)
                <div>
                    <div class="card-header">Community Engagement</div>
                    <div class="p-0 card-body">
                        <div class="qset">
                            <h6>Have you attended any meetings, drives, or events organized by the Ward
                                Commissioner?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='attended_meeting_drive_event'
                                    value="Yes" type="radio" name="attended_meeting_drive_event"
                                    id="attended_meeting_drive_event_yes">
                                <label class="form-check-label" for="attended_meeting_drive_event_yes">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='attended_meeting_drive_event'
                                    value="No" type="radio" name="attended_meeting_drive_event"
                                    id="attended_meeting_drive_event_no" checked>
                                <label class="form-check-label" for="attended_meeting_drive_event_no">
                                    No
                                </label>
                            </div>

                            @error('attended_meeting_drive_event')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="qset">
                            <h6>Do you think citizens’ opinions are considered in the ward’s development plans?</h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='opinions_considered_dev_plans'
                                    value="Always" type="radio" name="opinions_considered_dev_plans"
                                    id="opinions_considered_dev_plans_always">
                                <label class="form-check-label" for="opinions_considered_dev_plans_always">
                                    Always
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='opinions_considered_dev_plans'
                                    value="Sometimes" type="radio" name="opinions_considered_dev_plans"
                                    id="opinions_considered_dev_plans_sometimes" checked>
                                <label class="form-check-label" for="opinions_considered_dev_plans_sometimes">
                                    Sometimes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='opinions_considered_dev_plans'
                                    value="Rarely" type="radio" name="opinions_considered_dev_plans"
                                    id="opinions_considered_dev_plans_rarely">
                                <label class="form-check-label" for="opinions_considered_dev_plans_rarely">
                                    Rarely
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='opinions_considered_dev_plans'
                                    value="Never" type="radio" name="opinions_considered_dev_plans"
                                    id="opinions_considered_dev_plans_never" checked>
                                <label class="form-check-label" for="opinions_considered_dev_plans_never">
                                    Never
                                </label>
                            </div>

                            @error('opinions_considered_dev_plans')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="qset">
                            <h6>How would you rate overall communication between citizens and the municipality?</h6>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='communication_citizens_municipality'
                                    value="Excellent" type="radio" name="communication_citizens_municipality"
                                    id="communication_citizens_municipality_excellent">
                                <label class="form-check-label" for="communication_citizens_municipality_excellent">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='communication_citizens_municipality'
                                    value="Good" type="radio" name="communication_citizens_municipality"
                                    id="communication_citizens_municipality_good" checked>
                                <label class="form-check-label" for="communication_citizens_municipality_good">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='communication_citizens_municipality'
                                    value="Average" type="radio" name="communication_citizens_municipality"
                                    id="communication_citizens_municipality_average">
                                <label class="form-check-label" for="communication_citizens_municipality_average">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" wire:model.lazy='communication_citizens_municipality'
                                    value="Poor" type="radio" name="communication_citizens_municipality"
                                    id="communication_citizens_municipality_poor" checked>
                                <label class="form-check-label" for="communication_citizens_municipality_poor">
                                    Poor
                                </label>
                            </div>

                            @error('communication_citizens_municipality')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="p-3 text-right">
                            <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                                    class="fa fa-angle-double-left"></i>
                                Previous
                            </button>
                            <button type="button" class="btn btn-primary" wire:click='nextStep()'>Next <i
                                    class="fa fa-angle-double-right"></i></button>
                        </div>


                    </div>
                </div>
            @endif

            {{-- Step 5 --}}
            @if ($currentStep == 5)
                <div>
                    <div class="card-header">Suggestions and Additional Feedback</div>
                    <div class="p-0 card-body">
                        <div class="qset">
                            <h6>What are the three most critical issues you feel need immediate attention in your
                                ward?
                            </h6>
                            {{-- <div class="mb-2 inputrow">
                                <input type="text" class="form-control" id="feedback"
                                    placeholder="Write your issue" wire:model.lazy='most_critical_issues'>
                            </div> --}}
                            @foreach ($most_critical_issues as $key => $value)
                                <div class="mb-2 inputrow">
                                    <input type="text" class="form-control"
                                        name="most_critical_issues{{ $key }}"
                                        wire:model.lazy='most_critical_issues.{{ $key }}'
                                        placeholder="Write your issue" id="feedback">
                                </div>

                                {{-- {{ var_dump($errors) }} --}}
                                @if ($errors->has('most_critical_issues.*'))
                                    <span
                                        class="text-danger">{{ $errors->first('most_critical_issues.' . $key) }}</span>
                                @endif


                                @if ($key > 0)
                                    <div>
                                        <a class="addfld text-danger" wire:click='removeIssue({{ $key }})'>-
                                            Remove</a>
                                    </div>
                                @endif
                            @endforeach



                            <div class="text-right">
                                @if ($key >= 0 && $key < 2)
                                    <div wire:ignore>
                                        <a class="addfld" wire:click='addIssue()'>+
                                            Add more</a>
                                    </div>
                                @endif

                            </div>



                        </div>
                        <div class="qset">
                            <h6>Any additional feedback or suggestions for the Ward Commissioner or Municipality
                            </h6>
                            <div>
                                <textarea class="form-control" name="additional_suggestions" id="additional_suggestions" rows="4"
                                    placeholder="Write your feedback" wire:model.lazy='additional_suggestions'></textarea>
                            </div>

                            @error('additional_suggestions')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="p-3 text-right">
                            <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                                    class="fa fa-angle-double-left"></i>
                                Previous
                            </button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            @endif

        </div>


    </form>
</div>
