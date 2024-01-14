@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('/img/default-user-icon.png') }}" alt="Profile Image" class="img-fluid rounded-circle mb-3 mx-auto" style="width: 50px;">
                    <p class="card-title" style="margin:0;">ID: AW200{{ auth()->user()->id }}</p>
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
                                $badgeColor = '#F7CB45';
                                break;
                            default:
                                // Handle other cases if needed
                                break;
                        }
                    @endphp

                    <span class="badge badge-success" style="background-color:{{ $badgeColor }}; color:white;">Level {{ $package }}</span>

                    <p class="card-title" >{{ auth()->user()->email }}</p>
                    <p class="card-title" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold;">Current Balance: ${{ auth()->user()->balance }}</p>
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
                    <a href="/packages" class="list-group-item list-group-item-action ">
                        <i class="fas fa-clipboard fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Projects') }}
                    </a>
                    @if (in_array(auth()->user()->level, [10, 20, 30]))
                        <a href="/special-tasks" class="list-group-item list-group-item-action card-active">
                            <i class="fas fa-file fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Tasks') }}
                        </a>
                    @else
                        <a href="/tasks" class="list-group-item list-group-item-action">
                            <i class="fas fa-file fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Tasks') }}
                        </a>
                    @endif
                    <a href="/deposit" class="list-group-item list-group-item-action">
                        <i class="fas fa-credit-card fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Deposit') }}
                    </a>
                    <a href="/withdrawal" class="list-group-item list-group-item-action">
                        <i class="fas fa-building-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Withdraw') }}
                    </a>
                    <a href="/achievements" class="list-group-item list-group-item-action">
                        <i class="fas fa-trophy fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Achievements') }}
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
                            <h2 class="card-title text-center">Fiverr Workshop Projects</h2>
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
                    @endif
                    <div class="container">
                        <h1>Special Tasks</h1>
                        <p>Tasks for users with levels 10, 20, or 30.</p>
                        <!-- Include your task listings and other content here -->
                        <a href="/tasks">Request Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection