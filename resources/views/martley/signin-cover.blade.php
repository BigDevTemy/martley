<!doctype html>
<html lang="en">
<!-- Mirrored from landkit.goodthemes.co/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Aug 2021 19:25:38 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('martley_web_asset/assets/favicon/favicon.ico')}}" type="image/x-icon" />
    
    <!-- Map CSS -->
    <link rel="stylesheet" href="{{url('martley_web_asset/api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css')}}" />
    
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{url('martley_web_asset/assets/css/libs.bundle.css')}}" />
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{url('martley_web_asset/assets/css/theme.bundle.css')}}" />
    <link rel="stylesheet" href="{{url('martley_web_asset/assets/css/mycss.css')}}" />
    <!-- Title -->
    <title>Martley|Admin|SignUp</title>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156446909-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
    
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());
      gtag("config", "UA-156446909-2");
    
    </script>
  </head>
  <body>

    <!-- CONTENT -->
    <section>
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center gx-0 min-vh-100">
          <div class="col-12 col-md-6 col-lg-4 py-8 py-md-11">

            <!-- Heading -->
            <h1 class="mb-0 fw-bold">
            Martley Admin Login 
            </h1>

            <!-- Text -->
            <p class="mb-6 text-muted">
             Martley App
            </p>
            @if ($errors->any())
                            <div class="alert alert-info">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
            @endif
            <!-- Form -->
            <form class="mb-6" action="{{route('signin')}}" method="post">
              {{csrf_field()}}
              <!-- Email -->
              <div class="form-group">
                <label class="form-label" for="email">
                  Firstname
                </label>
                <input type="text" class="form-control" id="email" name="fname" value="{{ old('fname') }}"  placeholder="Enter your Firstname">
              </div>

              <!-- Password -->
              <div class="form-group mb-5">
                <label class="form-label" for="password">
                  Password
                </label>
                <input type="password" class="form-control" value="{{ old('password') }}"  name="password" id="password" placeholder="Enter your password">
              </div>

              <!-- Submit -->
              <button class="btn w-100 btn-primary" type="submit">
                Login
              </button>

            </form>

            <!-- Text 
            <p class="mb-0 fs-sm text-muted">
              Don't have an account yet? <a href="signup-cover.html">Sign up</a>.
            </p>
            -->

          </div>
          <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

            <!-- Image -->
            <div class="h-100 w-cover bg-cover" style="background-image: url(/martley_web_asset/assets/img/covers/cover-14.jpg);"></div>

            <!-- Shape -->
            <div class="shape shape-start shape-fluid-y text-white">
              <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor"/></svg>            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='{{url("martley_web_asset/api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js")}}'></script>
    
    <!-- Vendor JS -->
    <script src="{{url('martley_web_asset/assets/js/vendor.bundle.js')}}"></script>
    
    <!-- Theme JS -->
    <script src="{{url('martley_web_asset/assets/js/theme.bundle.js')}}"></script>

  </body>

<!-- Mirrored from landkit.goodthemes.co/signin-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Aug 2021 19:27:57 GMT -->
</html>
