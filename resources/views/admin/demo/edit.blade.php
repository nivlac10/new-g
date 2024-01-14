@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2>Edit User</h2>
    <form method="post" action="{{ route('admin.users.update', ['id' => $user->id]) }}">
        @csrf
        <div class="form-group">
            <label for="email">Email (Update User's Email)</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password (Update User's Password)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
