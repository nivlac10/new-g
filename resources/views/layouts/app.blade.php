<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fiverr Workshop') }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="{{ asset('/img/jobcraft-favicon.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.4/signature_pad.min.js" integrity="sha512-Mtr2f9aMp/TVEdDWcRlcREy9NfgsvXvApdxrm3/gK8lAMWnXrFsYaoW01B5eJhrUpBT7hmIjLeaQe0hnL7Oh1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Arial" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <!-- Add these lines to your layout file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    
    <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
    </style>
    <style>
        #sticky-nav {
    position: sticky;
    top: 0;
    z-index: 100; /* Adjust the z-index as needed */
}
        #app {
            font-family:'Manrope';
        }
        .social-icon-wrapper {
            margin-left:15px;
            display: inline-block;
        }
        
         .hero-container {
            display: flex;
            height: 80vh;
            background: url('/img/fiverr-background.jpeg') center/cover no-repeat;
        }
        .trusted-container {
            margin-top:10px;
            display: flex;
            height: 5vh;
            background: url('/img/trusted-by.png') center/cover no-repeat;
        }
        .hero-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10rem;
        }
        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .search-bar {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .search-input {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
        }
        .search-button {
            background-color: #00AF68;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            font-size:16px;
        }
        .popular-tags {
            display: flex;
        }
        .popular-tag {
            color: white;
            padding: 0.25rem 0.5rem;
            margin-right: 0.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.875rem;
            border-color:white;
        }
        .footer-logo {
            display: flex;
            align-items: center;
        }
        .footer-logo img {
            display:block;
            margin-right:auto;
            margin-left:auto;
            width:188px;
            margin-right:15px;
            height:38px;
            margin-bottom:15px;
        }
        .footer-copyright {
            display: flex;
            align-items: center;
            position:relative; 
            left:50px;
            
        }
        .copyright {
            margin-left:15px;
            margin-bottom:10px;
        }
        .popular-title {
            color: white;
            padding: 0.25rem 0.5rem;
            margin-right: 0.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1rem;
            font-weight:bold;
        }
        .application-card {
            background-color:#f4f4f4 !important; 
            border:none !important; 
            width:75%; 
            display:block; 
            margin-left:auto; 
            margin-right:auto;
        }

        .card-active {
            background-color:#BFFFED !important;
            color:#008E55 !important;
        }
        /* Footer styles */
        .footer {
            background-color: #f5f5f5;
            padding-top: 30px;
        }

        .footer-title {
            font-weight:800 !important;
            color:black;
            margin-bottom: 25px;
            font-size:22px;
        }

        .credit-card {
            width:50%;
            display:block;
            margin-left:auto;
            margin-right:auto;
        }

        .footer-title i {
            display:none;
        }

        .footer-links {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .footer-link {
            text-decoration: none;
            color: black;
            font-weight:100;
            display: block;
            font-size:15px;
            margin-bottom: 20px;
            transition: color 0.3s; /* Add a smooth color transition */
        }
        

        .footer-link:hover {
            color: #4EAB6E;
        }
        .nav-link:hover {
            color: #4EAB6E !important;
        }

        .new-section {
        text-align: center;
        padding: 50px 0;
        background-color: #f4f4f4; /* Background color for the section */
        }
        .new-section img {
            max-width: 65%; /* Ensure the image fits within its container */
            height: auto;
            display:block;
            margin-left:auto;
            margin-right:auto;
        }
        .separator {
            height: 1px;
            background-color: #ddd;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .bottom-footer {
            background-color: #f5f5f5; /* Changed to the same background color */
            color: black;
            padding-bottom:50px;
            padding-left:25px;
            padding-right:25px;
        }

        .bottom-footer img {
            max-width: 250px;
        }

        .social-icons {
            text-align:right;
        }

        .social-icons a {
            color: black;
            font-size: 24px;
        }
        
        .login-padding {
            padding-top:10px !important;
            padding-bottom:50px !important;
            padding-left:300px !important;
            padding-right:300px !important;
            background-color:#EAF1E2;
        }
        .footer-x {
                padding-left:30px; 
                padding-right:30px;
            }

        @media (max-width: 767px) {
            .credit-card {
                width:35%;
                display:block;
                margin-left:auto;
                margin-right:auto;
            }
            .application-card {
                background-color:#f4f4f4 !important; 
                border:none !important; 
                width:100%; 
                display:block; 
                margin-left:auto; 
                margin-right:auto;
            }

            .footer-link {
                text-decoration: none;
                color: grey;
                font-weight:bold;
                display: block;
                font-size:15px;
                margin-bottom: 15px;
                transition: color 0.3s; /* Add a smooth color transition */
            }
            
            .footer-x {
                padding-left:50px !important; 
                padding-right:50px !important;
            }

            .footer-copyright {
                display:flex !important;
                position:static;
            }
            .bottom-footer {
                padding-left:15px;
                padding-right:15px;
            }
            .social-icons {
                text-align:center;
                padding: none !important;
            }

            .footer-logo img {
            display:block;
            margin-right:auto;
            margin-left:auto;
            width:190px !important;
            height:45px;
            margin-bottom:15px;
            }
            .nav-item2 {
                position:relative;
                padding-top:10px;
                padding-bottom:10px;
                padding-left:10px !important;
                padding-right:10px !important;
            }

            .social-icons a {
                text-align:center;
                color: black;
                font-size: 18px;
            }
            .hide-on-mobile {
                display: none !important;
            }
            .login-padding {
                padding:0px !important;
            }
            .hide-on-desktop {
                display:block !important;
            }
            .new-section img {
                height:90px !important;
                max-width:90% !important;
            }
            .new-section {
                height:100% !important;
                width:100% !important;
                padding:0px !important;
            }
            

        }
        .hide-on-desktop {
                display:none;
            }
            .centered-container {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;
            margin-left:auto;
            margin-right:auto;
        }
        .jobcraft-logo {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;
            margin-left:55px !important;
            width:165px;
        }
        .menu-container {
            margin-right:55px !important;
            margin-left:0 !important;
            padding-right:0 !important;
            width:100% !important;
        }
        .logged-in-jobcraft-logo {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;
            margin-left:55px !important;
            width:165px;
        }
        nav {
            padding:15px !important;
            
        }
        .navbar {
            padding:10px;
            width:auto !important;
            background-color:#F7FBFE !important;
        }
        @media (max-width: 767px) {
        /* Hide the left section on mobile view */
        .mobile-special {
            position:relative; 
            left:-20px; 
            right:-10px; 
            padding:none; 
            width:500px;
        }
        .left-section {
            display: none;
        }
        .navbar {
            padding:10px;
            background-color:#F7FBFE !important;
        }
        .copyright {
            display:block;
            margin-left:auto;
            margin-right:auto; 
            margin-bottom:10px;
            font-size:12.5px;
            font-weight:normal;
        }
        nav {
            padding-top:10px !important; 
            padding-bottom:10px !important; 
            padding-left:5px;
            padding-right:5px;
        }
        
        h3 {
            font-size:16px !important;
        }
        /* Adjust the right section to take full width */
        .right-section {
            width: 100% !important;
            background-color:#EAF1E2 !important;
        }
        /* Adjust the right section to take full width */
        .application-section {
            width: 100% !important;
            background-color:#EAF1E2 !important;
            padding:0 !important;
        }
        .footer-text {
            margin-top:5px !important;
            position:relative !important;
        }
        .login-card {
            background-color:#EAF1E2 !important;
            padding:8px !important;
            padding-top:none !important;
            margin-top:none !important;
        }
        .jobcraft-logo {
            width:78px !important;
            height:20px;
            margin-left: 30px !important;
        }
        .logged-in-jobcraft-logo {
            width:78px !important;
            height:20px;
            margin-left: 45px !important;
        }
        .jobcraft-logo img {
            display:block;
            margin-left:auto;
            margin-right:auto;
        }
        .centered-container {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            text-align: center; /* Center inline elements inside the container */
            margin-left:auto;
            margin-right:auto;
        }

        .navbar-toggler {
            border: none !important;
            margin-left:8px;
            
        }
        .navbar-toggler .navbar-toggler-icon {
            border-color: black !important;
            background-image: url('data:image/svg+xml;utf8,<svg class="ast-mobile-svg ast-menu2-svg" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="28" viewBox="0 0 24 28"><path d="M24 21v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 13v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 5v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1z"></path></svg>');
            
            width:18px;
            height:18px;
        }
        .navbar-toggler span {
            border-color: black !important;
            
        }
        .nav-item {
            position:relative;
            padding-top:10px;
            padding-bottom:10px;
            padding-left:20px;
            padding-right:20px;
            border: 1px solid #C1CED2; /* Add a 1px solid black border */
        }
        .nav-item2 {
            position:relative;
            padding-top:10px;
            padding-bottom:10px;
            padding-left:20px;
            padding-right:20px;
            border: 1px solid #C1CED2; /* Add a 1px solid black border */
        }


        .menu-container {
            margin-right:0 !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            padding-bottom: 0 !important;
        }      
        .footer-links {
        display: none;
        }
        .footer-item {
            padding:30px;
            padding-bottom:5px;
            padding-top:55px;
            border-bottom:2px #fff solid;
        }
        .footer-title {
            padding-bottom:15px;
            margin-bottom:0;
        }

        .footer-title i {
            display:block;
        }
        /* Style the arrow icons */
        .mobile-expandable i {
        transition: transform 0.3s ease-in-out;
        
        }     
        .footer-links.active {
            display: block; /* Show the category list when active */
        }

        /* Rotate the arrow icon when the category list is active */
        .mobile-expandable.active i {
            transform: rotate(90deg);
        }     
        /* Style the social icon wrapper with a white background */
        .social-icon-wrapper {
            background-color: white;
            display: inline-block;
            border-radius:5px;
            margin-right:2px;
            margin-left:0;
        }

        /* Style the social icons (optional) */
        .social-icon-wrapper a i {
            font-size: 24px; /* Adjust the icon size as needed */
            color: #333; /* Change the icon color as needed */
            text-align: center; /* Center the icon horizontally within the wrapper */
            line-height: 50px; /* Adjust the line height to center vertically */
            width: 48px; /* Set a fixed width for the wrapper */
            height: 48px; /* Set a fixed height for the wrapper */
            display: inline-block; /* Ensure the icon is displayed inline */
        }

        .separator {
        margin-top: 60px !important;
        text-align: center;
        }
    }

    

    main {
        display: flex;
        justify-content: space-between;
        height: 100%;
        width: 100%;
        position: relative;
    }

    .left-section {
        flex: 1;
        background-image: url('/img/login-cover.jpg');
        height:700px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .footer-text {
        font-size:12px;
        margin-top:25px;
        position:absolute;
        color:grey;
    }

    .background-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .logo {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 100px; /* Adjust the width as needed */
        height: auto;
    }

    .right-section {
        flex: 1;
        padding: 20px;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: left;
    }

    .application-section {
        flex: 1;
        padding: 20px;
        padding-left:50px;
        padding-right:50px;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: left;
    }

    .separator {
        margin-top: 20px;
        text-align: center;
    }

    .separator a {
        text-decoration: none;
        color: #333;
        margin: 0 5px;
    }
    
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav id="sticky-nav" class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#F7FBFE !important;">
            <div class="container-fluid menu-container">
                
                <button class="navbar-toggler hide-on-desktop" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon" style="color:#000; border-color:"></span>
                    <span class="navbar-toggler-icon-x d-none" style="font-size:18px;">X</span>
                </button>
                
                

                <script>
                    $(document).ready(function () {
                        $(".navbar-toggler").click(function () {
                            $(".navbar-toggler-icon").toggleClass("d-none");
                            $(".navbar-toggler-icon-x").toggleClass("d-none");
                        });
                    });
                </script>
                @guest
                <div class="centered-container">
                    <a class="navbar-brand align-items-center" href="https://jcworkhub.tech/" target="_blank">
                        <img src="{{ asset('img/jobcraft.png') }}" class="jobcraft-logo" alt="Fiverr Logo Image">
                    </a>
                </div>
                @endguest
                @auth
                <div class="centered-container">
                    <a class="navbar-brand align-items-center" href="/">
                        <img src="{{ asset('img/jobcraft.png') }}" class="logged-in-jobcraft-logo" alt="Fiverr Logo Image">
                    </a>
                </div>
                @endauth
                @guest
                <div class="hide-on-desktop" >
                        @if (Route::has('register'))
                                <div class="d-flex justify-content-center align-items-center" style="border: 1px solid #00D47E; padding-left:15px; padding-right:15px; border-radius:5px;">
                                    <a style="color:#00D47E; font-weight:bold;" class="nav-link" href="{{ route('application') }}">
                                        {{ __('Apply') }}
                                    </a>
                                </div>   
                        @endif
                </div> 
                @endguest  
                @auth
                    <li class="nav-item2 dropdown hide-on-desktop" style="border:none !important;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if(auth()->user()->id == 1)
                            AW21755
                        @elseif(auth()->user()->id == 2)
                            AW21766
                        @elseif(auth()->user()->id > 99)
                            AW20{{ auth()->user()->id }}
                        @else
                            AW200{{ auth()->user()->id }}
                        @endif
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/notifications">
                                <i class="fas fa-bell"></i> {{ __('Notifications') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('change.password.form') }}">
                                <i class="fas fa-key"></i> {{ __('Change Password') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.faq') }}">
                                <i class="fas fa-clipboard-question"></i> {{ __('FAQs') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('user.contact') }}">
                                <i class="fas fa-message"></i> {{ __('Contact Us') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
                

                <div class="collapse navbar-collapse expanded-menu" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto top-bar" style="font-size: 16px !important;">
                        @guest
                            <li class="nav-item hide-on-desktop mobile-special" style="padding-right:15px !important;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="/register">
                                    Apply JobCraft
                                </a>
                            </li>
                            <li class="nav-item mobile-special" style="padding-right:15px !important;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="/login">
                                    Login
                                </a>
                            </li>
                            <li class="nav-item mobile-special" style="padding-right:15px !important;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="https://jcworkhub.tech/?page_id=758">
                                    Explore
                                </a>
                            </li>
                            <li class="nav-item mobile-special" style="padding-right:15px !important;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="https://jcworkhub.tech/?page_id=760">
                                    Workspace
                                </a>
                            </li>
                            <li class="nav-item mobile-special" style="padding-right:15px !important;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="https://jcworkhub.tech/?page_id=759">
                                    Affiliates
                                </a>
                            </li>
                            <div class="hide-on-mobile">
                                @if (Route::has('register'))
                                <li class="nav-item hide-on-mobile" style="padding-left:15px; padding-right: 15px !important; border: 1px solid #00D47E;  border-radius:5px;">
                                    <div class="d-flex justify-content-center align-items-center hide-on-mobile">
                                        <a style="color:#00D47E; font-weight:bold;" class="nav-link " href="{{ route('application') }}">
                                            {{ __('Apply') }}
                                        </a>
                                    </div>
                                </li>
                                @endif
                            </div>
                        @else
                            @if (Auth::user()->approved)
                                <li class="nav-item hide-on-mobile">
                                    <a class="nav-link" href="https://jcworkhub.tech/?page_id=758" style="padding:15px; color:black; font-weight:bold;">
                                        Explore
                                    </a>
                                </li>
                                <li class="nav-item hide-on-mobile">
                                    <a class="nav-link" href="https://jcworkhub.tech/?page_id=760" style="padding:15px; color:black; font-weight:bold;">
                                        Workspace
                                    </a>
                                </li>
                                <li class="nav-item hide-on-mobile">
                                    <a class="nav-link" href="https://jcworkhub.tech/?page_id=759" style="padding:15px; color:black; font-weight:bold;">
                                        Affiliates
                                    </a>
                                </li>
                                <li class="nav-item dropdown hide-on-mobile">
                                    <a class="nav-link" style="padding:15px;" href="#" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if($unreadNotificationCount ?? null > 0)
                                            <i class="fa-solid fa-bell fa-shake" style="color:red;"></i>
                                        @else 
                                            <i class="fas fa-bell"></i> <!-- Notification Icon -->
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown" style="width: 350px; padding:15px;">
                                        <div class="dropdown-header" style="text-align:center; font-size:18px; color:black; font-weight:bold;">Notifications</div>
                                        <div id="notificationContent" class="list-group" >
                                            <!-- Notifications will be dynamically added here -->
                                        </div>
                                        <a href="/notifications" class="bg-success dropdown-item text-center text-white" style="margin-top:10px;">View All Notifications</a>
                                    </div>
                                </li>

                                <script>
                                    $(document).ready(function () {
                                        $('#notificationDropdown').click(function (e) {
                                            e.preventDefault();
                                            console.log("clicked");
                                            // Fetch the latest notifications using AJAX
                                            $.ajax({
                                                url: '/notifications/latest',
                                                type: 'GET',
                                                success: function (data) {
                                                    var notifications = data.notifications;
                                                    var notificationContent = $('#notificationContent');

                                                    // Clear the previous notifications
                                                    notificationContent.empty();

                                                    if (notifications.length === 0) {
                                                        notificationContent.append('<p>No new notifications.</p>');
                                                    } else {
                                                        // Append each notification to the dropdown
                                                        $.each(notifications, function (index, notification) {
                                                            notificationContent.append('<div style="border-bottom:1px grey solid; grey solid; padding:5px;">' + notification.message + '</div>');
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                    });

                                </script>
                                <!-- 
                                <li class="nav-item hide-on-mobile">
                                    <a class="nav-link" href="#" style="padding:15px;">
                                        <i class="fas fa-heart"></i> 
                                    </a>
                                </li>
                                -->
                                <li class="nav-item dropdown hide-on-mobile">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="padding:15px;" v-pre>
                                        <img src="{{ asset('/img/default-user-icon.png') }}" alt="User Profile" class="user-profile-image mr-2 rounded-circle" style="width:20px; height:20px; margin-right:10px;">
                                        @if(auth()->user()->id == 1)
                                            AW21755
                                        @elseif(auth()->user()->id == 2)
                                            AW21766
                                        @elseif(auth()->user()->id > 99)
                                            AW20{{ auth()->user()->id }}
                                        @else
                                            AW200{{ auth()->user()->id }}
                                        @endif
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('change.password.form') }}">
                                            <i class="fas fa-key"></i> {{ __('Change Password') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user.faq') }}">
                                            <i class="fas fa-clipboard-question"></i> {{ __('FAQs') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user.contact') }}">
                                            <i class="fas fa-message"></i> {{ __('Contact Us') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                    <a class="nav-link" href="/dashboard">
                                        <i class="fas fa-columns" style="font-size:16px; margin-right:5px;"></i> {{ __('Dashboard') }}
                                    </a>
                                </li>
                                <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                    <a class="nav-link" href="/projects">
                                        <i class="fas fa-clipboard" style="font-size:16px; margin-right:5px;"></i> {{ __('Start a Project') }}
                                    </a>
                                </li>
                                <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                    <a class="nav-link" href="/tasks">
                                        <i class="fas fa-file" style="font-size:16px; margin-right:5px;"></i> {{ __('Current Project Tasks') }}
                                    </a>
                                </li>
                                <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                    <a href="/achievements" class="nav-link">
                                        <i class="fas fa-trophy" style="font-size:16px; margin-right:5px;"></i>{{ __('Achievement Reward') }}
                                    </a>
                                </li>
                                <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                    <a class="nav-link" href="/deposit">
                                        <i class="fas fa-credit-card" style="font-size:16px; margin-right:5px;"></i> {{ __('Deposit') }}
                                    </a>
                                </li>
                                <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                    <a class="nav-link" href="/withdrawal">
                                        <i class="fas fa-building-columns" style="font-size:16px; margin-right:5px;"></i> {{ __('Withdraw') }}
                                    </a>
                                </li>
                                <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                    <a class="nav-link" href="/earnings">
                                        <i class="fas fa-money-bill-trend-up" style="font-size:16px; margin-right:5px;"></i> {{ __('Earning History') }}
                                    </a>
                                </li>
                                <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>
                                </li>
                            @else
                            <!-- Display guest menu items for unapproved users -->
                            <li class="nav-item hide-on-desktop" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="/application">
                                    Apply JobCraft
                                </a>
                            </li>
                            <li class="nav-item" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="https://jcworkhub.tech/?page_id=758">
                                    Explore
                                </a>
                            </li>
                            <li class="nav-item" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="https://jcworkhub.tech/?page_id=760">
                                    Workspace
                                </a>
                            </li>
                            <li class="nav-item" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="https://jcworkhub.tech/?page_id=759">
                                    Affiliates
                                </a>
                            </li>
                            <li class="nav-item" style="position:relative; left:-20px; right:-10px; padding:none; width:500px;">
                                <a style="color:black; font-weight:bold;" class="nav-link" href="/login">
                                    Login
                                </a>
                            </li>
                            <div class="hide-on-mobile">
                                @if (Route::has('register'))
                                <li class="nav-item hide-on-mobile" style="padding-left:15px; padding-right: 15px !important; border: 1px solid #00AF68;  border-radius:5px;">
                                    <div class="d-flex justify-content-center align-items-center hide-on-mobile">
                                        <a style="color:#00AF68; font-weight:bold;" class="nav-link " href="{{ route('application') }}">
                                            {{ __('Apply') }}
                                        </a>
                                    </div>
                                </li>
                                @endif
                            </div>
                </div>   
                            @endif
                        @endguest
                    </ul>
                </div>
                   
            </div>
            
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
<!-- ... (your existing code) 
<div class="new-section">
    <img id="carousel-image" src="/img/banner/banner-1.png" alt="Banner">
</div>

<script>
    const images = [
        "/img/banner/banner-1.png",
        "/img/banner/banner-2.png",
        "/img/banner/banner-3.png",
        "/img/banner/banner-4.png"
    ];
    
    let currentImageIndex = 0;
    const imageElement = document.getElementById('carousel-image');

    function changeImage() {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        imageElement.src = images[currentImageIndex];
    }

    setInterval(changeImage, 5000); // Change image every 5 seconds
</script>
... -->
<script>
  $(document).ready(function() {
    // Add a click event handler to the footer titles
    $(".mobile-expandable").click(function() {
      // Toggle the visibility of the associated category list
      $(this).next(".footer-links").slideToggle();

      // Toggle the "active" class to control the arrow icon rotation
      $(this).toggleClass("active");
    });
  });
</script>
<footer class="footer" style="background-color:#E9E9E9">
    <div class="container footer-x" style="padding-left:30px; padding-right:30px;">
        <div class="row">
            <div class="col-md-3 footer-item">
                <h5 class="footer-title mobile-expandable">Categories
                <i class="fas fa-caret-right" style="float:right;"></i>

                </h5>
                
                <ul class="footer-links" style="font-weight:100;">
                    <li><a href="https://www.fiverr.com/categories/graphics-design" class="footer-link">Graphics & Design</a></li>
                    <li><a href="https://www.fiverr.com/categories/online-marketing" class="footer-link">Digital Marketing</a></li>
                    <li><a href="https://www.fiverr.com/categories/writing-translation" class="footer-link">Writing & Translation</a></li>
                    <li><a href="https://www.fiverr.com/categories/video-animation" class="footer-link">Video & Animation</a></li>
                    <li><a href="https://www.fiverr.com/categories/music-audio" class="footer-link">Music & Audio</a></li>
                    <li><a href="https://www.fiverr.com/categories/business" class="footer-link">Business</a></li>
                    <!-- Add more categories here -->
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h5 class="footer-title mobile-expandable">About
                <i class="fas fa-caret-right" style="float:right;"></i>
                </h5>
                <ul class="footer-links">
                    <li><a href="https://www.fiverr.com/jobs?source=footer%20" class="footer-link">Careers</a></li>
                    <li><a href="https://www.fiverr.com/news/press-releases?source=footer%20" class="footer-link">Press & News</a></li>
                    <li><a href="https://www.fiverr.com/privacy-policy?source=footer%20" class="footer-link">Privacy Policy</a></li>
                    <li><a href="https://www.fiverr.com/terms_of_service?source=footer%20" class="footer-link">Terms of Service</a></li>
                    <li><a href="https://www.fiverr.com/intellectual-property?source=footer%20" class="footer-link">Intellectual Property Claims</a></li>
                    <li><a href="https://investors.fiverr.com/" class="footer-link">Investor Relations</a></li>
                    <!-- Add more about links here -->
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h5 class="footer-title mobile-expandable">Support & Education
                <i class="fas fa-caret-right" style="float:right;"></i>
                </h5>
                <ul class="footer-links">
                    <li><a href="https://help.fiverr.com/hc/en-us" class="footer-link">Help & Support</a></li>
                    <li><a href="https://www.fiverr.com/trust_safety?source=footer%20" class="footer-link">Trust & Safety</a></li>
                    <li><a href="https://learn.fiverr.com/" class="footer-link">Learn</a></li>
                    <!-- Add more support links here -->
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h5 class="footer-title mobile-expandable">Community
                <i class="fas fa-caret-right" style="float:right;"></i>
                </h5>
                <ul class="footer-links">
                    <li><a href="https://community.fiverr.com/" class="footer-link">Community Hub</a></li>
                    
                    <li><a href="https://community.fiverr.com/welcome/?utm_source=fiverr&utm_medium=website%20" class="footer-link">Forum</a></li>
                    <li><a href="https://events.fiverr.com/%20" class="footer-link">Events</a></li>
                    <li><a href="https://blog.fiverr.com/?utm_source=fiverr&utm_medium=website%20" class="footer-link">Blog</a></li>
                    <li><a href="https://affiliates.fiverr.com/influencers/%20" class="footer-link">Influencers</a></li>
                    <li><a href="https://play.acast.com/s/ninetwentynine%20" class="footer-link">Podcast</a></li>
                    <li><a href="https://www.fiverr.com/community/standards?source=footer%20" class="footer-link">Community Standard</a></li>
                    <!-- Add more community links here -->
                </ul>
            </div>
        </div>
    </div>
    <div class="separator" style="background-color:black;"></div>
    <div class="bottom-footer" style="background-color: #E9E9E9; color:#5D6068 !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 col-12 footer-logo">
                    <img src="{{ asset('img/jobcraft.png') }}" alt="Fiverr Logo">
                    
                </div>
                <div class="col-md-5 col-12 footer-copyright">
                    <span class="copyright" style="font-weight:bold; color:black;">&copy; JobCraft by Fiverr International Ltd. 2023</span>
                </div>
                <div class="col-md-6 col-12 social-icons">
                    <div class="social-icon-wrapper">
                        <a href="https://www.tiktok.com/@fiverrcreates"><i class="fab fa-tiktok"></i></a>
                    </div>
                    <div class="social-icon-wrapper">
                        <a href="https://www.instagram.com/fiverr/"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="social-icon-wrapper">
                        <a href="https://www.linkedin.com/company/fiverr-com"><i class="fab fa-linkedin"></i></a>
                    </div>
                    <div class="social-icon-wrapper">
                        <a href="https://web.facebook.com/Fiverr/?_rdc=1&_rdr%20"><i class="fab fa-facebook"></i></a>
                    </div>
                    <div class="social-icon-wrapper">
                        <a href="https://www.pinterest.com/fiverr/"><i class="fab fa-pinterest"></i></a>
                    </div>  
                    <div class="social-icon-wrapper">
                        <a href="https://twitter.com/fiverr"><i class="fab fa-x-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>

</html>
