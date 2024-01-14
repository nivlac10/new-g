@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <!-- Sidebar Column -->
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
                    <a href="/tasks" class="list-group-item list-group-item-action">
                        <i class="fas fa-file fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Current Project Tasks') }}
                    </a>
                    <a href="/achievements" class="list-group-item list-group-item-action card-active">
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
        
        <!-- Main Content Column -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="font-size: 22px; font-weight: bold;">
                    Achievement Reward
                </div>
                <br>
                <style>
                    .achievement-inner {
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        text-align: center;
                        font-size:25px;
                        color: #4EAD5B; /* Text color for the inner div */
                    }
                    .achievement-inner p {
                        margin-bottom:0 ;
                    }

                    .achievement-card img {
                        width: 100%;
                        height: auto;
                    }

                    .achievement-card {
                        position: relative; /* Create a positioning context for absolute positioning */
                        overflow: hidden; /* Hide overflowing content */
                        margin-bottom: 20px; /* Add spacing between cards */
                    }
                    .special {
                        margin-top:-15px;
                    }
                    .progress-span {
                            text-align:right; 
                            float:right; 
                            position:absolute; 
                            right:50px; 
                            top:110px;
                    }
                    .unclaimed-inner {
                        position: absolute;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        text-align: center;
                        font-size:25px;
                        color: #4EAD5B; /* Text color for the inner div */
                    }
                    .unclaimed-inner p {
                        margin-bottom:0 ;
                    }

                    .unclaimed-card img {
                        width: 100%;
                        height: auto;
                    }

                    .unclaimed-card {
                        position: relative; /* Create a positioning context for absolute positioning */
                        overflow: hidden; /* Hide overflowing content */
                        margin-bottom: 20px; /* Add spacing between cards */
                    }
                    .un-special {
                        margin-top:0px;
                    }
                    .un-progress-span {
                            text-align:right; 
                            float:right; 
                            position:absolute; 
                            right:50px; 
                            top:110px;
                            margin-right:15px;
                    }
                    .un-progress-btn {
                            text-align:right; 
                            float:right; 
                            position:absolute; 
                            right:50px; 
                            top:110px;
                            margin-right:35px;
                    }
                    @media (max-width: 767px) {
                        .achievement-inner {
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            text-align: center;
                            font-size: 8px; /* Adjust the font size for better mobile display */
                            color: #4EAD5B; /* Text color for the inner div */
                        }

                        .achievement-inner p {
                            margin-bottom:0;
                        }
                        .special {
                            margin-top:-4px;
                        }

                        .achievement-card img {
                            width: 100%;
                            height: auto;
                        }

                        .achievement-card {
                            position: relative;
                            overflow: hidden;
                            margin-bottom: 20px;
                        }
                        .progress-span {
                            text-align:right; 
                            float:right; 
                            position:absolute; 
                            right:50px; 
                            top:60px;
                        }
                        .unclaimed-inner {
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            text-align: center;
                            font-size: 8px; /* Adjust the font size for better mobile display */
                            color: #4EAD5B; /* Text color for the inner div */
                        }

                        .unclaimed-inner p {
                            margin-bottom:0;
                        }
                        .un-special {
                            margin-top:4px;
                        }

                        .unclaimed-card img {
                            width: 100%;
                            height: auto;
                        }

                        .unclaimed-card {
                            position: relative;
                            overflow: hidden;
                            margin-bottom: 20px;
                        }
                        .un-progress-span {
                            text-align:right; 
                            float:right; 
                            position:absolute; 
                            right:28px; 
                            top:58px;
                            margin-left:20px;
                        }
                        .un-progress-btn {
                            text-align:right; 
                            float:right; 
                            position:absolute; 
                            right:50px; 
                            top:55px;
                            margin-left:20px;
                            margin-right:0;
                            font-size:6px;
                        }
                    }
                </style>

                
                @foreach ($achievements as $achievement)
                <div class="container" >
                    
                    @php
                    $user = auth()->user()->claimed_achievements;
                    @endphp
                        @if ($user >= $achievement->id)
                            <div class="p-4 rounded achievement-card">
                            @if($achievement->name == 'Complete 10 Tasks')
                            <img src="/img/achievement-1.png">
                            @elseif($achievement->name == 'Complete 3 Projects')
                            <img src="/img/achievement-2.png">
                            @elseif($achievement->name == 'Complete 50 Tasks')
                            <img src="/img/achievement-3.png">
                            @endif
                            <div class="achievement-inner">
                                <div class="inner-content">
                                    <p class="special" style="font-weight:bold;">SGD {{ $achievement->reward_amount }}<span class="progress-span">
                                        @if($achievement->name == 'Complete 10 Tasks')
                                        Progress: 10/10
                                        @elseif($achievement->name == 'Complete 3 Projects')
                                        Progress: 3/3
                                        @elseif($achievement->name == 'Complete 50 Tasks')
                                        Progress: 50/50
                                        @endif
                                    </span></p>
                                    @if($achievement->name == 'Complete 10 Tasks')
                                    <p style="width:1000px;">Completed 10 Tasks</p>
                                    @elseif($achievement->name == 'Complete 3 Projects')
                                    <p style="width:1000px; margin-bottom:-7px;">Completed 3 Projects</p>
                                    @elseif($achievement->name == 'Complete 50 Tasks')
                                    <p style="width:1000px;">Completed 50 Tasks</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="p-4 rounded unclaimed-card">
                            <img src="/img/locked.png">
                            <div class="unclaimed-inner">
                                <div class="inner-content">
                                    <p class="un-special" style="font-weight:bold; color:#595959;">SGD {{ $achievement->reward_amount }}
                                    @if (auth()->user()->level >= $achievement->required_count)
                                @php
                                    $claimedAchievements = explode(',', auth()->user()->claimed_achievements ?? '');
                                    $user = auth()->user()->claimed_achievements;
                                    $isAchievementClaimed = in_array($achievement->id, $claimedAchievements);
                                @endphp

                                @if ($user >= $achievement->id)
                                    Redeemed
                                @else
                                    <a href="{{ route('achievements.redeem', ['id' => $achievement->id]) }}" class="un-progress-btn btn btn-sm btn-success">Redeem</a>
                                @endif
                            @else
                                <span class="un-progress-span">Progress: 
                                    @if(auth()->user()->level == 0)
                                    Not started
                                    @else
                                    {{$comm }} / {{ $achievement->required_count }}
                                    @endif
                                </span>
                            @endif
                                    </p>
                                    <p style="width:1000px; color:#595959">{{ $achievement->name }}</p>
                                </div>
                            </div>
                        @endif
                        </div>
                </div>
                <br>
                @endforeach

                
            </div>
        </div>

    </div>
</div>
@endsection
