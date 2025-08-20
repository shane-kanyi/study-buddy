@extends('layouts.guest')

@section('title', 'Personalized Tutoring')

@section('content')
  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="{{ asset('assets/images/course-video.mp4') }}" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="caption">
              <h6>Find your perfect study partner</h6>
              <h2><em>Study</em> Buddy</h2>
              <div class="main-button">
                  <a href="{{ route('register') }}">Join Us Now!</a>
              </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="features-post">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-pencil"></i>Expert Tutors</h4>
              </div>
              <div class="content-hide">
                <p>Connect with verified and skilled tutors from various fields, ready to help you succeed.</p>
             </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post second-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-graduation-cap"></i>Flexible Scheduling</h4>
              </div>
              <div class="content-hide">
                <p>Book sessions that fit your schedule. Learn at your own pace, anytime, anywhere.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post third-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa fa-book"></i>Personalized Learning</h4>
              </div>
              <div class="content-hide">
                <p>Get one-on-one attention and a learning plan tailored to your academic needs.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection