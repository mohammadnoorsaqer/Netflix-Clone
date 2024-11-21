<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // If authentication is successful, regenerate the session and redirect to the intended route
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    
        // If authentication fails, flash an error message to the session
        session()->flash('error', 'The provided credentials are incorrect.');
    
        // Redirect back with input values and the error message
        return back()->withInput();
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
