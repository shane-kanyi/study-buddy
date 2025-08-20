<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Study Buddy - @yield('title', 'Welcome')</title>
    
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-grad-school.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
  </head>

<body>
   
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="{{ url('/') }}"><em>Study</em> Buddy</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="{{ url('/') }}">Home</a></li>

        <li><a href="{{ route('tutors.index') }}">Find a Tutor</a></li>
        
        {{-- Show these links if the user is a GUEST (not logged in) --}}
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
        @endguest

        {{-- Show these links if the user IS LOGGED IN --}}
        @auth
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li>
            <!-- Logout Link needs to be a form for security -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); this.closest('form').submit();"
                   style="color: white; line-height: 40px;">
                    Logout
                </a>
            </form>
        </li>
        @endauth
      </ul>
    </nav>
  </header>

  {{-- This is the main content placeholder. --}}
  {{-- The content from welcome.blade.php, login.blade.php, etc. will be injected here. --}}
  <main>
    @yield('content')
  </main>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright {{ date('Y') }} by Study Buddy  
          
           | Design: <a href="https://templatemo.com" rel="sponsored" target="_parent">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        // This script is from the original template for single-page navigation.
        // It might not be needed for a multi-page app, but is safe to keep for now.
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }
        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        // This is the NEW corrected code
        $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
          // Check if the link is for a section on the current page (starts with '#')
          if ($(this).attr('href').charAt(0) === '#') {
            // If it is, prevent the default jump and do the smooth scroll
            e.preventDefault();
            $('#menu').removeClass('active');
            showSection($(this).attr('href'), true);
          }
          // For all other links (like /login, /register), this code does nothing,
          // allowing the link to work as a normal page navigation.
        });
    </script>
</body>
</html>