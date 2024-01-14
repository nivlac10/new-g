@extends('layouts.app')

@section('content')

<style>
    .mobile-success {
        display:block; 
        margin-left:auto; 
        margin-right:auto; 
        
    }
@media (max-width: 767px) { 
    .mobile-success {
        padding-left:none !important;
        padding-right:none !important;
    }
}
</style>
    <div class="application-section" style="display: flex; flex-direction: column; justify-content: center;">
        <div class="card" style="border:none !important;">
            <div class="card-body" style="background-color:#f4f4f4 !important; border:none !important;">
            <div class="container mobile-success" style="font-size:16px;">
                <p style="font-weight:bold; text-align:center;">
                    Your application has been received and will be reviewed by our team. We appreciate your interest in this opportunity to join our team and contribute growth to our company.
                </p>
                <p style="font-weight:bold; text-align:center;">
                    If your application meets our requirements, you will be contacted for next steps of the application process. Please keep an eye on your email inbox for any updates.
                </p>
                <p style="font-weight:bold; text-align:center;">
                    In the meantime, feel free to learn more about JobCraft and our mission to democratize freelance work by visiting our website.
                </p>
                <p style="font-weight:bold; text-align:center;">
                    Thank you again for your interest in joining JobCraft, and we wish you the best of luck with your application.
                </p>
                <a href="https://jcworkhub.tech"><img src="{{ asset('img/jobcraft.png') }}" class="jobcraft-logo" alt="Fiverr Logo Image" style="display:block; margin-left:auto !important; margin-right:auto !important; "></a>
            </div>
                
            </div>
        </div>
    </div>
@endsection
