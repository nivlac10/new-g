@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2>Send Custom Notification to User</h2>
    <form method="post" action="{{ route('admin.users.send-notification', ['id' => $user->id]) }}">
        @csrf
        <div class="form-group">
            <label for="title">Notification Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter notification title" required>
        </div>
        <div class="form-group">
            <label for="message">Notification Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter notification message" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Send Notification</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
