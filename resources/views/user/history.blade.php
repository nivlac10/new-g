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
                        <i class="fas fa-money-bill-trend-up fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Earnings') }}
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
                    Account Transaction History
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if(auth()->user()->id === 1 || auth()->user()->id === 2)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount (SGD)</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formattedTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td style="text-transform:capitalize;">
                                        @if($transaction->type == 'commission')
                                        Earning
                                        @else
                                        {{ $transaction->type }}
                                        @endif
                                    </td>
                                    <td style="color:
                                        @if ($transaction->status === 'pending')
                                            red;
                                        @elseif ($transaction->status === 'completed' || $transaction->status === 'approved')
                                            green;
                                        @elseif ($transaction->status === 'rejected')
                                            red;
                                        @endif
                                    ">
                                        {{ ucfirst($transaction->status) }}
                                    </td>
                                </tr>
                                @endforeach
                                
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>14.89</td>
                                    <td>Earning</td>
                                    <td style="color:green;">Completed</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>10.17</td>
                                    <td>Earning</td>
                                    <td style="color:green;">Completed</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>8.47</td>
                                    <td>Earning</td>
                                    <td style="color:green;">Completed</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>117.84</td>
                                    <td>Deposit</td>
                                    <td style="color:green;">Approved</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>17.26</td>
                                    <td>Earning</td>
                                    <td style="color:green;">Completed</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>12.08</td>
                                    <td>Earning</td>
                                    <td style="color:green;">Completed</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>12.89</td>
                                    <td>Earning</td>
                                    <td style="color:green;">Completed</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>350</td>
                                    <td>Deposit</td>
                                    <td style="color:green;">Approved</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>1178.65</td>
                                    <td>Withdraw</td>
                                    <td style="color:green;">Completed</td>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y') }}</td>
                                    <td>10.95</td>
                                    <td>Earning</td>
                                    <td style="color:green;">Completed</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount (SGD)</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formattedTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td style="text-transform:capitalize;">
                                        @if($transaction->type == 'commission')
                                        Earning
                                        @else
                                        {{ $transaction->type }}
                                        @endif
                                    </td>
                                    <td style="color:
                                        @if ($transaction->status === 'pending')
                                            red;
                                        @elseif ($transaction->status === 'completed' || $transaction->status === 'approved')
                                            green;
                                        @elseif ($transaction->status === 'rejected')
                                            red;
                                        @endif
                                    ">
                                        {{ ucfirst($transaction->status) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
