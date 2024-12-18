<div>
    <h4 class="heading-l">Citizen Feedback</h4>

    <form wire:submit.prevent="save">

        <div class="card" style="max-width: 600px; margin: auto">

            {{-- Step 1 --}}
            @if ($currentStep == 1)
                <div class="">
                    <div class="card-header d-flex align-items-center gap-3">Select preferred language <select
                            class="form-select form-select-sm display-inline w-auto" id="wn">
                            <option value="1">English</option>
                            <option value="2">বাংলা</option>
                            <option value="3">অসমীয়া</option>
                        </select>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="wn" class="form-label">Ward No.:<span class="redtxt">*</span></label>
                            <select class="form-select" id="wn">
                                <option selected disabled>Select word no.</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name: <span class="redtxt">*</span></label>
                            <input type="type" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:<span class="redtxt">*</span></label>
                            <input type="type" class="form-control" id="address">
                        </div>
                        <div class="mb-3">
                            <label for="ph" class="form-label">Phone No.:<span class="redtxt">*</span></label>
                            <input type="number" class="form-control" id="ph">
                        </div>


                    </div>
                </div>
            @endif

            {{-- Step 2 --}}
            @if ($currentStep == 2)
                <div class="">
                    <div class="card-header">Ward Commissioner Performance</div>
                    <div class="card-body p-0">

                        <div class="qset">
                            <h6>How satisfied are you with the accessibility of your Ward Commissioner?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optionone">
                                <label class="form-check-label" for="optionone">
                                    Very Satisfied
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optiontwo" checked>
                                <label class="form-check-label" for="optiontwo">
                                    Satisfied
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optionthree">
                                <label class="form-check-label" for="optionthree">
                                    Neutral
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optionfour" checked>
                                <label class="form-check-label" for="optionfour">
                                    Dissatisfied
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optionfive" checked>
                                <label class="form-check-label" for="optionfive">
                                    Very Dissatisfied
                                </label>
                            </div>
                        </div>
                        <div class="qset">
                            <h6>How do you rate the responsiveness of the Ward Commissioner to citizen grievances?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionsix">
                                <label class="form-check-label" for="optionsix">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionseven" checked>
                                <label class="form-check-label" for="optionseven">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optioneight">
                                <label class="form-check-label" for="optioneight">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionnine"
                                    checked>
                                <label class="form-check-label" for="optionnine">
                                    Poor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionten"
                                    checked>
                                <label class="form-check-label" for="optionten">
                                    Very Poor
                                </label>
                            </div>
                        </div>
                        <div class="qset">
                            <h6>Has the Ward Commissioner taken proactive steps to address key issues in your ward?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optioneleven">
                                <label class="form-check-label" for="optioneleven">
                                    Always
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optiontwelve"
                                    checked>
                                <label class="form-check-label" for="optiontwelve">
                                    Sometimes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optionthirteen">
                                <label class="form-check-label" for="optionthirteen">
                                    Rarely
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optionfourteen"
                                    checked>
                                <label class="form-check-label" for="optionfourteen">
                                    Never
                                </label>
                            </div>

                        </div>
                        <div class="qset">
                            <h6>Do you feel the Ward Commissioner is transparent in their actions and decisions?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option4" id="optionfifteen">
                                <label class="form-check-label" for="optionfifteen">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option4" id="optionsixteen"
                                    checked>
                                <label class="form-check-label" for="optionsixteen">
                                    No
                                </label>
                            </div>


                        </div>
                        <div class="qset">
                            <h6>Please share any suggestions or feedback for your Ward Commissioner:</h6>
                            <div>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write your feedback"></textarea>
                            </div>


                        </div>


                    </div>
                </div>
            @endif

            {{-- Step 3 --}}
            @if ($currentStep == 3)
                <div>
                    <div class="card-header">Development & Infrastructure</div>
                    <div class="card-body p-0">
                        <div class="qset">
                            <h6>Rate the current status of the following services in your ward:</h6>
                            <div class="mb-2"><strong>a. Roads and Pavements</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optionone">
                                <label class="form-check-label" for="optionone">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optiontwo"
                                    checked>
                                <label class="form-check-label" for="optiontwo">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optionthree">
                                <label class="form-check-label" for="optionthree">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optionfour"
                                    checked>
                                <label class="form-check-label" for="optionfour">
                                    Poor
                                </label>
                            </div>
                            <div class="mb-2 mt-4"><strong>b. Drainage System</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionsix">
                                <label class="form-check-label" for="optionsix">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionseven"
                                    checked>
                                <label class="form-check-label" for="optionseven">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optioneight">
                                <label class="form-check-label" for="optioneight">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionnine"
                                    checked>
                                <label class="form-check-label" for="optionnine">
                                    Poor
                                </label>
                            </div>
                            <div class="mb-2 mt-4"><strong>c. Waste Management</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionsix">
                                <label class="form-check-label" for="optionsix">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionseven"
                                    checked>
                                <label class="form-check-label" for="optionseven">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optioneight">
                                <label class="form-check-label" for="optioneight">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionnine"
                                    checked>
                                <label class="form-check-label" for="optionnine">
                                    Poor
                                </label>
                            </div>
                            <div class="mb-2 mt-4"><strong>d. Street Lighting</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionsix">
                                <label class="form-check-label" for="optionsix">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionseven"
                                    checked>
                                <label class="form-check-label" for="optionseven">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optioneight">
                                <label class="form-check-label" for="optioneight">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionnine"
                                    checked>
                                <label class="form-check-label" for="optionnine">
                                    Poor
                                </label>
                            </div>
                            <div class="mb-2 mt-4"><strong>e. Parks and Public Spaces</strong></div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionsix">
                                <label class="form-check-label" for="optionsix">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionseven"
                                    checked>
                                <label class="form-check-label" for="optionseven">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optioneight">
                                <label class="form-check-label" for="optioneight">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionnine"
                                    checked>
                                <label class="form-check-label" for="optionnine">
                                    Poor
                                </label>
                            </div>
                        </div>
                        <div class="qset">
                            <h6>Are sanitation and water supply services adequate in your ward?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionsix">
                                <label class="form-check-label" for="optionsix">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionseven"
                                    checked>
                                <label class="form-check-label" for="optionseven">
                                    No
                                </label>
                            </div>

                        </div>
                        <div class="qset">
                            <h6>Do you feel safe in your ward (e.g., security, street lighting)?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optioneleven">
                                <label class="form-check-label" for="optioneleven">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optiontwelve"
                                    checked>
                                <label class="form-check-label" for="optiontwelve">
                                    No
                                </label>
                            </div>


                        </div>
                        <div class="qset">
                            <h6>Do you think the ward is environmentally sustainable (e.g., green spaces, waste
                                segregation)?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option4" id="optionfifteen">
                                <label class="form-check-label" for="optionfifteen">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option4" id="optionsixteen"
                                    checked>
                                <label class="form-check-label" for="optionsixteen">
                                    No
                                </label>
                            </div>


                        </div>




                    </div>

                </div>
            @endif

            {{-- Step 4 --}}

            @if ($currentStep == 4)
                <div>
                    <div class="card-header">Community Engagement</div>
                    <div class="card-body p-0">
                        <div class="qset">
                            <h6>Have you attended any meetings, drives, or events organized by the Ward
                                Commissioner?
                            </h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optionone">
                                <label class="form-check-label" for="optionone">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="optiontwo"
                                    checked>
                                <label class="form-check-label" for="optiontwo">
                                    No
                                </label>
                            </div>

                        </div>
                        <div class="qset">
                            <h6>Do you think citizens’ opinions are considered in the ward’s development plans?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionsix">
                                <label class="form-check-label" for="optionsix">
                                    Always
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionseven"
                                    checked>
                                <label class="form-check-label" for="optionseven">
                                    Sometimes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optioneight">
                                <label class="form-check-label" for="optioneight">
                                    Rarely
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option2" id="optionnine"
                                    checked>
                                <label class="form-check-label" for="optionnine">
                                    Never
                                </label>
                            </div>

                        </div>
                        <div class="qset">
                            <h6>How would you rate overall communication between citizens and the municipality?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optioneleven">
                                <label class="form-check-label" for="optioneleven">
                                    Excellent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optiontwelve"
                                    checked>
                                <label class="form-check-label" for="optiontwelve">
                                    Good
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optionthirteen">
                                <label class="form-check-label" for="optionthirteen">
                                    Average
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option3" id="optionfourteen"
                                    checked>
                                <label class="form-check-label" for="optionfourteen">
                                    Poor
                                </label>
                            </div>

                        </div>




                    </div>
                </div>
            @endif

            {{-- Step 5 --}}
            @if ($currentStep == 5)
                <div>
                    <div class="card-header">Suggestions and Additional Feedback</div>
                    <div class="card-body p-0">
                        <div class="qset">
                            <h6>What are the three most critical issues you feel need immediate attention in your
                                ward?
                            </h6>
                            <div class="mb-2 inputrow">
                                <input type="email" class="form-control" id="feedback"
                                    placeholder="Write your issue">
                            </div>
                            @foreach ($issues as $key => $value)
                                <div class="mb-2 inputrow">
                                    <input type="email" class="form-control" id="feedback"
                                        placeholder="Write your issue">
                                </div>
                            @endforeach



                            <div class="text-right">
                                @if ($iCounter < $totaliCounter)
                                    <div>
                                        <a class="addfld" wire:click='addIssue({{ $iCounter }})'>+
                                            Add more</a>
                                    </div>
                                @endif

                                @if ($iCounter > 1)
                                    <div>
                                        <a class="addfld text-danger" wire:click='removeIssue()'>-
                                            Remove</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="qset">
                            <h6>Any additional feedback or suggestions for the Ward Commissioner or Municipality
                            </h6>
                            <div>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Write your feedback"></textarea>
                            </div>

                        </div>
                    </div>
            @endif



            <div class="text-right p-3">
                @if ($currentStep > 1)
                    <button type="button" class="btn btn-light" wire:click='previousStep()'><i
                            class="fa fa-angle-double-left"></i>
                        Previous
                    </button>
                @endif

                @if ($currentStep < 5)
                    <button type="button" class="btn btn-primary" wire:click='nextStep()'>Next <i
                            class="fa fa-angle-double-right"></i></button>
                @endif

                @if ($currentStep == 5)
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif

            </div>
        </div>


    </form>
</div>
