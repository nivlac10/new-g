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
                <div class="card-header">
                    <div class="row align-items-center">
                    @if(auth()->user()->project_status == 'assigned')
                        <div class="col-12">
                            <h2 class="card-title text-center" style="font-weight:bold;">Current Project Tasks</h2>
                        </div>
                    @elseif(auth()->user()->project_status !== 'assigned')
                        <div class="col-12">
                            <h2 class="card-title text-center" style="font-weight:bold;">Current Project Task</h2>
                        </div>
                    @endif
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
                @if(auth()->user()->project_status == 'assigned')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped verticle-middle table-responsive-sm" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" style="font-weight:800 !important; font-size:16px;">No.</th>
                                    <th scope="col" style="font-weight:800 !important; font-size:16px;">Task Number</th>
                                    <th scope="col" style="font-weight:800 !important; font-size:16px;">Task Category</th>
                                    <th scope="col" style="font-weight:800 !important; font-size:16px;">Task Amount (SGD)</th>
                                    <th scope="col">Earnings</th>
                                    <th scope="col" style="font-weight:800 !important; font-size:16px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $tasksCount = count($tasks);
                            @endphp

                            @foreach ($tasks as $index => $t)
                                <tr>
                                    <td style="color:#2C2C2C">{{ $tasksCount - $index }}</td>
                                    <td style="color:#2C2C2C">{{ $t->task_description }}</td>
                                    <td style="color:green">{{ $t->category }}</td>
                                    <td style="color:#2C2C2C">{{ number_format($t->required_amount, 2) }}</td>
                                    @if($t->package == 1)
                                    <td style="color:#2C2C2C">3.50% - 4.20%</td>
                                    @elseif($t->package == 2)
                                    <td style="color:#2C2C2C">3.90% - 4.65%</td>
                                    @elseif($t->package == 3)
                                    <td style="color:#2C2C2C">4.90% - 5.15%</td>
                                    @elseif($t->package == 4)
                                    <td style="color:#2C2C2C">8.15% - 14.00%</td>
                                    @elseif($t->package == 5)
                                    <td style="color:#2C2C2C">10.00% - 21.35%</td>
                                    @elseif($t->package == 6)
                                    <td style="color:#2C2C2C">10.00% - 21.35%</td>
                                    @elseif($t->package == 7)
                                    <td style="color:#2C2C2C">10.00% - 21.35%</td>
                                    @endif
                                    <td>
                                    @if (auth()->check() && auth()->user()->level >= $t->id)
                                        <span style="color: green; font-weight: bold; text-decoration: underline;">Completed</span>
                                    @elseif (auth()->check() && auth()->user()->level + 1 == $t->id && auth()->user()->project_status == 'assigned')
                                        <a style="font-weight:bold;" href="{{ route('task.start', ['id' => $t->id]) }}">Click Here</a>
                                    @else
                                        @if (auth()->check() && in_array($t->id, [11, 21, 31]) && auth()->user()->project_status !== 'assigned')
                                            <button onclick="assignProject('{{ route('task.assignProject') }}')">Assign Project</button>
                                        @else
                                            N/A
                                        @endif
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif(auth()->user()->project_status !== 'assigned')
                <div class="table-responsive">
                        <table class="table table-bordered table-striped verticle-middle table-responsive-sm" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Project Number</th>
                                    <th scope="col">Task Number</th>
                                    <th scope="col">Task Category</th>
                                    <th scope="col">Task Amount (SGD)</th>
                                    <th scope="col">Earnings</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $tasksCount = count($tasks);
                            @endphp
                            @foreach ($tasks as $index => $t)
                                <tr>
                                    <td style="color:#2C2C2C">{{ $tasksCount - $index }}</td>
                                    <td>{{ $t->task_name }}</td>
                                    <td>{{ $t->task_description }}</td>
                                    <td style="color:green; !important">{{ $t->category }}</td>
                                    <td>{{ number_format($t->required_amount, 2) }}</td>
                                    @if($t->package == 1)
                                    <td style="color:#2C2C2C">3.50% - 4.20%</td>
                                    @elseif($t->package == 2)
                                    <td style="color:#2C2C2C">3.90% - 4.65%</td>
                                    @elseif($t->package == 3)
                                    <td style="color:#2C2C2C">4.90% - 5.15%</td>
                                    @elseif($t->package == 4)
                                    <td style="color:#2C2C2C">8.15% - 14.00%</td>
                                    @elseif($t->package == 5)
                                    <td style="color:#2C2C2C">10.00% - 21.35%</td>
                                    @elseif($t->package == 6)
                                    <td style="color:#2C2C2C">10.00% - 21.35%</td>
                                    @elseif($t->package == 7)
                                    <td style="color:#2C2C2C">10.00% - 21.35%</td>
                                    @endif
                                    <td>
                                    @if (auth()->check() && auth()->user()->level >= $t->id)
                                        <span style="color: green; font-weight: bold; text-decoration: underline;">Completed</span>
                                    @elseif (auth()->check() && auth()->user()->level + 1 == $t->id && auth()->user()->project_status == 'assigned')
                                        <a href="{{ route('task.start', ['id' => $t->id]) }}">Click here</a>
                                    @else
                                        @if (auth()->check() && in_array($t->id, [11, 21, 31]) && auth()->user()->project_status !== 'assigned')
                                            <button onclick="assignProject('{{ route('task.assignProject') }}')">Assign Project</button>
                                        @else
                                            N/A
                                        @endif
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function assignProject(route) {
        // Create a new XHR object
        var xhr = new XMLHttpRequest();

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
                        location.reload();
                    } else {
                        // Handle the case where the assignment was not successful
                        alert('Project assignment failed.');
                    }
                } else {
                    // Handle errors or non-200 status codes here
                    console.error('XHR request failed with status ' + xhr.status);
                }
            }
        };

        // Send the request (you can include additional data if needed)
        xhr.send(JSON.stringify({}));
    }
</script>

<style>
    td{
        padding: 5px  10px !important;
    }
</style>
@endsection
