@extends('layouts.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-2">
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
                    <a href="/admin/users" class="list-group-item list-group-item-action card-active">
                        <i class="fas fa-users fa-fw mr-2" style="margin-right:5px;"></i>{{ __('User Management') }}
                    </a>
                    <a href="/admin/demo" class="list-group-item list-group-item-action">
                        <i class="fas fa-users fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Demo Management') }}
                    </a>
                    <a href="/admin/deposits" class="list-group-item list-group-item-action">
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
        <!-- Add this HTML code to your Blade file to create the modal dialog -->
        <div class="modal fade" id="replacementModal" tabindex="-1" role="dialog" aria-labelledby="replacementModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="replacementModalLabel">Choose Replacement Option</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="replacementForm">
                            <div class="form-group">
                                <label for="replacementOption">Select an option:</label>
                                <select class="form-control" id="replacementOption" name="replacementOption">
                                    <option value="44">Replacement 1</option>
                                    <option value="46">Replacement 2</option>
                                    <option value="48">Replacement 3</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="confirmReplacement">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h2 class="card-title float-left">User Management</h2>
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
                <div class="container-table" style="padding:25px;">
                    <table class="table table-bordered display" id="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>                
                                <th>Tasks Completed</th>
                                <th>Current Balance</th>
                                <th>Withdrawable Balance</th>
                                <th>Resume</th>
                                <th>Status</th>
                                <th>Project Status</th>
                                <th>Referral Code</th>
                                <th>Created At</th>
                                <th>Action</th>
                                <th>Refresh</th>
                                <th>Update</th>
                                <th>Edit Balance</th>
                                <th>Send Notification</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->level ?: 'N/A' }}</td>
                                <td>{{ $user->balance ?: 'N/A' }}</td>
                                <td>{{ $user->withdrawable ?: 'N/A' }}</td>
                                <td>
                                    @if ($user->resume_path)
                                        <a href="{{ asset('storage/' . $user->resume_path) }}" target="_blank" rel="noopener noreferrer">Download Resume</a>
                                    @else
                                        No Resume Uploaded
                                    @endif
                                </td>
                                <td>
                                    @if ($user->approved)
                                        Approved
                                    @else
                                        Pending
                                    @endif
                                </td> 
				<td>{{ $user-> project_status }}</td>
				<td>{{ $user->referral_code }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    @if (!$user->approved)
                                        <button class="btn btn-success btn-sm approve-button" data-user-id="{{ $user->id }}">Approve</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->approved)
                                        @if ($user->id === 1 || $user->id === 2)
                                                <button class="btn btn-success btn-sm refresh-button" data-user-id="{{ $user->id }}">Refresh</button>
                                            @else
                                                <button class="btn btn-success btn-sm replacement-button" data-user-id="{{ $user->id }}" data-toggle="modal" data-target="#replacementModal">Replacement</button>
                                            @endif
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Edit</a></td>
                                <td>
    <a href="{{ route('admin.users.edit-balance', ['id' => $user->id]) }}" class="btn btn-sm btn-primary">Edit Balance</a>
</td>

                                <td>
                                    <a href="{{ route('admin.users.send-notification-form', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Send Notification</a>
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
    document.addEventListener("DOMContentLoaded", function() {
        const approveButtons = document.querySelectorAll(".approve-button");
        const refreshButtons = document.querySelectorAll(".refresh-button");
        const replacementButtons = document.querySelectorAll(".replacement-button");

        approveButtons.forEach(button => {
            button.addEventListener("click", function() {
                console.log("approve clicked");
                const userId = button.getAttribute("data-user-id");
                const confirmation = confirm("Are you sure you want to approve this user?");

                if (confirmation) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('admin.approve.user') }}', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                const response = JSON.parse(xhr.responseText);
                                alert(response.message);
                                // You may want to refresh the page or update the UI accordingly
                                location.reload();
                            } else {
                                console.error(xhr.status);
                                alert('An error occurred while approving the user.');
                            }
                        }
                    };
                    xhr.send(JSON.stringify({ user_id: userId }));
                }
            });
        });

        refreshButtons.forEach(button => {
        button.addEventListener("click", function() {
            console.log("refresh clicked");
            const userId = button.getAttribute("data-user-id");
            const confirmation = confirm("Are you sure you want to refresh this user's data?");
            
            if (confirmation) {
                // Get the CSRF token from the meta tag
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.refresh.user') }}', true);
                
                // Set the CSRF token in the request headers
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            alert(response.message);
                            // You may want to refresh the page or update the UI accordingly
                            location.reload();
                        } else {
                            console.error(xhr.status);
                            alert('An error occurred while refreshing the user\'s data.');
                        }
                    }
                };
                xhr.send(JSON.stringify({ user_id: userId }));
            }
        });
    });

        replacementButtons.forEach(button => {
            button.addEventListener("click", function() {
                const userId = button.getAttribute("data-user-id");
                
                // Show the replacement modal when the button is clicked
                $('#replacementModal').modal('show');

                // Handle the confirmation button click within the modal
                document.getElementById('confirmReplacement').addEventListener("click", function() {
                    const replacementOption = document.getElementById('replacementOption').value;
                    
                    // Perform the replacement based on the selected option
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', `{{ route('admin.replacement.user', ['id' => 'userId']) }}`, true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                const response = JSON.parse(xhr.responseText);
                                alert(response.message);
                                // You may want to refresh the page or update the UI accordingly
                                location.reload();
                            } else {
                                console.error(xhr.status);
                                alert('An error occurred while performing the replacement action.');
                            }
                        }
                    };
                    xhr.send(JSON.stringify({ user_id: userId, option: replacementOption }));

                    // Close the modal after processing
                    $('#replacementModal').modal('hide');
                });
            });
        });
    });
</script>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
    $('#user-table').DataTable({
        "pageLength": 50,
        "order": [[0, "desc"]] // Sort by the first (0-based) column in ascending order
    });
});
</script>




@endsection
