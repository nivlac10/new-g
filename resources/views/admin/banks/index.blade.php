@extends('layouts.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <a href="/admin/deposits" class="list-group-item list-group-item-action">
                        <i class="fas fa-credit-card fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Deposit') }}
                    </a>
                    <a href="/admin/withdrawals" class="list-group-item list-group-item-action">
                        <i class="fas fa-building-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Withdraw') }}
                    </a>
                    <a href="/admin/transactions" class="list-group-item list-group-item-action">
                        <i class="fas fa-money-check-dollar fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Transactions') }}
                    </a>
                    <a href="/admin/banks" class="list-group-item list-group-item-action card-active">
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
                            <h2 class="card-title">Bank Management</h2>
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
                @foreach($banks as $bank)
                    <div class="bank-record" data-bank-id="{{ $bank->id }}">
                        <div class="form-group">
                            <label for="bank_name_{{ $bank->id }}">Bank Name:</label>
                            <input type="text" id="bank_name_{{ $bank->id }}" class="form-control bank-field" name="bank_name" value="{{ $bank->bank_name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="account_number_{{ $bank->id }}">Account Number:</label>
                            <input type="text" id="account_number_{{ $bank->id }}" class="form-control bank-field" name="account_number" value="{{ $bank->account_number }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="account_name_{{ $bank->id }}">Account Name:</label>
                            <input type="text" id="account_name_{{ $bank->id }}" class="form-control bank-field" name="account_name" value="{{ $bank->account_name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="paynow_{{ $bank->id }}">PayNow:</label>
                            <input type="text" id="paynow_{{ $bank->id }}" class="form-control bank-field" name="paynow" value="{{ $bank->paynow }}" disabled>
                        </div>
                        <div class="form-actions">
                            <button class="btn btn-primary edit-btn" data-bank-id="{{ $bank->id }}">Edit</button>
                            <button class="btn btn-success save-btn" data-bank-id="{{ $bank->id }}" style="display:none;">Save</button>
                        </div>
                    </div>
                @endforeach
                </div>  
            </div>
        </div>
    </div>
</div>



<script>
    // Enable edit mode when "Edit" button is clicked
    $('.edit-btn').click(function() {
        var bankId = $(this).data('bank-id');
        $('div[data-bank-id="' + bankId + '"] .bank-field').prop('disabled', false);
        $(this).hide();
        $('.save-btn[data-bank-id="' + bankId + '"]').show();
    });

    // Update bank details when "Save" button is clicked
    $('.save-btn').click(function() {
        var bankId = $(this).data('bank-id');
        var formData = {};
        
        // Collect form data
        $('div[data-bank-id="' + bankId + '"] .bank-field').each(function() {
            formData[$(this).attr('name')] = $(this).val();
        });
        
        // Convert form data to JSON
        formData = JSON.stringify(formData);
        
        $.ajax({
            url: '/admin/banks/update/' + bankId,
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'application/json', // Set content type to JSON
            success: function(response) {
                alert(response.message); // Display a success message
                location.reload(); // Refresh the page
            },
            error: function() {
                alert('An error occurred while updating bank details.');
            }
        });
    });
</script>
@endsection
