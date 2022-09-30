<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Dashboard - SB Admin</title>
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{asset('css/simple-datatables.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body class="sb-nav-fixed">
        @include('dashboard.partials.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('dashboard.partials.layoutSideNav')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('dashboard.partials.footer')
            </div>
        </div>
        <script type="text/javascript">
            var _commandesDate = JSON.parse('{!! json_encode($mounths) !!}');
            var _commandesCounter = JSON.parse('{!! json_encode($mounthsCounter) !!}');
            var _reclamationDate = JSON.parse('{!! json_encode($reclamationMounths) !!}');
            var _reclamationCounter = JSON.parse('{!! json_encode($reclamationMounthCounter) !!}');
        </script>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('js/chart.min.js')}}"></script>
        <script src="{{asset('js/chart-area-demo.js')}}"></script>
        <script src="{{asset('js/chart-bar-demo.js')}}"></script>
        <script src="{{asset('js/simple-datatables@latest.js')}}"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
