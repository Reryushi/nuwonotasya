<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('backend/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('front/images/logo/logo_only.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>{{ config('app.name', 'Nuwono Tasya') }} - @yield('title', 'Nuwono Tasya')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <script type="text/javascript" src="{{ asset('chartjs/chart.js') }}"></script>

@section('styles')
    <!-- Bootstrap core CSS     -->
    
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet"/>

        <!--  Paper Dashboard core CSS    -->
        <link href="{{asset('backend/css/paper-dashboard.css')}}" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <!-- <link href="{{asset('backend/css/demo.css')}}" rel="stylesheet"/> -->
        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet"/>

        

        <!--  Fonts and icons     -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/font-muli.css')}}" rel='stylesheet' type='text/css'>
        <link href="{{asset('backend/css/themify-icons.css')}}" rel="stylesheet">
        <style> 
        .custom-bg {
          background-image: url("/front/images/BG_new.jpg");
          background-size: cover;
        }
        .custom-border {
            background: white;
        }
        .custom-bg-login {
          background-image: url("/front/images/background/login.jpg");
          background-size: cover;
        }
        .custom-bg-card {
          background-image: url("/front/images/background/card.jpg");
          background-size: cover;
        }
        
      tbody{
        background-color: #f0f0f0;
      }
    </style>
    @show
</head>

<body>
<div class="wrapper">
    @include('admin.components.side-navbar')

    <div class="main-panel">
        @include('admin.components.top-navbar')
        @yield('content')
        @include('admin.components.footer')
    </div>
</div>
</body>
@section('scripts')

        <!-- Kalender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <!--   Core JS Files. Extra: PerfectScrollbar + TouchPunch libraries inside jquery-ui.min.js   -->
    <script src="{{asset('backend/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}" type="text/javascript"></script>
 
    <!--  Notifications Plugin    -->
    <script src="{{asset('backend/js/bootstrap-notify.js')}}"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="{{asset("backend/js/sweetalert2.js")}}"></script>
    <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
    <script src="{{asset('backend/js/paper-dashboard.js')}}"></script>
    <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
    <script src="{{asset('backend/js/demo.js')}}"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <!-- datetime-->
    
   








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
    <script>
        $(function() {
  let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
  let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
  let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
  let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
  let printButtonTrans = '{{ trans('global.datatables.print') }}'
  let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
  let selectAllButtonTrans = '{{ trans('global.select_all') }}'
  let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

  let languages = {
    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
  };

  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages['{{ app()->getLocale() }}']
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      {
        extend: 'selectAll',
        className: 'btn-primary',
        text: selectAllButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'selectNone',
        className: 'btn-primary',
        text: selectNoneButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'copy',
        className: 'btn-default',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-default',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-default',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-default',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-default',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        className: 'btn-default',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
    ]
  });

  $.fn.dataTable.ext.classes.sPageButton = '';
});

    </script>


@show
</html>