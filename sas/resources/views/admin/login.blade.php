<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SAS | Admin</title>

    <!-- Bootstrap -->
    <link href="{{ url('public/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('public/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('public/assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ url('public/assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ url('public/assets/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form name="login" method="post" action="{{ route('login-proses') }}">
              <h1>Login Form</h1>

        {{ csrf_field() }}

        @if(Session::has('alert-success'))
            <div class="alert alert-success">
                {{ Session::get('alert-success') }}
            </div>
        @endif


        @if ( 
        
          (count($errors) > 0 ) || (session('status') == 'salah') 
        
        )
        
              <div class="alert alert-danger">
                       <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; Maaf Username atau Password anda salah!
                </div>
        
        @endif



              <div>
                <input name="txt_username" type="email" autocomplete="off" class="form-control" placeholder="Username" required />
              </div>
              <div>
                <input name="txt_password" autocomplete="off" type="password" class="form-control" placeholder="Password" maxlength="15" required />
              </div>
              <div>
                <button type="submit" name="btn-login" class="btn btn-login">Submit
                  
                </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  Please contact your admin if you don't have any username or password!
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-building"></i> Sinergiadhikarya</h1>
                  <p>©2017 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
    <!-- jQuery -->
    <script src="{{ url('public/assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('public/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ url('public/assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ url('public/assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ url('public/assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ url('public/assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ url('public/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ url('public/assets/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ url('public/assets/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ url('public/assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ url('public/assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('public/assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ url('public/assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ url('public/assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ url('public/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') 
    }}"></script>
    <script src="{{ url('public/assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ url('public/assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ url('public/assets/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('public/assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ url('public/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ url('public/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ url('public/assets/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('public/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ url('public/assets/build/js/custom.min.js') }}"></script>
  </body>
</html>