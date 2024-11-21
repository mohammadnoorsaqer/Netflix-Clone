<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Netflix</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/netflix.css')}}">
  <script src="main.js"></script>
</head>
<body>

  <div class="wrapper">
  <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

    <!-- HEADER -->
     <header>
     @include('layouts.navigation')
      
     </header>
    
    <!-- MAIN CONTAINER -->
    <section class="main-container" >
    <div class="location" id="home">
    <h1 id="home">Popular Movies</h1>
    <div class="box">
        @forelse ($movies as $movie)
            <a href="{{ route('movies.show', $movie['id']) }}">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
            </a>
        @empty
            <p>No movies available at the moment.</p>
        @endforelse
    </div>  
</div>


      

<!-- Trending Movies Section -->
<h1 id="myList">Trending Now (Movies)</h1>
<div class="box">
    @if(!empty($trendingMovies) && count($trendingMovies) > 0)
        @foreach($trendingMovies as $movie)
            <a href="{{ route('movies.show', $movie['id']) }}">
                <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
            </a>
        @endforeach
    @else
        <p>{{ $message ?? 'No trending movies available at the moment.' }}</p>
    @endif
</div>




      
<h1 id="tvShows">TV Shows</h1>
<div class="box">
    @foreach($tvShows as $tvShow)
    <a href="{{ route('tv-shows.show', $tvShow['id']) }}">
            <img src="https://image.tmdb.org/t/p/w500{{ $tvShow['poster_path'] }}" alt="{{ $tvShow['name'] }}">
        </a>
    @endforeach
</div>


  <!-- Netflix Originals Section -->
<!-- Netflix Originals TV Shows Section -->
<h1 id="originals">Netflix Originals</h1>
<div class="box">
    @if(!empty($netflixOriginalsTvShows) && count($netflixOriginalsTvShows) > 0)
        @foreach($netflixOriginalsTvShows as $tvShow)
            <a href="{{ route('tv-shows.show', $tvShow['id']) }}">
                <img src="https://image.tmdb.org/t/p/w500/{{ $tvShow['poster_path'] }}" alt="{{ $tvShow['name'] }}">
            </a>
        @endforeach
    @else
        <p>{{ $message ?? 'No Netflix Originals TV shows available at the moment.' }}</p>
    @endif
</div>


<div class="box">
    @if(!empty($netflixOriginalsMovies) && count($netflixOriginalsMovies) > 0)
        @foreach($netflixOriginalsMovies as $movie)
            <a href="{{ route('movies.show', $movie['id']) }}">
                <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
            </a>
        @endforeach
    @else
        <p>{{ $message ?? 'No Netflix Originals movies available at the moment.' }}</p>
    @endif
</div>

     
    <!-- END OF MAIN CONTAINER -->

    <!-- LINKS -->
    <section class="link">
      <div class="logos">
        <a href="#"><i class="fab fa-facebook-square fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-instagram fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-twitter fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-youtube fa-2x logo"></i></a>
      </div>
      <div class="sub-links">
        <ul>
          <li><a href="#">Audio and Subtitles</a></li>
          <li><a href="#">Audio Description</a></li>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Gift Cards</a></li>
          <li><a href="#">Media Center</a></li>
          <li><a href="#">Investor Relations</a></li>
          <li><a href="#">Jobs</a></li>
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Legal Notices</a></li>
          <li><a href="#">Corporate Information</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </section>
    <!-- END OF LINKS -->

    <!-- FOOTER -->
    <footer>
      <p>&copy 1997-2018 Netflix, Inc.</p>
      <p>Carlos Avila &copy 2018</p>
    </footer>
  </div>
</body>
</html>