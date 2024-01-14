@extends('layouts.app')

@section('content')
<div class="container" style="padding:10px;">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="width:50%; display:block; margin-left:auto; margin-right:auto; padding:15px;">
                    @if(auth()->user()->id == 1)
                    <h3 style="text-align:center; color:#4EAB6E; font-weight:bold; border:1px solid green;">User ID: AW21755</h3>
                    @elseif(auth()->user()->id == 2)
                    <h3 style="text-align:center; color:#4EAB6E; font-weight:bold; border:1px solid green;">User ID: AW21766</h3>
                    @elseif(auth()->user()->id > 99)
                        <h3 style="text-align:center; color:#4EAB6E; font-weight:bold; border:1px solid green;">User ID: AW20{{ Auth::user()->id }}</h3>
                    @else
                        <h3 style="text-align:center; color:#4EAB6E; font-weight:bold; border:1px solid green;">User ID: AW200{{ Auth::user()->id }}</h3>
                    @endif
                </div>
                <hr>
                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-4 col-4">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                </div>
                            </div>
                            <div class="col-md-8 col-8">
                                <div class="form-group">
                                    <input
                                        id="current_password"
                                        type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        name="current_password"
                                        placeholder="Enter current password"
                                        required
                                    >
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
<br>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                </div>
                            </div>
                            <div class="col-md-8 col-8">
                                <div class="form-group">
                                    <input
                                        id="new_password"
                                        type="password"
                                        class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password"
                                        placeholder="Enter new password"
                                        required
                                    >
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
<br>
                        <div class="row">
                            <div class="col-md-4 col-4">
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm New Password</label>
                                </div>
                            </div>
                            <div class="col-md-8 col-8">
                                <div class="form-group">
                                    <input
                                        id="new_password_confirmation"
                                        type="password"
                                        class="form-control"
                                        name="new_password_confirmation"
                                        required
                                        placeholder="Confirm new password"
                                    >
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <p style="color:#595959">Password must be 8-16 characters and contain a combination of letters and numbers (cannot be only numbers).</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">Update Password</button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
