@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card text-center">
            <div class="card-body">
                    <div class="container" style="text-align: right;">
                        <div class="online-indicator" style="
                            display: inline-block;
                            border: 1px solid green;
                            padding: 2px 5px;
                            border-radius: 5px;
                            font-weight: bold;
                            color: green;">&#8226; Online </div>
                    </div>
                    <img src="{{ asset('/img/green-border-profile.png') }}" alt="Profile Image" class="img-fluid rounded-circle mb-3 mx-auto" style="width: 50px;">
                    <p class="card-title" style="margin:0; font-weight:bold;">
                    @if(auth()->user()->id == 1)
                        AW21755
                    @elseif(auth()->user()->id == 2)
                        AW21766
                    @elseif(auth()->user()->id > 99)
                        AW20{{ auth()->user()->id }}
                    @else
                        AW200{{ auth()->user()->id }}
                    @endif
                    </p>
                    @php
                        $package = auth()->user()->package;
                        $badgeColor = '';

                        switch ($package) {
                            case 1:
                                $badgeColor = '#F0C19B';
                                break;
                            case 2:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 3:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 3:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 4:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 5:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 6:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 7:
                                $badgeColor = '#7C4DAA';
                                break;
                            default:
                                // Handle other cases if needed
                                $badgeColor = '#BCBABA';
                                break;
                        }
                    @endphp
                    @if(auth()->user()->is_demo == 0)
                        <span class="badge badge-success" style="background-color:{{ $badgeColor }}; color:white;">
                    @else
                        <span class="badge badge-success" style="background-color:#F7CB45; color:white;">
                    @endif
                        @if (auth()->user()->package === 0 || auth()->user()->package === null)
                            New Admin
                        @elseif (auth()->user()->is_demo == 1)
                            Top Rated
                        @elseif (auth()->user()->package >= 3)
                            Level 2
                        @else
                            Level {{ auth()->user()->package }}
                        @endif
                    </span>

                    <p class="card-title" >{{ auth()->user()->email }}</p>
                    @if (auth()->user()->balance == null)
                    <p class="card-title credit-card" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold; border:1px solid green; ">Credit: SGD 0.00</p>
                    @else
                    <p class="card-title credit-card" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold;  border:1px solid green;">Credit: SGD {{ number_format(auth()->user()->balance, 2) }}</p>
                    @endif
                    @if (auth()->user()->withdrawable == null)
                    <p class="card-title" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold;">Balance Available for Withdrawal: SGD 0.00</p>
                    @else
                    <p class="card-title" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold;">Balance Available for Withdrawal: SGD {{ number_format(auth()->user()->withdrawable, 2) }}</p>
                    @endif
                </div>
            </div>
            <!-- Left Sidebar Card -->
            <div class="card hide-on-mobile">
                
                <!-- Card Header Links -->
                <div class="card-header">
                    <a href="/dashboard" class="list-group-item list-group-item-action">
                        <i class="fas fa-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Dashboard') }}
                    </a>
                </div>
                <!-- Sidebar Links -->
                <div class="list-group list-group-flush">
                    <a href="/projects" class="list-group-item list-group-item-action card-active">
                        <i class="fas fa-clipboard fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Start a Project') }}
                    </a>
                    <a href="/tasks" class="list-group-item list-group-item-action">
                        <i class="fas fa-file fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Current Project Tasks') }}
                    </a>
                    <a href="/achievements" class="list-group-item list-group-item-action">
                        <i class="fas fa-trophy fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Achievement Reward') }}
                    </a>
                    <a href="/deposit" class="list-group-item list-group-item-action">
                        <i class="fas fa-credit-card fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Deposit') }}
                    </a>
                    <a href="/withdrawal" class="list-group-item list-group-item-action">
                        <i class="fas fa-building-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Withdraw') }}
                    </a>
                    <a href="/earnings" class="list-group-item list-group-item-action ">
                        <i class="fas fa-money-bill-trend-up fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Earning History') }}
                    </a>
                    <a class="list-group-item list-group-item-action" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-2" style="margin-right:5px;"></i> {{ __('Logout') }}
                    </a>
                </div>
            </div>
        </div>
        <style>
    .package-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin: 10px;
        background-color: #fff;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
    }

    .package-card-header {
        background-color: #00AF68;
        color: #fff;
        padding: 10px;
        border-radius: 8px 8px 0 0;
    }

    .package-title {
        margin: 0;
        font-size: 20px;
        font-weight: bold;
    }

    .package-details {
        margin-top: 15px;
    }

    .package-price {
        font-size: 18px;
        font-weight: bold;
        color: #00AF68;
    }

    .buy-button {
        margin-top: 15px;
        display: flex;
        justify-content: center;
    }

    .buy-button a {
        background-color: #00AF68;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .buy-button a:hover {
        background-color: #007F46;
    }

    .warning-message {
        color: #FFC107;
        font-weight: bold;
        text-align: center;
        margin-top: 15px;
    }

    .danger-message {
        color: #FF5722;
        font-weight: bold;
        text-align: center;
        margin-top: 15px;
    }
