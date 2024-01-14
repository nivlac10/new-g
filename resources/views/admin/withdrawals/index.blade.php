@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <!-- Left Sidebar Card -->
            <div class="card">
                <!-- Card Header Links -->
                <div class="card-header">
                    <a href="/admin/dashboard" class="list-group-item list-group-item-action">
                        <i class="fas fa-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Dashboard') }}
                    </a>
                </div>
                <!-- Sidebar Links -->
                <div class="list-group list-group-flush">
                    <a href="/admin/packages" class="list-group-item list-group-item-action">
                        <i class="fas fa-clipboard fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Project') }}
                    </a>
                    <a href="/admin/tasks" class="list-group-item list-group-item-action ">
                        <i class="fas fa-file fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Tasks') }}
                    </a>
                    <a href="/admin/users" class="list-group-item list-group-item-action">
                        <i class="fas fa-users fa-fw mr-2" style="margin-right:5px;"></i>{{ __('User Management') }}
                    </a>
                    <a href="/admin/demo" class="list-group-item list-group-item-action">
                        <i class="fas fa-users fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Demo Management') }}
                    </a>
                    <a href="/admin/deposits" class="list-group-item list-group-item-action">
                        <i class="fas fa-credit-card fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Deposit') }}
                    </a>
                    <a href="/admin/withdrawals" class="list-group-item list-group-item-action  card-active">
                        <i class="fas fa-building-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Withdraw') }}
                    </a>
                    <a href="/admin/transactions" class="list-group-item list-group-item-action">
                        <i class="fas fa-money-check-dollar fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Transactions') }}
                    </a>
                    <a href="/admin/banks" class="list-group-item list-group-item-action">
                        <i class="fas fa-bank fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Bank Management') }}
                    </a>
                    <a href="/admin/contact" class="list-group-item list-group-item-action">
                        <i class="fas fa-message fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Contact Submission') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h2 class="card-title">Withdrawals Management</h2>
                        </div>
                    </div>
                </div>

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
                <div style="padding:25px;">
                    <table class="table table-bordered display" id="withdrawal-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Bank Name</th>
                                <th>Account Number</th>
                                <th>User Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdrawals as $withdrawal)
                            <tr>
                                <td>{{ $withdrawal->id }}</td>
                                <td>{{ $withdrawal->user->name }}</td>
                                <td>{{ $withdrawal->amount }}</td>
                                <td>{{ $withdrawal->bank_name }}</td>
                                <td>{{ $withdrawal->account_number }}</td>
                                <td>{{ $withdrawal->user->email }}</td>
                                <td>{{ $withdrawal->created_at }}</td>
                                <td>{{ $withdrawal->updated_at }}</td>
                                <td>{{ $withdrawal->status }}</td>
                                <td>
                                    @if ($withdrawal->status === 'pending')
                                    <button class="btn btn-success approve-button" data-withdrawal-id="{{ $withdrawal->id }}">Approve</button>
                                    <button class="btn btn-danger reject-button" data-withdrawal-id="{{ $withdrawal->id }}">Reject</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const approveButtons = document.querySelectorAll('.approve-button');
        const rejectButtons = document.querySelectorAll('.reject-button');

        approveButtons.forEach(button => {
            button.addEventListener('click', function() {
                const withdrawalId = this.getAttribute('data-withdrawal-id');
                const confirmApproval = confirm('Are you sure you want to approve this withdrawal?');

                if (confirmApproval) {
                    const approvalUrl = '/admin/withdrawals/approve/' + withdrawalId;

                    // Create a new POST request using AJAX
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', approvalUrl, true);
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Assuming this works for CSRF protection
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Successful response, you can handle success behavior here
                                window.location.reload(); // For example, you can reload the page
                            } else {
                                // Handle any errors or unexpected responses here
                            }
                        }
                    };
                    xhr.send();
                }
            });
        });

        rejectButtons.forEach(button => {
            button.addEventListener('click', function() {
                const withdrawalId = this.getAttribute('data-withdrawal-id');
                const confirmRejection = confirm('Are you sure you want to reject this withdrawal?');

                if (confirmRejection) {
                    const rejectionUrl = '/admin/withdrawals/reject/' + withdrawalId;

                    // Create a new POST request using AJAX
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', rejectionUrl, true);
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Assuming this works for CSRF protection
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Successful response, you can handle success behavior here
                                window.location.reload(); // For example, you can reload the page
                            } else {
                                // Handle any errors or unexpected responses here
                            }
                        }
                    };
                    xhr.send();
                }
            });
        });
    });
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        $('#withdrawal-table').DataTable({
            "pageLength": 50,
            "order": [[0, "desc"]]
        });
    });
</script>
@endsection