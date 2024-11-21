<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
<!-- SweetAlert2 CSS (for styling) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Custom Styles (for Netflix-like styling) -->
        <style>
            body {
                background-color: #141414; /* Dark background like Netflix */
                color: white;
                font-family: 'Figtree', sans-serif;
            }

            .navbar {
                background-color: #141414;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
            }

            .navbar-brand {
                color: #e50914; /* Netflix Red */
                font-weight: bold;
                font-size: 1.5rem;
            }

            .navbar-nav .nav-link {
                color: white;
                font-size: 1.1rem;
            }

            .navbar-nav .nav-link:hover {
                color: #e50914;
            }

            .card {
                background-color: #333;
                border: none;
                border-radius: 10px;
                overflow: hidden;
                transition: transform 0.3s ease-in-out;
            }

            .card:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            }

            .card-img-top {
                height: 300px;
                object-fit: cover;
            }

            .card-body {
                padding: 15px;
            }

            .btn-warning {
                background-color: #e50914;
                border-color: #e50914;
                color: white;
                border-radius: 5px;
                font-weight: bold;
            }

            .btn-warning:hover {
                background-color: #b20710;
                border-color: #b20710;
            }

            .container {
                max-width: 1200px;
            }

            footer {
                background-color: #141414;
                padding: 20px;
                text-align: center;
                color: #777;
                font-size: 0.9rem;
            }

            .footer-links a {
                color: #777;
                margin-right: 10px;
            }

            .footer-links a:hover {
                color: white;
            }

            /* Add responsiveness for smaller devices */
            @media (max-width: 767px) {
                .card-img-top {
                    height: 250px;
                }

                .navbar-brand {
                    font-size: 1.2rem;
                }
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            <!-- Navigation Bar -->

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-dark">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content') <!-- This is where the content from movies.index or other views will be injected -->
            </main>
        </div>

        <!-- Footer (optional) -->
        <footer>
            <div class="footer-links">
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Terms</a>
                <a href="#">Privacy</a>
            </div>
            <p>&copy; {{ date('Y') }} Movie Stream. All Rights Reserved.</p>
        </footer>
        <!-- SweetAlert2 JS (for functionality) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.10/dist/sweetalert2.min.js"></script>

    </body>
</html>
