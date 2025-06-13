<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/sbadmin2/sb-admin-2.css') }}" rel="stylesheet">

    @stack('scripts')
    
   <style>
   body{
  color:#000000;
   }
   .card-header{
    color:#FFFFFF;
    background-color:#446bd6;
   }
   .table thead{
    background-color:#636363;
    color:#FFFFFF;
   }
   .badge{
    font-size:13px;
   }
   .btn-secondary{
    background-color:#636363;
   }
  </style>
</head>
<body>
    <div id="app">
    
    
    
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                    </ul>
                </div>
            </div>
        </nav>
    
    
    
        <main class="py-0">
         <div class="container-fluid">
            @yield('content')
         </div>
        </main>
    </div>
</body>

</html>