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
                    <a href="/admin/tasks" class="list-group-item list-group-item-action card-active">
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
                            <h2 class="card-title float-left">Task Management</h2>
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
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Task Name</th>
                            <th>Task Description</th>
                            <th>Requirement</th>
                            <th>Commission</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->task_description }}</td>
                            <td>{{ $task->required_amount }}</td>
                            <td>{{ $task->commission }}</td>
                            <!-- Add more columns as needed -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
