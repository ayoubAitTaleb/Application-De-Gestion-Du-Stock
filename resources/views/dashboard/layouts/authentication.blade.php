<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{asset('css/simple-datatables.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            @yield('content')                                
                        </div>
                    </div>            
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                @include('dashboard.partials.footer')
            </div>
        </div>
        <script src="{{asset('js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
