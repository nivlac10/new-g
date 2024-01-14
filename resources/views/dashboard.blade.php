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
                <div class="card-header card-active">
                    <i class="fas fa-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Dashboard') }}
                </div>
                <!-- Sidebar Links -->
                <div class="list-group list-group-flush">
                    <a href="/projects" class="list-group-item list-group-item-action">
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
        <div class="col-md-9">
            <div class="card">
                <div class="row card-body">
                    <div class="col-md-6 col-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-left">
                                        <h5 class="card-title" style="font-weight:bold;">Account Status</h5>
                                        @if (auth()->check() && auth()->user()->package >= 1)
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('/img/verified.png') }}" alt="Profile Image" class="img-fluid" style="width:20px;">
                                            <span class="ml-2" style="margin-left:5px;">Verified</span>
                                        </div>
                                        @else 
                                        <p class="card-text">Unverified</p>
                                        @endif
                                    </div>
                                    <i class="fas fa-user fa-2x" style="font-size:32px; margin-right:2px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card text-center mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-left">
                                        <h5 class="card-title" style="font-weight:bold;">Admin Level</h5>
                                        <p class="card-text" style="text-align: left !important;">
                                            @if (auth()->user()->package === 0 || auth()->user()->package === null)
                                                New Admin
                                            @elseif (auth()->user()->is_demo == 1)
                                                Top Rated
                                            @elseif (auth()->user()->package >= 3)
                                                Level 2
                                            @else
                                                Level {{ auth()->user()->package }}
                                            @endif
                                        </p>
                                    </div>
                                    <i class="fas fa-trophy fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="card text-black">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-left">
                                    <h5 class="card-title" style="font-weight:bold;">Project Status</h5>
                                    @if(auth()->user()->level !== null && auth()->user()->is_demo === 0 && auth()->user()->level <= 10)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: {{ $taskNumber->task_name }}</p>
                                        <p class="card-text" style="text-align: left !important;">Task Completed: {{ auth()->user()->level }}/10</p>
                                    @elseif(auth()->user()->is_demo === 1) 
                                        <p class="card-text" style="text-align: left !important; margin-bottom:0 !important;">Project Number: {{ $taskNumber->task_name }}</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: {{ auth()->user()->level - 34 }}/10
                                        </p>
                                    @elseif(auth()->user()->level !== null &&  auth()->user()->is_demo === 0 && auth()->user()->level >= 10 && auth()->user()->level <= 20)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: {{ $taskNumber->task_name }}</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: {{ auth()->user()->level - 10 }}/10
                                        </p>
                                    @elseif(auth()->user()->level !== null &&  auth()->user()->is_demo === 0 && auth()->user()->level >= 20 && auth()->user()->level <= 30)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: {{ $taskNumber->task_name }}</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: {{ auth()->user()->level - 20 }}/10
                                        </p>
                                    @elseif(auth()->user()->level == null &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned')
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: {{ $taskNumber->task_name }}</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 0/10
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 45 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 1)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 10/12
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 46 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 1)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 11/12
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 47 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 1)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 12/13
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 48 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 1)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 13/13
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 48 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 2)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 10/12
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 49 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 2)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 11/12
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 50 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 2)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 12/13
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 51 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 2)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 13/13
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 51 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 3)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 10/12
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 52 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 3)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 11/12
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 53 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 3)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 12/12
                                        </p>
                                    @elseif(auth()->user()->level + 1 == 54 &&  auth()->user()->is_demo === 0 && auth()->user()->project_status == 'assigned' && auth()->user()->replacement == 3)
                                        <p class="card-text" style="text-align: left !important; margin-bottom:5px !important;">Project Number: #JCO12M1P8220</p>
                                        <p class="card-text" style="text-align: left !important;">
                                            Task Completed: 13/13
                                        </p>
                                    @else
                                        <p class="card-text" style="text-align: left !important;">Project Number: No Projects Assigned</p>
                                    @endif
                                    </div>
                                    <i class="fas fa-list-check fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-12" style="padding-top:15px;">
                        <div class="card text-center">  
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-left">
                                        <h5 class="card-title" style="font-weight:bold;">JobCraft Credit</h5>
                                        <p class="card-text" style="text-align: left !important;">SGD {{ number_format(auth()->user()->balance ?? 0.00, 2) }}</p>
                                    </div>
                                    <i class="fas fa-wallet fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12" style="padding-top:15px;">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="text-left">
                                    @php
                                        $withdrawable = auth()->user()->withdrawable ?: 0.00;
                                    @endphp
                                    
                                    <h5 class="card-title" style="font-weight:bold;">Balance Available for Withdrawal</h5>
                                    <p class="card-text" style="text-align: left !important;">SGD {{ number_format($withdrawable, 2) }}</p>

                                    </div>
                                    <i class="fas fa-wallet fa-2x"></i>
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
