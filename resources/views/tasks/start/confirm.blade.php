@extends('layouts.app')

@section('content')
<style>
    @media (max-width: 767px) { 
        .steps {
            font-size:12px;
        }
        .step-container {
            width:100% !important;
        }
    }
</style>
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
                    <a href="/projects" class="list-group-item list-group-item-action">
                        <i class="fas fa-clipboard fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Start a Project') }}
                    </a>
                    <a href="/tasks" class="list-group-item list-group-item-action card-active">
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
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-light">
                    <!-- Step Labels with Icons -->
                    <img src="/img/step-2.png" alt="Step Image" style="width: 100%; max-width: 100%;"/><br>
                    <div class="row">
                        <div class="col-md-8 hide-on-mobile">
                            <!-- Payment Selection -->
                            <h4 style="font-weight:bold;">Select Your Method</h4>
                            <form method="GET" action="{{ route('task.review',['id' => $task->id]) }}">
                                @csrf
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" readonly checked disabled>
                                    <label class="form-check-label" for="remember" style="text-align: left;">
                                        {{ __('JobCraft Credit') }}
                                    </label>
                                </div>
                                <div class="col-md-6 mb-2 col-6 hide-on-mobile d-flex justify-content-between align-items-end">
                                        <button type="button" class="btn btn-primary" style="background-color:#00AF68; border:#00AF68; width:30%; margin-top:380px;" onclick="goBack()">
                                            <i class="fas fa-arrow-left mr-2"></i> Back
                                        </button>
                                        <script>
                                            function goBack() {
                                                window.history.back(); // Go back to the previous page
                                            }
                                        </script>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Task Info Card -->
                            <div class="card">
                                <div class="card-header text-white" style="background-color:#00AF68; border:#00AF68;">
                                    Task Information
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset($task->img_url) }}" alt="Task Image"><br>
                                    <p class="card-title" style="font-weight:bold;">Project Number: <span style="font-weight:normal; color:green;">{{ $task->task_name }}</span></p>
                                    <p class="card-title" style="font-weight:bold;">Task Number: <span style="font-weight:normal;">{{ $task->task_description }}</span></p>
                                    <p class="card-title" style="font-weight:bold;">Amount: <span style="font-weight:normal;">SGD {{ number_format($task->required_amount, 2) }}</span></p>
                                    <p class="card-text" style="color:red;">The includes currency conversion fees.</p>
                                    <h5 class="hide-on-desktop" style="font-weight:bold;">Select Your Method</h5>
                                    <div class="form-check hide-on-desktop">
                                        <input class="form-check-input hide-on-desktop" type="checkbox" name="remember" id="remember" readonly checked disabled>
                                        <label class="form-check-label hide-on-desktop" for="remember" style="text-align: left;">
                                            {{ __('JobCraft Credit') }}
                                        </label>
                                    </div>
                                    <hr>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-2 col-6 hide-on-desktop">
                                        <button type="button" class="btn btn-primary" style="background-color:#00AF68; border:#00AF68; width:100%;" onclick="goBack()">
                                            <i class="fas fa-arrow-left mr-2"></i> Back
                                        </button>

                                        <script>
                                            function goBack() {
                                                window.history.back(); // Go back to the previous page
                                            }
                                        </script>

                                        </div>
                                        <div class="col-md-12 mb-2 col-6">
                                            <button type="submit" class="btn btn-primary" style="background-color:#00AF68; border:#00AF68; width:100%;">
                                                <i class="fas fa-hand-holding-usd mr-2"></i> Order with JobCraft Credit
                                            </button>
                                        </div>
                                    </div>

                                    </form>
                                    
                                    @if(session('error'))
                                        <div class="alert alert-danger mt-3">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @if(session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection