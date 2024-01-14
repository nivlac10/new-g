@extends('layouts.app') <!-- Make sure to adjust the layout as needed -->

@section('content')
<div class="container" style="padding:25px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h2>{{ __('Contact Us') }}</h2>
                    <form method="POST" action="{{ route('user.contactSubmit') }}" enctype="multipart/form-data">
                        @csrf
                        @if (auth()->user())
                            <input type="hidden" name="user_email" value="{{ auth()->user()->email }}">
                            <input type="hidden" name="user_id" value="AW200{{ auth()->user()->id }}">
                        @endif
                        <div class="form-group" style="padding:5px;">
                            <label for="help_topic">{{ __('What can we help you with?') }}</label>
                            <select id="help_topic" name="help_topic" class="form-control" required>
                                <option value="My Account">My Account</option>
                                <option value="Technical Issues">Technical Issues</option>
                                <option value="Achievement Reward">Achievement Reward</option>
                                <option value="Deposit">Deposit</option>
                                <option value="Withdraw">Withdraw</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding:5px;">
                            <label for="subject">{{ __('Subject') }}</label>
                            <input required id="subject" type="text" class="form-control" name="subject" placeholder="Let us know the reason for your request." required>
                        </div>
                        <div class="form-group" style="padding:5px;">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea required id="description" class="form-control" name="description" rows="4" placeholder="The more detail you provide, the more helpful we can be. Feel free to include screenshots if relevant." required></textarea>
                        </div>
                        <div class="form-group " style="padding:5px;">
                            <label for="attachments">{{ __('Attachments') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input id="attachments" type="file" class="custom-file-input" name="attachments" accept=".docx, .doc, .pdf, .jpg, .jpeg, .png">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="padding:5px;">
                            <button type="submit" class="btn bg-success text-white">{{ __('Submit') }}</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
