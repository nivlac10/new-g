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
                    <a href="/withdrawal" class="list-group-item list-group-item-action card-active">
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
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <!-- First Section: Main Content (Full Column) -->
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-wallet fa-4x mb-3 text-primary" style="color:#008E55 !important;"></i>
                    <h5 class="card-title" style="font-weight:bold;">Withdraw Funds</h5>
                    <a href="/history" class="card-link text-success">Transaction History</a>
                </div>
            </div>
            
            <!-- Second Section: 50/50 Split -->
            <div class="row mt-4">
                <!-- Second First 50% Section -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;">
                                Withdraw Current Balance
                            </h5>
                            <hr>
                            <p>Request Date: {{ date('d/m/Y') }}</p>
                                    @php
                                        $withdrawable = auth()->user()->withdrawable ?: 0.00;
                                    @endphp
                            <p>Balance Available for Withdrawal: <span style="color: green; font-weight:bold;">SGD {{ number_format($withdrawable, 2) }}</span></p>
                            <!-- Add more payment method options here -->
                        </div>
                    </div>
                </div>
                <!-- Second 50% Section -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.withdraw.submit') }}">
                                @csrf
                            <h5 class="card-title"  style="font-weight:bold;">
                                Provide Your Withdrawal Information
                            </h5>
                            <hr>
                            <div class="form-group">
                                <label for="depositAmount">Withdrawal Type</label>
                                <select class="form-control">
                                    <option>Withdrawal as Instant Transfer</option>
                                    <option>Withdrawal as CHQ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" style="margin-top:5px; display:none;" class="form-control" value="{{ $withdrawable }}" required id="withdrawalAmount" name="amount" placeholder="Enter amount to withdraw" max="{{ number_format($withdrawable, 2) }}">
                            </div>
                            <div class="form-group">
                                <label for="depositAmount">Bank to be Deposited</label>
                                <input type="text" style="margin-top:5px;" class="form-control" required id="bankName" name="bankName" placeholder="Enter Bank Name">
                            </div>
                            <div class="form-group">
                                <label for="depositAmount">Account / PayNow No.</label>
                                <input type="number" style="margin-top:5px;" class="form-control" required id="accountNumber" name="accountNumber" placeholder="Enter Account / PayNow Number" minlength="7" oninvalid="this.setCustomValidity('Bank Account No. must be between 9 and 12 digits long.')" maxlength="15">
                            </div>
                            <p style="color:red; font-size:12px; font-weight:bold; margin-top:5px;">Withdrawals can only be made to the account holder's registered bank account.</p>
                            <br>
                            <div class="form-check">
                                <input id="joinRemoteAdmin" type="radio" class="form-check-input" name="join" value="I confirm that the information provided is accurate and will be processed in compliance with the Privacy Policy" required>
                                <label class="form-check-label">I confirm that the information provided is accurate and will be processed in compliance with the Privacy Policy. <span style="font-weight:bold; color:red;">*</span></label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mx-auto" style="width:100%; background-color:#008E55 !important; border:#008E55;">Submit</button>
                            <br>
                            <p class="mt-3 text-center">
                                <i class="fas fa-lock"></i> Your transaction is SSL Secured.
                            </p>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color:#EAF1E2;">
            <div class="modal-header" style="text-align:center; display:block; margin-left:auto; margin-right:auto;">
                <h4 class="modal-title" id="successModalLabel" style="text-align:center;">Submitted</h4>
            </div>
            <div class="modal-body">
                <!-- Success message goes here -->
                {{ Session::get('success') }}<br>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" style="display:block; margin-left:auto; margin-right:auto;">Back</button>
            </div>
        </div>
    </div>
</div>
<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color:#EAF1E2;">
            <div class="modal-header" style="text-align:center; display:block; margin-left:auto; margin-right:auto;">
                <h4 class="modal-title" id="successModalLabel" style="text-align:center;">Error</h4>
            </div>
            <div class="modal-body">
                <!-- Error message goes here -->
                {{ Session::get('error') }}<br><br>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" style="display:block; margin-left:auto; margin-right:auto;">Back</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        @if(Session::has('success'))
        $('#successModal').modal('show');
        @endif
        
        @if(Session::has('error'))
            $('#errorModal').modal('show');
        @endif
});
</script>
@endsection