@extends('layouts.app')

@section('content')
<main style="display: flex;">
    
    <div class="application-section" style="display: flex; flex-direction: column; justify-content: center;">
        <div class="card" style="border:none !important; background-color:white;">
            <div class="card-body application-card" style="background-color:#f4f4f4 !important; border:none !important;">
            <h2 style="padding:5px; margin:10px; text-align:center; font-weight:bold;">JobCraft Application Form</h2>
            <hr>
            <div class="container" style="display:block; margin-left:auto; margin-right:auto; padding:15px;">
                <style>
                    /* Style for the list items */
                    ul {
                        list-style-type: disc; /* Use 'disc' for filled circle bullets */
                    }
                </style>
                <h3 style="font-weight:bold;">Job Descriptions:</h3>
                <ul>
                    <li>Perform daily data entry duties and depot operation activities</li>
                    <li>Generate positive reviews and ratings for clients to receive incentives</li>
                    <li>Compile, verify accuracy, and sort information according to priorities for data entry</li>
                    <li>Comply with data integrity and security policies</li>
                    <li>Performance-based payroll system will be offered with daily payout withdrawal</li>
                    <li>Job training and development will be provided</li>
                </ul>

                <h3 style="font-weight:bold;">Job Requirements:</h3>
                <ul>
                    <li>Complete projects daily and stay active on the platform</li>
                    <li>Knowledgeable in data entry program</li>
                    <li>Proficient communication and writing skills, skilled in crafting positive reviews</li>
                    <li>Having a strong team spirit, able to keep the data information confidential</li>
                    <li>Maintain punctuality and be able to deliver projects before the timeline</li>
                </ul>

                <h3 style="font-weight:bold;">Remote Working Requirements:</h3>
                <ul>
                    <li>Stable and high-speed internet connection</li>
                    <li>Decent working space at home</li>
                    <li>Mobile device or computer</li>
                </ul>
                <form action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3 d-flex align-items-center">
                                <input class="form-check-input me-2" type="checkbox" name="agree" id="remember" required>
                                <label class="form-check-label flex-grow-1" for="agree" style="font-size:12px;">
                                    {{ __('I have read and understand the requirements.') }}<span style="color:red">*</span>
                                </label>
                                <button type="submit" class="btn btn-primary" style="width:20% !important; background-color:#00AF68 !important; border:#00AF68; font-size:16px;">
                                    {{ __('Next') }}
                                </button>
                            </div>
                </form>
            </div>
                
            </div>
        </div>
    </div>
</main>
@endsection
