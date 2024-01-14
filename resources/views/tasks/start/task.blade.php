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
                
                <img src="/img/step-1.png" alt="Step Image" style="width: 100%; max-width: 100%;"/>
                <img src="{{ asset($task->img_url) }}" alt="Task Image">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <p class="card-text mb-2" style="font-weight:bold;">
                                <i class="fas fa-file-alt mr-2"></i> Project Number: <span style="font-weight:normal; color:#53B66C; text-decoration:underline;">{{ $task->task_name }}</span>
                            </p>
                            <p class="card-text mb-2" style="font-weight:bold;">
                                <i class="fas fa-info-circle mr-2"></i> Task Number: <span style="font-weight:normal;">{{ $task->task_description }}</span>
                            </p>
                            <p class="card-text mb-2" style="font-weight:bold;">
                                <i class="fas fa-square-poll-horizontal mr-2"></i> Category: <span style="font-weight:normal; color:#53B66C;">{{ $task->category }}</span>
                            </p>
                            <p class="card-text mb-2" style="font-weight:bold;">
                                <i class="fas fa-dollar-sign mr-2"></i> Amount: <span style="font-weight:normal;">SGD {{ number_format($task->required_amount,2) }}</span>
                            </p>
                            <div class="col-md-6">
                                <p class="card-text mb-2" style="font-weight:bold;">
                                    @if($task->package == 1)
                                        <i class="fas fa-hand-holding-usd mr-2"></i> Earnings: <span style="font-weight:normal;">3.50% - 4.20%</span>
                                        @elseif($task->package == 2)
                                        <i class="fas fa-hand-holding-usd mr-2"></i> Earnings: <span style="font-weight:normal;">3.90% - 4.65%</span>
                                        @elseif($task->package == 3)
                                        <i class="fas fa-hand-holding-usd mr-2"></i> Earnings: <span style="font-weight:normal;">4.90% - 5.15%</span>
                                        @elseif($task->package == 4)
                                        <i class="fas fa-hand-holding-usd mr-2"></i> Earnings: <span style="font-weight:normal;">8.15% - 14.00%</span>
                                        @elseif($task->package == 5)
                                        <i class="fas fa-hand-holding-usd mr-2"></i> Earnings: <span style="font-weight:normal;">10.00% - 21.35%</span>
                                        @elseif($task->package == 6)
                                        <i class="fas fa-hand-holding-usd mr-2"></i> Earnings: <span style="font-weight:normal;">10.00% - 21.35%</span>
                                        @elseif($task->package == 6)
                                        <i class="fas fa-hand-holding-usd mr-2"></i> Earnings: <span style="font-weight:normal;">10.00% - 21.35%</span>
                                    @endif
                                </p>
                            </div>
                            
                        </div>
                        <style>
                            .desk-btn {
                                width:50% !important;
                                float:right;
                            }
                            @media (max-width: 767px) {
                                .desk-btn {
                                    width:100% !important;
                                }
                            }
                            
                        </style>
                        <div class="col-12 col-md-6" style="margin-left:auto !important; margin-top:5px;">
                            <form method="GET" action="{{ route('task.confirm',['id' => $task->id]) }}">
                                <button type="submit" class="btn desk-btn btn-primary" style="width:100%; background-color:#00AF68; border:#00AF68;">
                                    <i class="fas fa-check-circle mr-2" style="margin-right:5px;"></i> {{ __('Complete Order') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection