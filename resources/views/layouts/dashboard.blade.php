<!DOCTYPE html>
<html lang="en">



<head>
    <title>Nuwono Tasya Guesthouse</title>
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
        <!--  Paper Dashboard core CSS    -->
        <link href="{{asset('backend/css/paper-dashboard.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset("front/css/font-awesome.min.css") }}">
        <!-- ALL CSS FILES -->
        <link href="{{ asset("front/css/materialize.css") }}" rel="stylesheet">
        <link href="{{ asset("front/css/style.css") }}" rel="stylesheet">
        <link href="{{ asset("front/css/bootstrap.css") }}" rel="stylesheet" type="text/css" />
        <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
        <link href="{{ asset("front/css/responsive.css") }}" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        @show
    <!--[if lt IE 9]>
        <script src="front/js/html5shiv.js"></script>
        <script src="front/js/respond.min.js"></script>
        <![endif]-->
        
</head>

<body>
@include('front.components.mobile_menu')
<!--HEADER SECTION-->
<section>
    <div class="menu-section">
        <div class="container">
            @include('front.components.top_menu')
            @include('front.components.main_menu')
        </div>
    </div>
    <!--DASHBOARD SECTION-->
        <div class="dashboard">
            @include('dashboard.components.dashboard_left')
            <div class="db-cent">
            @include('dashboard.components.dashboard_center_top')
                @yield('content')
            </div>
            @include('dashboard.components.dashboard_right')
        </div>
        <!--END DASHBOARD SECTION-->

   
</section>
<!--END HEADER SECTION-->
@include('front.components.footer')
@section('scripts')
    <script src="{{ asset("front/js/jquery.min.js") }}"></script>
    <script src="{{ asset("front/js/jquery-ui.js") }}"></script>
    <script src="{{ asset("front/js/bootstrap.js") }}" type="text/javascript"></script>
    <script src="{{ asset("front/js/materialize.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("front/js/jquery.mixitup.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("front/js/custom.js") }}"></script>
 
    
    <!-- Sweet Alert 2 plugin -->
    <script src="{{asset("backend/js/sweetalert2.js")}}"></script>
    <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
    <script src="{{asset('backend/js/demo.js')}}"></script>

    <script type="text/javascript">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
             demo.showNotification('top', 'right', 'danger', '{{$error}}');
            @endforeach
        @endif
        @if (Session::has('flash_message'))
            demo.successModal('{{ Session::get('flash_title') }}', '{{ Session::get('flash_message') }}');
        @endif

    </script>
@show
</body>



</html>