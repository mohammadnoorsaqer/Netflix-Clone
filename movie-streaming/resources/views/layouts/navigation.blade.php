<nav x-data="{ open: false }" class="bg-black border-b border-gray-800">
    <!-- Primary Navigation Menu -->
    <header style="display: flex; justify-content: space-between; align-items: center; padding: 15px 30px; position: relative;">
        <!-- Logo -->
        <div class="netflixLogo">
            <a id="logo" href="#home">
                <img src="https://github.com/carlosavilae/Netflix-Clone/blob/master/img/logo.PNG?raw=true" alt="Logo Image" style="height: 40px;">
            </a>
        </div>

        <!-- Main Navigation Links -->
        <nav class="main-nav" style="flex: 1; display: flex; justify-content: center; gap: 30px;">
            <a href="{{ route('movies.index') }}" class="nav-link">Home</a>
            <a href="{{ route('watchlist.index') }}" class="nav-link">My Watchlist</a> <!-- Watchlist Link -->
            <a href="#tvShows" class="nav-link">TV Shows</a>
            <a href="#movies" class="nav-link">Movies</a>
            <a href="#originals" class="nav-link">Originals</a>
            <a href="#" class="nav-link">Recently Added</a>
        </nav>

        <!-- User Authentication Links -->
        <div style="display: flex; align-items: center; gap: 10px;">
            @auth
                <!-- Log Out Button -->
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button type="submit" class="auth-btn logout-btn">
                        Log Out
                    </button>
                </form>
            @else
                <!-- Log In Button -->
                <a href="{{ route('login') }}" class="auth-btn login-btn">
                    Log In
                </a>

                <!-- Register Button -->
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="auth-btn register-btn">
                        Register
                    </a>
                @endif
            @endauth
        </div>
    </header>
</nav>

<!-- Styles -->
<style>
/* CSS Variables */
:root {
  --netflix-red: #e50914;
  --netflix-red-hover: #f40612;
  --netflix-black: #141414;
  --netflix-dark-gray: #282828;
  --netflix-light: #e5e5e5;
  --header-height: 68px;
  --transition-speed: 0.3s;
}

/* Reset and Base Styles */
nav {
  width: 100%;
  background-color: var(--netflix-black);
  transition: background-color 0.3s ease;
}

/* Make navbar background darker on scroll */
nav.scrolled {
  background-color: rgba(0, 0, 0, 0.95);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Header Container */
.netflix-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 4%;
  height: var(--header-height);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
}

/* Logo Styles */
.netflix-logo {
  height: 45px;
  padding: 0;
  margin-right: 25px;
}

.netflix-logo img {
  height: 100%;
  width: auto;
}

/* Main Navigation */
.main-nav {
  display: flex;
  align-items: center;
  gap: 20px;
  margin: 0 auto;
}

.nav-link {
  color: var(--netflix-light);
  text-decoration: none;
  font-size: 14px;
  font-weight: 500;
  padding: 7px 10px;
  transition: color var(--transition-speed) ease;
  position: relative;
}

.nav-link:hover {
  color: #fff;
}

.nav-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 0;
  height: 2px;
  background-color: var(--netflix-red);
  transition: all var(--transition-speed) ease;
  transform: translateX(-50%);
}

.nav-link:hover::after {
  width: 100%;
}

/* Authentication Buttons */
.auth-buttons {
  display: flex;
  align-items: center;
  gap: 15px;
}

.auth-btn {
  padding: 7px 17px;
  border-radius: 3px;
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  transition: all var(--transition-speed) ease;
  border: none;
  cursor: pointer;
}

.login-btn {
  background-color: var(--netflix-red);
  color: white;
}

.login-btn:hover {
  background-color: var(--netflix-red-hover);
  transform: scale(1.05);
}

.register-btn {
  background-color: transparent;
  border: 2px solid var(--netflix-red);
  color: var(--netflix-red);
}

.register-btn:hover {
  background-color: var(--netflix-red);
  color: white;
  transform: scale(1.05);
}

.logout-btn {
  background-color: transparent;
  color: var(--netflix-light);
  border: 1px solid var(--netflix-light);
}

.logout-btn:hover {
  border-color: white;
  color: white;
  transform: scale(1.05);
}

/* Mobile Navigation */
.mobile-menu-toggle {
  display: none;
  background: none;
  border: none;
  color: white;
  cursor: pointer;
  padding: 10px;
}

/* Media Queries */
@media (max-width: 1024px) {
  .main-nav {
    gap: 15px;
  }
  
  .nav-link {
    font-size: 13px;
    padding: 5px 8px;
  }
}

@media (max-width: 768px) {
  .netflix-header {
    padding: 0 20px;
  }

  .mobile-menu-toggle {
    display: block;
  }

  .main-nav {
    display: none;
    position: absolute;
    top: var(--header-height);
    left: 0;
    right: 0;
    background-color: var(--netflix-black);
    flex-direction: column;
    padding: 20px;
    gap: 15px;
    border-top: 1px solid var(--netflix-dark-gray);
  }

  .main-nav.active {
    display: flex;
  }

  .nav-link {
    width: 100%;
    text-align: center;
    padding: 12px;
  }

  .auth-buttons {
    gap: 10px;
  }

  .auth-btn {
    padding: 5px 12px;
    font-size: 13px;
  }
}

@media (max-width: 480px) {
  .netflix-header {
    padding: 0 10px;
  }

  .netflix-logo {
    height: 35px;
  }

  .auth-buttons {
    flex-direction: column;
    gap: 8px;
  }
}
</style>
