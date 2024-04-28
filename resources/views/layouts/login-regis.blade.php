<!DOCTYPE html>
<html lang="en">



<head>
    <title>{{ config('app.name', 'Nuwono Tasya Guesthouse') }}</title>
    <!-- META TAGS -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('front/images/logo/logo_only.png')}}">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
    @section('styles')
    <!-- Date Time Picker -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{ asset("front/css/font-awesome.min.css") }}">
    <!-- ALL CSS FILES -->

    <!-- <link href="{{ asset('backend/css/paper-dashboard.css')}}" rel="stylesheet"/> -->
    <!-- <link href="{{ asset('backend/css/paper-dashboard2.css')}}" rel="stylesheet"/> -->
    <link href="{{ asset("front/css/materialize.css") }}" rel="stylesheet">
    <link href="{{ asset("front/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("front/css/bootstrap.css") }}" rel="stylesheet" type="text/css" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{ asset("front/css/responsive.css") }}" rel="stylesheet">

<!-- custom asset -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" /> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    @show
    <!--[if lt IE 9]>
    <script src="front/js/html5shiv.js"></script>
    <script src="front/js/respond.min.js"></script>
    <![endif]-->

    <style> 
        .custom-bg {
          background-image: url("/front/images/BG_new.jpg");
          background-size: cover;
        }
        .custom-bg-login {
          background-image: url("/front/images/background/login.jpg");
          background-size: cover;
        }
        .custom-bg-card {
          background-image: url("/front/images/background/card.jpg");
          background-size: cover;
        }

    </style>
</head>

<body>

<!--HEADER SECTION-->
<section>
    
   @yield('content')
    
</section>
<!--END HEADER SECTION-->
      <footer>
        <div class="copyright" style="text-align:center;font-size:12px">
            &copy; <script>document.write(new Date().getFullYear())</script>, developed by A.M with Paper Dashboard and Bootstrap
        </div>
      </footer>
@section('scripts')
<!--ALL SCRIPT FILES-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->

<script src="{{ asset("front/js/jquery.min.js") }}"></script>
<script src="{{ asset("front/js/jquery-ui.js") }}"></script>
<script src="{{ asset("front/js/bootstrap.js") }}" type="text/javascript"></script>
<script src="{{ asset("front/js/materialize.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("front/js/jquery.mixitup.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("front/js/custom.js") }}"></script>

<!-- custom script -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>   
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{ asset('js/main2.js') }}"></script>




    @show
</body>



</html>