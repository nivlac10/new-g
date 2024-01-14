@extends('layouts.app')

@section('content')
<style>
.bank-details {
    background-color: #f5f5f5;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.bank-title {
    font-size: 18px;
    font-weight: bold;
    text-align:left;
    margin-bottom: 10px;
}

.bank-info p {
    font-size: 16px;
    text-align:left;
    margin: 5px 0;
}

</style>

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
                    <a href="/deposit" class="list-group-item list-group-item-action  card-active">
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
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <!-- First Section: Main Content (Full Column) -->
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-wallet fa-4x mb-3 text-primary" style="color:#008E55 !important;"></i>
                    <h5 class="card-title" style="font-weight:bold;">Deposit</h5>
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
                                Merchant Info
                            </h5>
                            <hr>
                            <div class="form-check" style="display:none;">
                                <input class="form-check-input" style="accent-color:#008E55 !important; background-color:#008E55; border:#008E55;" type="radio" name="paymentMethod" id="creditCard" value="creditCard" checked>
                                <label class="form-check-label" for="creditCard">
                                    <strong>Bank Transfer</strong>
                                </label>
                            </div>
                            <p>To deposit your credit via the merchant's account, please provide your account ID as the recipient reference and attach a receipt of the transaction.</p>
                            <div class="bank-details">
                            <style>
                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                }
                                tr {
                                    width:100%;
                                }

                                table, th, td {
                                    border: 1px solid green;
                                }

                                th, td {
                                    padding: 8px;
                                    text-align: left;
                                }
                                td {
                                    padding: 8px;
                                    text-align: left;
                                }
                                .column123 {
                                    width:220px;
                                }
                                @media (max-width: 767px) { 
                                    .column123 {
                                        width:200px;
                                    }
                                }
                            </style>
                                <table class="bank-info">
                                    <tr>
                                        <td style="color:black; font-weight:bold;"><strong>Bank</strong></td>
                                        <td class="column123">{{$bank->bank_name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Account No.</strong></td>
                                        <td>{{$bank->account_number}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>PayNow No.</strong></td>
                                        <td>{{$bank->paynow}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td>{{$bank->account_name}}</td>
                                    </tr>
                                </table>
                                <p style="color:red; font-size:12px; font-weight:bold; margin-top:5px;">Please note that we only accept Instant Transfer as the preferred payment method.</p>
                            </div>



                            <!-- Add more payment method options here -->
                        </div>
                    </div>
                </div>
                <!-- Second 50% Section -->
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold;">
                            Enter Your Top-up Amount
                            </h5>
                            <hr>
                            <form method="POST" action="{{ route('user.deposit.submit') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="depositAmount">Credit Amount (SGD)</label>
                                    <input type="text" style="margin-top:5px;" class="form-control" required id="depositAmount" name="amount" value="" placeholder="Enter Amount">
                                </div>
                                @if($suggestedAmount > 0 && auth()->user()->project_status == 'assigned')
                                    <p class="text-success">Suggested Amount to Top-up: SGD {{ $suggestedAmount }}</p>
                                @elseif($suggestedAmount > 0 && auth()->user()->project_status == 'unassigned' && auth()->user()->replacement !== null && auth()->user()->package <= 3)
                                    <p class="text-success">Suggested Amount to Top-up: SGD 90.00 </p>
                                @elseif($suggestedAmount > 0 && auth()->user()->project_status == 'unassigned' && auth()->user()->replacement !== null && $comm < 1510)
                                    <p class="text-success">Suggested Amount to Top-up: SGD {{ $suggestedAmount }}</p>
                                @elseif($suggestedAmount > 0 && auth()->user()->project_status == 'unassigned' && auth()->user()->replacement !== null && $comm >= 1513 && $comm < 1515)
                                    <p class="text-success">Suggested Amount to Top-up: SGD 90.00 </p>
                                @elseif($suggestedAmount < 0 && auth()->user()->project_status == 'assigned')
                                    <p class="text-success">Suggested Amount to Top-up: SGD 0.00 </p>    
                                @else
                                    <p class="text-success">Suggested Amount to Top-up: SGD 90.00 </p>
                                @endif
                                <br>
                                <div class="form-group">
                                    <label for="receipt">Transaction Receipt</label>
                                    <input type="file" class="form-control" id="receipt" name="receipt" accept=".pdf,.doc,.docx,.png,.jpeg,.jpg" required>
                                </div><br>
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
<script type="text/javascript">
    @if(Session::has('success'))
        $(document).ready(function() {
        $('#successModal').modal('show');
    });
    @endif
</script>
@endsection