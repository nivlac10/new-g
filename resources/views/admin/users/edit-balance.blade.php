@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit User Balance</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update-balance', ['id' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="balance">Balance</label>
                            <input type="text" id="balance" name="balance" class="form-control" value="{{ $user->balance }}">
                        </div>

                        <div class="form-group">
                            <label for="withdrawable">Withdrawable Balance</label>
                            <input type="text" id="withdrawable" name="withdrawable" class="form-control" value="{{ $user->withdrawable }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Balance</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