</style>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h2 class="card-title text-center">Start a Project</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        <!-- Add JavaScript to trigger the alert -->
                        <script>
                            // Use JavaScript to show an alert with the success message
                            alert("{{ session('success') }}");
                            window.location.href = '{{ route('task.index') }}';

                        </script>
                    @endif
                    @if ($errors->has('project_status'))


                        <div class="error-messages alert alert-danger">
                            {{ $errors->first('project_status') }}
                        </div>
                    @endif
                    <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <img src="{{ asset('img/1st-section.png') }}" alt="Image 1" style="width:75%; height:75%; display:block; margin-left:auto; margin-right:auto;">
                            <h5>Ready To Begin Earning Through Writing Projects?</h5>
                            </div>
                        </div>
                        
                        <!-- Add any additional content or text here -->
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <img src="{{ asset('img/2nd-section.png') }}" alt="Image 2" style="width:75%; height:75%; display:block; margin-left:auto; margin-right:auto;">
                            <form method="POST" action="{{ route('task.assignProject') }}">
                                @csrf <!-- Add CSRF token field -->
                                <input type="hidden" name="_method" value="POST"> <!-- Add this hidden field for Laravel to recognize it as a POST request -->
                                <br>
                                <input placeholder="Account ID" class="form-control" required><br>
                                <input type="radio"> By accepting the Terms & Conditions, you agree to the following:
                                <ol style="padding:1px;">
                                    <li>1. Each project must be completed within 50 minutes.</li>
                                    <li>2. Ensure each task is finished within 5 minutes to prevent task expiration.</li>
                                    <li>3. Reviews must be original and not infringe on third-party copyrights.</li>
                                    <!-- Add more list items as needed -->
                                </ol>
                                @if(auth()->user()->project_status === 'assigned')
                                    <p class="alert alert-warning" style="background-color:#EB4025 !important; color:white;">Kindly complete your current project before requesting a new one.</p>
                                    <button style="width:100%;" class="btn btn-success" style="background-color:#53B66C" disabled>Request Project</button>
                                    
                                @elseif(auth()->user()->balance < 90)
                                    <p class="alert alert-warning">Credit Required to Start a Project : SGD 90.00</p>
                                    <button style="width:100%;" class="btn btn-success" style="background-color:#53B66C" disabled>Request Project</button>
                                @else
                                    <button style="width:100%;" class="btn btn-success" style="background-color:#53B66C">Request Project</button>
                                @endif
                            </form>

                            <i style="padding:15px; text-align:center;"><span style="font-weight:bold;">Note:</span> Your tasks are located under 'Current Project Tasks.' Kindly proceed to this section to initiate your project.</i>
                            
                            </div>
                            
                        </div>
                        
                        <!-- Add any additional content or text here -->
                        
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    td{
        padding: 5px  10px !important;
    }
</style>
<script type="text/javascript">
    function assignProject(route) {
        // Create a new XHR object
        var xhr = new XMLHttpRequest();
        var redirectUrl = '/tasks';


        // Configure the request
        xhr.open('POST', route, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include the CSRF token
        xhr.setRequestHeader('Content-Type', 'application/json');

        // Set up the callback function for when the request is complete
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        // Optionally, you can show a success message or update the UI
                        alert('Project assigned successfully.');
                        // You may want to reload the page or update the UI as needed
                        window.location.href = redirectUrl;
                    } else {
                        // Handle the case where the assignment was not successful
                        alert('Project assignment failed.');
                    }
                } else {
                    // Handle errors or non-200 status codes here
                    console.error('XHR request failed with status ' + xhr.status);

                    // If the response contains errors, display them
                    var errorResponse = JSON.parse(xhr.responseText);
                    if (errorResponse && errorResponse.errors) {
                        // Assuming there's a div with the id "error-messages" in your HTML
                        var errorMessagesDiv = document.getElementById('error-messages');
                        if (errorMessagesDiv) {
                            errorMessagesDiv.innerHTML = '<div class="alert alert-danger">' + errorResponse.errors.project_status[0] + '</div>';
                        }
                    }
                }
            }
        };


        // Send the request (you can include additional data if needed)
        xhr.send(JSON.stringify({}));
    }
</script>
@endsection
