<!DOCTYPE html>
<html lang="en">
<head>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Netflix - Watch TV Shows Online, Watch Movies Online</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">  <!-- Assuming style.css is inside the public/css folder -->
</head>
<body>

<header class="showcase">
    <div class="logo">
        <img src="https://i.ibb.co/r5krrdz/logo.png" alt="Netflix Logo">
    </div>

    <div class="showcase-content">
        <div class="formm">
            <form method="POST" action="{{ route('login') }}">
                @csrf  <!-- CSRF token for security -->
                <h1>Sign In</h1>
                <div class="info">
                    <input class="email" type="email" name="email" placeholder="Email or phone number" required>
                    <input class="email" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="btn">
                    <button class="btn-primary" type="submit">Sign In</button>
                </div>
                <div class="help">
                    <div>
                        <input value="true" type="checkbox" name="remember">
                        <label>Remember me</label>
                    </div>
                    <a href="{{ route('password.request') }}">Need Help?</a>  <!-- This will link to the password reset route -->
                </div>
            </form>
        </div>

        <div class="fcbk">
            <a href="https://facebook.com">
                <img src="https://i.ibb.co/LrVMXNR/social-fb.png" alt="Facebook">
            </a>
            <p>Login with Facebook</p>
        </div>

        <div class="signup">
            <p>New to Netflix?</p>
            <a href="register">Sign up now</a>
        </div>

        <div class="more">
            <p>This page is protected by Google reCAPTCHA to ensure you're not a bot. 
                <a href="#">Learn more.</a>
            </p>
        </div>
    </div>

    <footer>
        <div class="ftr-content">
            <div class="contact">
                <a href="#">Questions? Contact us.</a>
            </div>
            <div class="ftr">
                <a href="#">Gift Card Terms</a>
                <a href="#">Terms of Use</a>
                <a href="#">Privacy Statement</a>
            </div>
            <div class="select">
                <select>
                    <option>English</option>
                    <option>العربية</option>
                    <option>Français</option>
                </select>
            </div>
        </div>
    </footer>
</header>

<!-- SweetAlert2 Logic for Login Failure -->
<script>
    // If there is an error flashed in the session, show the Swal modal
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            confirmButtonText: 'Try Again'
        });
    @endif
</script>

</body>
</html>
