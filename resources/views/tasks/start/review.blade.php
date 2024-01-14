@extends('layouts.app')

@section('content')
<style>
    @media (max-width: 767px) { 
        .steps {
            font-size:12px;
        }
        .step-container {
            width:100% !important;
        }
    }
</style>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card text-center">
            <div class="card-body">
                    <div class="container" style="text-align: right;">
                        <div class="online-indicator" style="
                            display: inline-block;
                            border: 1px solid green;
                            padding: 2px 5px;
                            border-radius: 5px;
                            font-weight: bold;
                            color: green;">&#8226; Online </div>
                    </div>
                    <img src="{{ asset('/img/green-border-profile.png') }}" alt="Profile Image" class="img-fluid rounded-circle mb-3 mx-auto" style="width: 50px;">
                    <p class="card-title" style="margin:0; font-weight:bold;">
                    @if(auth()->user()->id == 1)
                        AW21755
                    @elseif(auth()->user()->id == 2)
                        AW21766
                    @elseif(auth()->user()->id > 99)
                        AW20{{ auth()->user()->id }}
                    @else
                        AW200{{ auth()->user()->id }}
                    @endif
                    </p>
                    @php
                        $package = auth()->user()->package;
                        $badgeColor = '';

                        switch ($package) {
                            case 1:
                                $badgeColor = '#F0C19B';
                                break;
                            case 2:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 3:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 3:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 4:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 5:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 6:
                                $badgeColor = '#7C4DAA';
                                break;
                            case 7:
                                $badgeColor = '#7C4DAA';
                                break;
                            default:
                                // Handle other cases if needed
                                $badgeColor = '#BCBABA';
                                break;
                        }
                    @endphp
                    @if(auth()->user()->is_demo == 0)
                        <span class="badge badge-success" style="background-color:{{ $badgeColor }}; color:white;">
                    @else
                        <span class="badge badge-success" style="background-color:#F7CB45; color:white;">
                    @endif
                        @if (auth()->user()->package === 0 || auth()->user()->package === null)
                            New Admin
                        @elseif (auth()->user()->is_demo == 1)
                            Top Rated
                        @elseif (auth()->user()->package >= 3)
                            Level 2
                        @else
                            Level {{ auth()->user()->package }}
                        @endif
                    </span>

                    <p class="card-title" >{{ auth()->user()->email }}</p>
                    @if (auth()->user()->balance == null)
                    <p class="card-title credit-card" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold; border:1px solid green; ">Credit: SGD 0.00</p>
                    @else
                    <p class="card-title credit-card" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold;  border:1px solid green;">Credit: SGD {{ number_format(auth()->user()->balance, 2) }}</p>
                    @endif
                    @if (auth()->user()->withdrawable == null)
                    <p class="card-title" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold;">Balance Available for Withdrawal: SGD 0.00</p>
                    @else
                    <p class="card-title" style="font-size:12px; margin-top:3px; color:#008E55; font-weight:bold;">Balance Available for Withdrawal: SGD {{ number_format(auth()->user()->withdrawable, 2) }}</p>
                    @endif
                </div>
            </div>
            <!-- Left Sidebar Card -->
            <div class="card hide-on-mobile">
                
                <!-- Card Header Links -->
                <div class="card-header">
                    <a href="/dashboard" class="list-group-item list-group-item-action">
                        <i class="fas fa-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Dashboard') }}
                    </a>
                </div>
                <!-- Sidebar Links -->
                <div class="list-group list-group-flush">
                    <a href="/projects" class="list-group-item list-group-item-action">
                        <i class="fas fa-clipboard fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Start a Project') }}
                    </a>
                    <a href="/tasks" class="list-group-item list-group-item-action card-active">
                        <i class="fas fa-file fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Current Project Tasks') }}
                    </a>
                    <a href="/achievements" class="list-group-item list-group-item-action">
                        <i class="fas fa-trophy fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Achievement Reward') }}
                    </a>
                    <a href="/deposit" class="list-group-item list-group-item-action">
                        <i class="fas fa-credit-card fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Deposit') }}
                    </a>
                    <a href="/withdrawal" class="list-group-item list-group-item-action">
                        <i class="fas fa-building-columns fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Withdraw') }}
                    </a>
                    <a href="/earnings" class="list-group-item list-group-item-action ">
                        <i class="fas fa-money-bill-trend-up fa-fw mr-2" style="margin-right:5px;"></i>{{ __('Earning History') }}
                    </a>
                    
                    <a class="list-group-item list-group-item-action" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-2" style="margin-right:5px;"></i> {{ __('Logout') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
            <img src="/img/step-3.png" alt="Step Image" style="width: 100%; max-width: 100%;"/>
                <div class="card-body">
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
                    <h4 style="font-weight:bold;">Public Feedback</h4>
                    <p class="mb-4" style="color:#5D6068">Share your experience with the community to help them make better decisions.</p>
                    <form method="GET" action="{{ route('task.completed',['id' => $task->id]) }}" id="review-form">
                        <input type="hidden" name="task_id" value="{{ $task->id }}">

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label font-weight-bold" style="font-weight:bold; font-size:19px;">Communication with Seller<br>
                                <span class="sub-title" style="font-weight:normal; font-size:12px; color:#5D6068;">How responsive was the seller during the process?</span>
                            </label>
                            <style>
                                .star-rating input {
                                    background-color:#F8FAFC;
                                    opacity:0;
                                }
                            </style>
                            <div class="col-md-8 star-rating" id="communication-rating">
                                <input name="communication" class="rating-value" required>
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star" data-rating="4"></span>
                                <span class="fa fa-star" data-rating="5"></span>
                            </div>
                        </div>
                        <div class="form-group row" id="service-described-rating">
                            <label class="col-md-4 col-form-label font-weight-bold" style="font-weight:bold; font-size:19px;">Service as Described<br>
                                <span class="sub-title" style="font-weight:normal; font-size:12px; color:#5D6068;">Did the result match the gig's description?</span>
                            </label>
                            <div class="col-md-8 star-rating" id="buy-again-rating">
                                <input name="service_described" class="rating-value" required>
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star" data-rating="4"></span>
                                <span class="fa fa-star" data-rating="5"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label font-weight-bold" style="font-weight:bold; font-size:19px;">Buy Again or Recommended<br>
                                <span class="sub-title" style="font-weight:normal; font-size:12px; color:#5D6068;">Would you recommend others buying this gig?</span>
                            </label>
                            <div class="col-md-8 star-rating">
                                <input name="buy_again" class="rating-value" required>
                                <span class="fa fa-star" data-rating="1"></span>
                                <span class="fa fa-star" data-rating="2"></span>
                                <span class="fa fa-star" data-rating="3"></span>
                                <span class="fa fa-star" data-rating="4"></span>
                                <span class="fa fa-star" data-rating="5"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="col-form-label font-weight-bold" style="font-size: 19px; font-weight:bold;">Account ID</label>
                                @if(auth()->user()->id == 1)
                                    <input type="text" name="account_id" class="form-control" readonly value="AW21755" required>
                                @elseif(auth()->user()->id == 2)
                                    <input type="text" name="account_id" class="form-control" readonly value="AW21766" required>
                                @else
                                    <input type="text" name="account_id" class="form-control" readonly value="AW20{{ auth()->user()->id }}" required>
                                @endif
                                
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label font-weight-bold" style="font-size: 19px; font-weight:bold;">Category</label>
                                <div class="select-wrapper">
                                <select name="category" class="form-control" required>
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="1">Graphics & Design</option>
                                    <option value="2">Digital Marketing</option>
                                    <option value="3">Writing & Translation</option>
                                    <option value="4">Video & Animation</option>
                                    <option value="5">Music & Audio</option>
                                    <option value="6">Programming & Tech</option>
                                    <option value="7">Photography</option>
                                    <option value="9">Business</option>
                                    <option value="8">AI Services</option>
                                </select>
                                    <span class="select-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-9 col-form-label font-weight-bold" style="font-weight: bold; font-size: 19px;">What was it like working with this Seller?</label>
                            <div class="col-md-9">
                                <textarea id="workingExperience" name="working_experience" class="form-control" rows="4" placeholder="What did you like or didn't like about this seller's service? Share as many details as you can to help other buyers make the right decision for their needs." required></textarea>
                            </div>
                            <div class="col-md-3 d-flex align-items-start">
                                <div class="message-box" id="messageBox" style="width:100%;">
                                    <p>Suggestions for Review:</p>
                                    <ul>
                                        <li>Recommend 10-15 words to avoid being overly long or too short</li>
                                        <li>Keep it positive and simple</li>
                                        <li>Showcase your creativity review to attract buyers</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <br>
                        <style>
                            .mb-btn {
                                width:40%;
                            }
                            @media (max-width: 767px) {
                                .mb-btn {
                                    width:100% !important;
                                }
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <button onclick="goBack()" class="btn mb-btn btn-primary" style="background-color:#00AF68; border:#00AF68;">
                                    <i class="fas fa-arrow-left mr-2"></i> Back
                                </button>
                                    <script>
                                                function goBack() {
                                                    window.history.back(); // Go back to the previous page
                                                }
                                    </script>
                            </div>
                            <div class="col-md-6 col-6">
                                <button type="submit" class="btn mb-btn btn-primary" style="background-color:#00AF68; border:#00AF68; float:right;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            // Get references to the message box and textarea
            const messageBox = document.getElementById('messageBox');
            const textarea = document.getElementById('workingExperience');

            // Calculate and set the initial height of the textarea
            textarea.style.height = messageBox.offsetHeight + 'px';

            // Update the textarea height whenever the window is resized
            window.addEventListener('resize', () => {
                textarea.style.height = messageBox.offsetHeight + 'px';
            });
            // JavaScript code for star ratings
            document.addEventListener("DOMContentLoaded", function() {
                const starRatings = document.querySelectorAll(".star-rating");

                starRatings.forEach(starRating => {
                    const stars = starRating.querySelectorAll(".fa-star");
                    const ratingValue = starRating.querySelector(".rating-value");

                    stars.forEach(star => {
                        star.addEventListener("mouseenter", function() {
                            const hoveredRating = parseInt(star.getAttribute("data-rating"));
                            highlightStars(stars, hoveredRating);
                        });

                        star.addEventListener("mouseleave", function() {
                            const currentRating = parseInt(ratingValue.value);
                            highlightStars(stars, currentRating);
                        });

                        star.addEventListener("click", function() {
                            const selectedRating = parseInt(star.getAttribute("data-rating"));
                            ratingValue.value = selectedRating;
                        });
                    });
                });

                function highlightStars(stars, count) {
                    stars.forEach((star, index) => {
                        if (index < count) {
                            star.classList.add("hover");
                        } else {
                            star.classList.remove("hover");
                        }
                    });
                }
            });
        </script>

        <style>
            .star-rating {
                display: flex;
                justify-content: flex-end;
                align-items: center;
                font-size: 22px;
                cursor: pointer;
            }

            .star-rating .fa-star {
                transition: color 0.3s;
                color: #ddd;
                margin-right: 5px;
            }

            .star-rating .fa-star.hover,
            .star-rating .fa-star:hover {
                color: #f39c12;
            }
            .select-wrapper {
                position: relative;
            }

            .select-wrapper select {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                padding-right: 24px; /* Add space for the arrow */
                background: none; /* Remove default arrow background */
            }

            .select-arrow {
                position: absolute;
                top: 50%;
                right: 8px;
                transform: translateY(-50%);
            }

            .select-arrow i {
                color: #000; /* Adjust the arrow color */
            }
            .message-box {
            background-color: #f0f0f0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            }

            .message-box p {
                font-weight: bold;
                margin-bottom: 10px;
            }

            .message-box ul {
                padding-left: 20px;
                list-style-type: disc; /* Add this line */
                color:#5D6068;
                font-size:12px;
            }
        </style>
    </div>
</div>

@endsection