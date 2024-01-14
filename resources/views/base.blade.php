@extends('layouts.app')

@section('content')
<style>
    .popular-services {
        padding: 50px;
        display: flex;
        flex-wrap: nowrap; /* Prevent cards from wrapping to the next row */
        align-items: center; /* Vertically center the content */
        overflow-x: auto; /* Enable horizontal scrolling if necessary */
    }

    h3 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
        padding-left: 240px; /* Adjust the padding to align with the cards */
        font-weight: bold;
    }

    .column {
        flex: 0 0 20%; /* Each card takes 20% width */
        padding: 0 20px;
        box-sizing: border-box;
    }

    .card {
        background-color: #fff;
        position: relative;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card img {
        display: block;
        width: 100%;
        height: auto;
        filter: brightness(70%);
    }

    .card-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 10px 15px;
        background-color: rgba(255, 255, 255, 0);
        color: white;
        box-sizing: border-box;
    }

    .subtitle {
        font-size: 14px;
        font-weight:light;
        margin: 0;
        color:#C7C7C7;
    }

    .title {
        font-size: 21px;
        font-weight:bold;
        margin: 5px 0 0;
    }

    .section-50-50 {
        display: flex;
        align-items: center;
        padding: 100px 0;
        background-color:#f1fdf7;
    }

    .section-50-50 .text-container {
        flex: 1;
        padding: 0 50px;
    }

    .section-50-50 h2 {
        font-size: 28px;
        margin-bottom: 20px;
        font-weight:bold;
    }

    .section-50-50 .tick-icon {
        color: #3AB08A;
        font-size: 24px;
        margin-right: 10px;
    }

    .section-50-50 p {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .section-50-50 .image-container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .section-50-50 img {
        max-width: 100%;
    }
    /* Your existing styles here */

    .section-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .icon-text-row {
        display: flex;
        justify-content: center; /* Center horizontally */
        flex-wrap: wrap; /* Allow content to wrap to the next row */
        margin-bottom: 30px;
    }

    .icon-text-column {
        flex: 0 0 19%;
        text-align: center;
        margin-bottom: 20px; /* Add some space between columns */
    }

    .icon-text-column img {
        display: block; /* Make sure images behave like block elements */
        margin: 0 auto 10px; /* Center the image horizontally and add some space at the bottom */
        max-width:48px !important;
        max-height:48px !important;
    }

    .icon-text-column p {
        font-size: 16px;
    }
    .blog-section {
    padding: 30px; /* Adjust padding */
    }

    .blog-row {
        display: flex;
        flex-wrap: wrap; /* Allow columns to wrap on smaller screens */
        justify-content: space-between;
        margin: -15px; /* Add negative margin to counteract padding */
    }

    .blog-column {
        flex: 0 0 calc(50% - 30px); /* Each column takes 50% width with padding */
        padding: 15px; /* Add padding */
        text-align: center; /* Center align text */
    }

    .blog-column img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .blog-title {
        font-size: 18px;
        margin-bottom: 10px;
        text-align:left;
        font-weight:bold;
    }

    .blog-excerpt {
        font-size: 14px;
        color: #777;
        text-align:left;
    }
    .search-bar {
        width:40%;
    }
    @media (max-width: 767px) {
        .hero-container {
            text-align: center; /* Center align the content */
            padding: 30px 10px; /* Add padding to the top and bottom */
        }

        .trusted-container {
            margin-top:0 !important;
        }

        .hero-content {
            padding: 0 10px; /* Add horizontal padding */
        }

        .hero-content h1 {
            font-size: 22px; /* Reduce font size */
        }

        .search-bar {
            width: 100%; /* Adjust the width of the search bar */
            margin: 10px auto; /* Center the search bar */
        }
        .search-input {
            max-width:100% !important;
            
        }

        .blog-column {
        flex: 0 0 100%; /* Each column takes 100% width on smaller screens */
        }

        .popular-tags {
            text-align: center; /* Center align the popular tags */
            font-size:12px;
        }
        .popular-services {
            padding: 30px; /* Reduce padding */
        }

        h3 {
            padding-left: 20px !important; /* Remove left padding */
        }

        .column {
            flex: 0 0 50%; /* Each card takes 50% width */
            padding: 0 10px; /* Adjust padding */
        }

        .section-50-50 {
            padding: 50px 0; /* Adjust padding */
            flex-direction: column; /* Stack content vertically */
            text-align: center; /* Center align text */
        }

        .section-50-50 .text-container {
            padding: 0 20px; /* Adjust padding */
        }

        .section-50-50 .image-container {
            margin-top: 30px; /* Add margin at the top */
        }

        .section-title {
            font-size: 24px; /* Reduce font size */
            margin-bottom: 20px; /* Adjust margin */
        }

        .icon-text-row {
            margin-bottom: 20px; /* Adjust margin */
        }

        .icon-text-column {
            flex: 0 0 50%; /* Each column takes 50% width */
            margin-bottom: 10px; /* Adjust margin */
        }

        .blog-column {
            flex: 0 0 100%; /* Each column takes 100% width */
            padding: 15px; /* Adjust padding */
            text-align: center; /* Center align text */
        }

        .blog-excerpt {
            font-size: 12px; /* Reduce font size */
            margin-top: 5px; /* Adjust margin */
        }
        .title {
            text-align:left;
            font-size:12px;
        }
        .subtitle {
            text-align:left;
            font-size:8px;
        }
    }
    
</style>
<div class="hero-container">
        <div class="hero-content">
            <h1 style="color:white;">Find the right freelance service, right away</h1>
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search for services...">
                <button class="search-button"><i class="fas fa-search"></i></button>
            </div>
            <div class="popular-tags">
                <a class="popular-title">Popular:</a>
                <a href="#" class="popular-tag">Graphics Design</a>
                <a href="#" class="popular-tag">Programming & Tech</a>
                <a href="#" class="popular-tag">Video Animation</a>
                <!-- Add more popular tags here -->
            </div>
        </div>
</div>
<div class="trusted-container">

</div>
<h3 style="font-weight:bold; padding-left:50px;">Popular Services</h3>
    <div class="popular-services-container">
        <div class="popular-services py-4">
            <div class="column">
                <div class="card">
                    <img src="/img/services/ai-artist.webp" alt="Service 1">
                    <div class="card-content">
                        <p class="subtitle">Add talent to AI</p>
                        <p class="title">AI Artists</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="/img/services/logo-design.webp" alt="Service 2">
                    <div class="card-content">
                        <p class="subtitle">Build your brand</p>
                        <p class="title">Logo Design</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="/img/services/wordpress.webp" alt="Service 3">
                    <div class="card-content">
                        <p class="subtitle">Customize your site</p>
                        <p class="title">WordPress</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="/img/services/voice-over.webp" alt="Service 4">
                    <div class="card-content">
                        <p class="subtitle">Share your message</p>
                        <p class="title">Voice Over</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="/img/services/video-explainer.webp" alt="Service 5">
                    <div class="card-content">
                        <p class="subtitle">Engage your audience</p>
                        <p class="title">Video Explainer</p>
                    </div>
                </div>
            </div>
            <!-- Repeat for other columns -->
        </div>
    </div>
    <div class="section-50-50">
        <div class="text-container">
            <h2>The best part? Everything.</h2>
            <p style="font-weight:bold;"><span class="tick-icon">&#10004;</span>Stick to your budget<br></p>
            <p>Find the right service for every price point. No hourly rates, just project-based pricing.</p>
            <p style="font-weight:bold;"><span class="tick-icon">&#10004;</span>Get quality work done quickly<br></p>
            <p>Hand your project over to a talented freelancer in minutes, get long-lasting results.</p>
            <p style="font-weight:bold;"><span class="tick-icon">&#10004;</span>Pay when you're happy<br></p>
            <p>Upfront quotes mean no surprises. Payments only get released when you approve.</p>
            <p style="font-weight:bold;"><span class="tick-icon">&#10004;</span>Count on 24/7 support<br></p>
            <p>Our round-the-clock support team is available to help anytime, anywhere.</p>
        </div>
        <div class="image-container">
            <img src="img/video-preview.webp" alt="Image Preview">
        </div>
    </div>
    <div class="section py-4">
        <h4 class="section-title" style="padding:50px;">You need it, we've got it</h4>
        <div class="icon-text-row">
            <div class="icon-text-column">
                <img src="/img/icons/graphic-design.svg" alt="Graphic & Design Icon">
                <p>Graphics & Design</p>
            </div>
            <div class="icon-text-column">
                <img src="/img/icons/digital-marketing.svg" alt="Digital Marketing Icon">
                <p>Digital Marketing</p>
            </div>
            <div class="icon-text-column">
                <img src="/img/icons/writing-translation.svg" alt="Writing Translation Icon">
                <p>Writing & Translation</p>
            </div>
            <div class="icon-text-column">
                <img src="/img/icons/video.svg" alt="Video & Animation Icon">
                <p>Video & Animation</p>
            </div>
            <div class="icon-text-column">
                <img src="/img/icons/music.svg" alt="Music & Audio Icon">
                <p>Music & Audio</p>
            </div>
        </div>
        <div class="icon-text-row">
            <div class="icon-text-column">
                <img src="/img/icons/programming.svg" alt="Programming Icon">
                <p>Programming & Tech</p>
            </div>
            <div class="icon-text-column">
                <img src="/img/icons/business.svg" alt="Business Icon">
                <p>Business</p>
            </div>
            <div class="icon-text-column">
                <img src="/img/icons/lifestyle.svg" alt="Lifestyle Icon">
                <p>Lifestyle</p>
            </div>
            <div class="icon-text-column">
                <img src="/img/icons/data.svg" alt="Data Icon">
                <p>Data</p>
            </div>
            <div class="icon-text-column">
                <img src="/img/icons/photography.svg" alt="Photography Icon">
                <p>Photography</p>
            </div>
        </div>
    </div>
    <div class="blog-section">
        <h4 class="section-title">Guides to help you grow</h4>
        <div class="blog-row">
            <div class="blog-column">
                <img src="/img/blog/blog-cover-1.webp" alt="Blog 1">
                <h5 class="blog-title">Start an online business and work from home</h5>
                <p class="blog-excerpt">A complete guide to starting a small business online</p>
            </div>
            <div class="blog-column">
                <img src="/img/blog/blog-cover-2.webp" alt="Blog 2">
                <h5 class="blog-title">Digital marketing made easy</h5>
                <p class="blog-excerpt">A practical guide to understand what is digital marketing</p>
            </div>
            <div class="blog-column">
                <img src="/img/blog/blog-cover-3.webp" alt="Blog 3">
                <h5 class="blog-title">Create a logo for your business</h5>
                <p class="blog-excerpt">A step-by-step guide to create a memorable business logo</p>
            </div>
        </div>
    </div>





@endsection