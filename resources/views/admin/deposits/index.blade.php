@extends('layouts.admin')

@section('content')
<div class="container py-4">
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
                    <a href="/admin/tasks" class="list-group-item list-group-item-action">
                        <i class="fas fa-file fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Tasks') }}
                    </a>
                    <a href="/admin/users" class="list-group-item list-group-item-action">
                        <i class="fas fa-users fa-fw mr-2" style="margin-right:5px;"></i>{{ __('User Management') }}
                    </a>
                    <a href="/admin/demo" class="list-group-item list-group-item-action">
                        <i class="fas fa-users fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Demo Management') }}
                    </a>
                    <a href="/admin/deposits" class="list-group-item list-group-item-action card-active">
                        <i class="fas fa-credit-card fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Deposit') }}
                    </a>
                    <a href="/admin/withdrawals" class="list-group-item list-group-item-action">
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
                        <div class="col-4">
                            <h2 class="card-title">Deposits Management</h2>
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
                    <table class="table table-bordered display" id="deposit-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>User Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Receipt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposits as $deposit)
                            <tr>
                                <td>{{ $deposit->id }}</td>
                                <td>{{ $deposit->amount }}</td>
                                <td>{{ $deposit->user->email }}</td>
                                <td>{{ $deposit->created_at }}</td>
                                <td>{{ $deposit->updated_at }}</td>
                                <td>{{ $deposit->status }}</td>
                                <td>
                                    @if ($deposit->receipt)
                                    <a href="{{ asset('storage/' . $deposit->receipt) }}" target="_blank">View Receipt</a>
                                    @else
                                    No receipt
                                    @endif
                                </td>
                                <td>
                                    @if ($deposit->status === 'pending')
                                    <button class="btn btn-success approve-button" data-deposit-id="{{ $deposit->id }}">Approve</button>
                                    <button class="btn btn-danger reject-button" data-deposit-id="{{ $deposit->id }}">Reject</button>
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

<script type="text/javascript">
   document.addEventListener('DOMContentLoaded', function() {
    const approveButtons = document.querySelectorAll('.approve-button');
    const rejectButtons = document.querySelectorAll('.reject-button');

    approveButtons.forEach(button => {
        button.addEventListener('click', function() {
            const depositId = this.getAttribute('data-deposit-id');
            const approvalUrl = '/admin/deposits/approve/' + depositId;
	    const confirmApproval = confirm('Are you sure you want to approve this deposit?');
            if(confirmApproval) {
                const approvalUrl = '/admin/deposits/approve/' + depositId;
                sendApprovalRequest(approvalUrl);
            }
        });
    });

    rejectButtons.forEach(button => {
        button.addEventListener('click', function() {
            const depositId = this.getAttribute('data-deposit-id');
	    const confirmRejection = confirm('Are you sure you want to reject this deposit?');
            if(confirmRejection) {
                const rejectionUrl = '/admin/deposits/reject/' + depositId;
                sendRejectionRequest(rejectionUrl);
            }
        });
    });

    function sendApprovalRequest(url) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
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

    function sendRejectionRequest(url) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
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

</script>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
    $('#deposit-table').DataTable({
        "pageLength": 50,
        "order": [[0, "desc"]]
    });
});
</script>
@endsection
