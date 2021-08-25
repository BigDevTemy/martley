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
    <title>Martley|Create Admin</title>

    
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
             Martley Loan App
            </h1>

            <!-- Text -->
            <p class="mb-6 text-muted">
              Create Admin
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
            <form class="mb-6" action="{{route('save_admin')}}" method="post">
            {{ csrf_field() }}
              <!-- Email -->
              <div class="form-group">
                <label class="form-label" for="fname">
                  First Name
                </label>
                <input type="text" value="{{ old('fname') }}" class="form-control" id="fname" name="fname" placeholder="Provide First name">
              </div>

              <div class="form-group">
                <label class="form-label" for="email">
                  Last Name
                </label>
                <input type="text" value="{{ old('lname') }}" class="form-control" name="lname"  id="lname" placeholder="Provide Last name">
              </div>

              <div class="form-group">
                <select class="form-control" name="sex">
                    <option >Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>           
                </select>
              </div>

              <div class="form-group">
                <select class="form-control" name="role">
                    <option>Select Role</option>
                   @if(!empty($roles))
                    
                    @foreach($roles as $v)
                      <option value="{{$v->name}}">{{$v->name}}</option>
                    @endforeach
                   @endif
                </select>
              </div>
              <!-- Password -->
              <div class="form-group mb-5">
                <label class="form-label" for="password">
                  Password
                </label>
                <input type="password" value="{{ old('password') }}" class="form-control" name="password" placeholder="Enter your password">
              </div>

              <!-- Submit -->
              <button class="btn w-100 btn-primary" type="submit">
                Create
              </button>

            </form>

            
            
          
            
            

          </div>
          <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

            <!-- Image -->
            <div class="h-100 w-cover bg-cover" style="background-image: url(/martley_web_asset/assets/img/covers/cover-15.jpg);"></div>

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

<!-- Mirrored from landkit.goodthemes.co/signup-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Aug 2021 19:27:57 GMT -->
</html>
