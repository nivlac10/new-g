@extends('layouts.app')

@section('content')
<style>
@media (max-width: 767px) {
    .end-column {
        float:right;
    }
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
                    <a href="/deposit" class="list-group-item list-group-item-action">
                        <i class="fas fa-credit-card fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Deposit') }}
                    </a>
                    <a href="/withdrawal" class="list-group-item list-group-item-action">
                        <i class="fas fa-building-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Withdraw') }}
                    </a>
                    <a href="/earnings" class="list-group-item list-group-item-action card-active">
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
                    Earning History
                </div>
                <div class="card-body" style="font-size:12px;">
                    <br>
                    @if(auth()->user()->is_demo === 1)
                    <table id="earningsTable" class="table display">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Task Number</th>
                                <th>Status</th>
                                <th>Amount (SGD)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($formattedTransactions as $transaction)
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>{{ $transaction->task_description }}</td>
                                <td>
                                    Distributed
                                </td>
                                <td style="color:green; font-weight:bold;">{{ $transaction->amount }}</td>
                            </tr>
                        @endforeach
                           
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR64588288</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">14.89</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR57145889</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">10.17</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR44664511</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">8.47</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR37723911</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">17.26</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR21102848</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">12.08</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR11123865</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">12.89</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR10639582</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">10.95</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR96320058</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">24.68</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR85269532</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">9.05</td>
                            </tr>
                            <tr>
                                <td>{{ date('d/m/Y') }}</td>
                                <td>TR74144492</td>
                                <td>Distributed</td>
                                <td style="color:green; font-weight:bold;">45.98</td>
                            </tr>
                        
                        </tbody>
                    </table>
                    @else
                    <table id="earningsTable" class="table display">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Task Number</th>
                                <th>Status</th>
                                <th>Amount (SGD)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($formattedTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction->created_at->format('d-m-Y') }}</td>

                                
                                <td>{{ $transaction->task_description }}</td>
                                <td>
                                    Distributed
                                </td>
                                <td style="color:green; font-weight:bold;">{{ $transaction->amount }}</td>
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
<script>
    $(document).ready(function() {
    // Initialize DataTables
    var table = $('#earningsTable').DataTable({
        "paging": true, // Disable pagination
        "lengthChange": false, // Disable the "Show x entries" dropdown
        "searching": false, // Disable the search bar
        "responsive":true,
        "columnDefs": [
            { "width": "20%", "targets": 0 }, // Set the width of the first column
            { "width": "30%", "targets": 1 }, // Set the width of the second column
            // Add more column width definitions as needed
        ],
    });

    // Initialize datepickers
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy', // Set the desired date format
        autoclose: true, // Close the datepicker when a date is selected
    });

    // Add event listeners to the date inputs
    $('#start_date_input, #end_date_input').on('change', function () {
        var start_date = $('#start_date_input').val();
        var end_date = $('#end_date_input').val();

        // Perform date range filtering
        table.columns(0).search(start_date + '|' + end_date, true, false).draw();
    });
    
});

</script>
@endsection
