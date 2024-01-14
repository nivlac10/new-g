@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4" style="font-weight:bold; padding-top:25px;">Frequently Asked Questions (FAQs)</h1>

    <div class="accordion" id="faqAccordion" style="padding-bottom:55px;">

        <!-- Account Management Section -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size:24px; font-weight:bold;">
                    Account Management
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <strong style="font-size:18px;">1. Is my personal information safe?</strong>
                    <p>We care about your privacy. The Privacy Policy is part of our Terms of Service.</p>

                    <strong style="font-size:18px;">2. How do I change/reset my password?</strong>
                    <p>You can change or reset your password via settings.<br>
                    Log in > click on your profile icon located on the top right side > <span style="font-weight:bold;">Change Password</span>.</p>
                </div>
            </div>
        </div>

        <!-- Policy & Safety Section -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size:24px; font-weight:bold;">
                    Policy & Safety
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <strong style="font-size:18px;">1. Will you ever ask for my password?</strong>
                    <p>Customer Support will  <span style="font-weight:bold;">never</span> ask you for your password.</p>
                    <p style="padding-bottom:0 !important; margin-bottom:0px !important;">Here is what you need to know about your password and security:</p>
                    <ul style="list-style-type: disc; margin:0 !important; padding-bottom:0 !important;">
                        <li><span style="font-weight:bold;">Never give out your password</span></li>
                    </ul>
                    <ul>
                        <li>Now and again we may ask for a few things from you, but keep in mind:</li>
                        <li>- We will <span style="font-weight:bold;">never</span> ask you by email, messages, or comments to provide us with your password or sign-in credentials.</li>
                        <li>- We will <span style="font-weight:bold;">never</span> ask you to email us your password.</li>
                        <li>- We will <span style="font-weight:bold;">never</span> prompt you to log into a site outside of the JobCraft, nor to download and install an application.</li>
                        <li>- Please <span style="font-weight:bold;">never</span> download or run such applications, since JobCraft will <span style="font-weight:bold;">never</span> send these.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="font-size:24px; font-weight:bold;">
                    Access Writing Tasks Project
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <strong style="font-size:18px;">1. How do I request a project?</strong>
                    <p>Go to <span style="font-weight:bold;">Start A Project</span> > Enter your <span style="font-weight:bold;">Account ID</span> > Submit <span style="font-weight:bold;">Request</span>. Upon request submission, the writing tasks will automatically appear on the <span style="font-weight:bold;">Current Project Tasks</span>.</p>

                    <strong style="font-size:18px;">2. Am I allowed to request a new project while current project is ongoing?</strong>
                    <p>You are <span style="font-weight:bold;">not allowed</span> to request a new project while your current project is ongoing due to <span style="font-weight:bold;">JobCraft system guidelines</span>.</p>

                    <strong style="font-size:18px;">3. What's the suggested completion time for a project?</strong>
                    <p>The suggested completion time for a project is <span style="font-weight:bold;">within 50 minutes</span>.</p>

                    <strong style="font-size:18px;">4. Where can I obtain the earning invoice after completing a project?</strong>
                    <p>Upon project completion, you will receive an earning invoice via <span style="font-weight:bold;">email</span> from the JobCraft career team.</p>
                </div>
            </div>
        </div>

        <!-- Achievement Reward Section -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="font-size:24px; font-weight:bold;">
                    Achievement Reward
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <strong style="font-size:18px;">1. How can I redeem an achievement reward?</strong>
                    <p>Once you've reached the achievement goal, go to <span style="font-weight:bold;">Achievement Reward</span> > <span style="font-weight:bold;">Redeem</span>. Upon redemption, the achievement will be automatically added to your JobCraft credit.</p>
                </div>
            </div>
        </div>

        <!-- Deposit Section -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="font-size:24px; font-weight:bold;">
                    Deposit
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <strong style="font-size:18px;">1. How do I deposit funds into my account?</strong>
                    <p>Go to <span style="font-weight:bold;">Deposit</span> > Make transaction to the <span style="font-weight:bold;">Merchant's bank account</span> > Enter the <span style="font-weight:bold;">correct amount</span> > Upload your <span style="font-weight:bold;">transaction receipt > Submit</span>. Once submitted, the JobCraft credit will be automatically added to your account <span style="font-weight:bold;">within 5 minutes.</span></p>

                    <strong style="font-size:18px;">2. Why is deposit required?</strong>
                    <p>Admins are <span style="font-weight:bold;">required to deposit</span> as JobCraft credit <span style="font-weight:bold;">before starting a project</span> to safeguard the interests of both parties and to ensure your commitment to completing the assigned projects.</p>

                    <strong style="font-size:18px;">3. Can the deposit be withdrawn?</strong>
                    <p>Certainly. You can <span style="font-weight:bold;">withdraw both your deposit and earnings</span> upon <span style="font-weight:bold;">project completion</span>. This means the funds will not be deducted; instead, they will be held in your account as JobCraft credit.</p>
                </div>
            </div>
        </div>

        <!-- Withdraw Section -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="font-size:24px; font-weight:bold;">
                    Withdraw
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <strong style="font-size:18px;">1. How do I withdraw both my deposit and earnings after project completion?</strong>
                    <p>Go to <span style="font-weight:bold;">Withdraw</span> > Enter <span style="font-weight:bold;">Bank Name</span> > Enter your <span style="font-weight:bold;">Account/PayNow No.</span> > Tick the <span style="font-weight:bold;">Privacy Policy box > Submit</span>. Once submitted, the total amount in the <span style="font-weight:bold;">'Balance Available for Withdrawal'</span> will be automatically credited to your bank account <span style="font-weight:bold;">within 5 minutes</span>. <br> (Note: Withdrawals can only be made to the account holder's registered bank account for security.)</p>

                    <strong style="font-size:18px;">2. Am I able to withdraw funds while a project is ongoing?</strong>
                    <p>Withdrawals are <span style="font-weight:bold;">not permitted</span> while a <span style="font-weight:bold;">project is in progress</span>. Only administrators can <span style="font-weight:bold;">initiate a withdrawal once the project is completed</span>, in accordance with <span style="font-weight:bold;">JobCraft system guidelines.</span></p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
