<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="blue-bar">
        <div class="container">
            <header class="topnav py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-md-5 offset-md-7 d-flex justify-content-end align-items-center">
                        <a class="topnav-link pr-5" href="#">Pricing</a>
                        <a class="topnav-link" href="#">Sign In</a>
                        <span class="topnav-span px-2" href="#">or</span>
                        <a class="btn btn-sm btn-secondary trial-button" href="#">Join Now</a>
                    </div>
                </div>
            </header>
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="#">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 500 500" style="enable-background:new 0 0 500 500;" xml:space="preserve"
                        height="48px" width="48px">
                        <g>
                            <path class="st0" style="fill:#5364AD;" d="M427.1,140.2L257.1,92.5c-2.4-0.7-5-0.7-7.4,0c-5.9,1.7-10.1,7.1-10.1,13.3v288.5c0,6.2,4.1,11.6,10.1,13.3
                                c2.4,0.7,5,0.7,7.4,0l169.9-47.7c6-1.7,10.2-7.2,10.2-13.5V153.6C437.3,147.4,433.1,141.9,427.1,140.2z M392.7,254.9l-29,13.7
                                c-3,1.4-5.3,3.8-6.7,6.7l-13.7,29c-1.9,4.1-7.8,4.1-9.7,0l-13.7-29c-1.4-2.9-3.8-5.3-6.7-6.7l-29-13.7c-4.1-1.9-4.1-7.8,0-9.7
                                l29-13.7c3-1.4,5.3-3.8,6.7-6.7l13.7-29c1.9-4.1,7.8-4.1,9.7,0l13.7,29c1.4,2.9,3.8,5.3,6.7,6.7l29,13.7
                                C396.9,247.1,396.9,252.9,392.7,254.9z"/>
                            <path class="st0" style="fill:#5364AD;" d="M186,108.4l-27.7,7.8c-4.3,1.2-7.2,5.1-7.2,9.5v248.6c0,4.4,2.9,8.3,7.2,9.5l27.7,7.8c4.7,1.3,9.4-2.2,9.4-7.1
                                V115.6C195.4,110.7,190.8,107.1,186,108.4z"/>
                            <path class="st0" style="fill:#5364AD;" d="M97.6,133.3l-24.6,6.9c-6,1.7-10.2,7.2-10.2,13.5v192.7c0,6.3,4.2,11.8,10.2,13.5l24.6,6.9
                                c4.7,1.3,9.4-2.2,9.4-7.1V140.4C106.9,135.5,102.3,131.9,97.6,133.3z"/>
                        </g>
                    </svg>
                </a>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-nav dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Graphics</a>
                            <a class="dropdown-item" href="#">Templates</a>
                            <a class="dropdown-item" href="#">Fonts</a>
                            <a class="dropdown-item" href="#">Add-Ons</a>
                            <a class="dropdown-item" href="#">Web Themes</a>
                            <a class="dropdown-item" href="#">Photos</a>
                            <a class="dropdown-item" href="#">3D</a>
                        </div>
                    </div>
                    <span class="fa-search"></span>
                    <input type="text" class="form-control nav-input" placeholder="Search Creative Market Pro">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mb-1">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Graphics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fonts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Templates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Add&#8209;Ons</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Photos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Themes</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
