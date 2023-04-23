<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Check Up | Admin Panel</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('admin_panel/vendors/core/core.css') }}">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('admin_panel/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('admin_panel/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('admin_panel/css/demo_2/style.css') }}">
  <!-- End layout styles -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="apple-mobile-web-app-title" content="Check Up">
  <meta name="application-name" content="Check Up">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-8 pl-auto" style="flex:none !important;max-width: none !important;">
                  <div class="auth-form-wrapper px-4 py-5">
                    @include('layouts.sessions_messages')
                    <a href="#" class="noble-ui-logo logo-light d-block mb-2">
                        <img class="image" style="width: 19rem;" src="{{ asset('imgs/Full_Logo_Light.png') }}" alt="Logo">
                    </a>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample" method="POST" action="{{ route('post_login_admin') }}">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" value="{{ old('email') }}" name="email" style="@error('email') border-bottom: 1px solid #dc3545 !important; @enderror" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        @error('email')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" style="@error('password') border-bottom: 1px solid #dc3545 !important; @enderror" autocomplete="current-password" placeholder="Password">
                        @error('password')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          Remember me
                        </label>
                      </div>
                      <div class="mt-3">
                        <button type="sunmit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">
                            Login
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('admin_panel/vendors/core/core.js') }}"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('admin_panel/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('admin_panel/js/template.js') }}"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
	<!-- end custom js for this page -->
</body>
</html>