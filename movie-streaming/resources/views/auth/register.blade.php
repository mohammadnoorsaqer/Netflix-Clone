<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Netflix - Sign Up</title>

    <!-- External CSS for Font Awesome and custom styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">  <!-- Assuming style.css is in the public/css folder -->
</head>
<body>
    <header class="showcase">
        <div class="logo">
            <img src="https://i.ibb.co/r5krrdz/logo.png" alt="Netflix Logo">
        </div>

        <div class="showcase-content">
            <h1 class="text-4xl text-white mb-8">Create Account</h1>

            <div class="formm">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="info">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="email" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="info">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="info">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="email" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="info">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="email" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="btn">
                        <x-primary-button>
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <div class="help">
                <div>
                    <input value="true" type="checkbox"><label>Remember me</label>
                </div>

                <a href="{{ route('login') }}">Already registered?</a>
            </div>

            <div class="fcbk">
                <a href="https://facebook.com">
                    <img src="https://i.ibb.co/LrVMXNR/social-fb.png" alt="Facebook">
                </a>
                <p>Login with Facebook</p>
            </div>

            <div class="signup">
                <p>New to Netflix?</p>
                <a href="https://www.netflix.com/dz-en/">Sign up now</a>
            </div>

            <div class="more">
                <p>
                    This page is protected by Google reCAPTCHA to ensure you're not a bot. <a href="#">Learn more.</a>
                </p>
            </div>
        </div>
    </header>

</body>
</html>
