<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset(config('constants.asset_path').'assets/panel/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset(config('constants.asset_path').'assets/panel/images/favicon.png')}}" type="image/x-icon">

    <title>Ceramaze Studio</title>
    <!-- Google font-->
    <link href="../../css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="../../css-1?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/panel/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/panel/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/panel/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/panel/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset(config('constants.asset_path').'assets/panel/css/responsive.css')}}">
  </head>
  <body style="background-color: #555">
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="login-card login-dark">
            <div>
              <div><a class="logo" href="#"><img style="height: 150px;" class="img-fluid for-light" src="{{asset(config('constants.asset_path').'assets/panel/images/logo/logo.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset(config('constants.asset_path').'assets/panel/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
              <div class="login-main">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </p>
                    @endif
                    @endforeach
                </div>
                <form class="theme-form" method="POST" action="{{ route('panel.admin.login') }}">
                  @csrf
                  <div class="form-group">
                    <label class="col-form-label">E-Mail</label>
                    <input class="form-control" type="email" name="email"   autocomplete="off" required="" placeholder="E-Mail">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
					@endif
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Passwort</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password"   required="" placeholder="Passwort" name="password" autocomplete="off">
                      <div class="show-hide"><span class="show"></span></div>
                      @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Passwort merken</label>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Anmelden</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="{{asset(config('constants.asset_path').'assets/panel/js/jquery.min.js')}}"></script>
      <!-- Bootstrap js-->
      <script src="{{asset(config('constants.asset_path').'assets/panel/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
      <!-- feather icon js-->
      <script src="{{asset(config('constants.asset_path').'assets/panel/js/icons/feather-icon/feather.min.js')}}"></script>
      <script src="{{asset(config('constants.asset_path').'assets/panel/js/icons/feather-icon/feather-icon.js')}}"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="{{asset(config('constants.asset_path').'assets/panel/js/config.js')}}"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{asset(config('constants.asset_path').'assets/panel/js/script.js')}}"></script>
    </div>
  </body>
</html>
