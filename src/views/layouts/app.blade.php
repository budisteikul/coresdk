
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{env('APP_NAME')}}</title>

  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="{{ asset('js/admin.js') }}"></script>
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
   .dataTable td, .dataTable th {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 250px; /* You must set a max-width for ellipsis to work */
   }




/* Topbar / Navbar overrides */
.sidebar {
  background-color: #4e73df; 
}

/* Cards and Panels */
.card-header {
  background-color: #4e73df;
}

.btn-primary {
    color: #fff;
    background-color: #4e73df;
    border-color: #4e73df;
}
.btn-primary:hover {
    background-color: color-mix(in srgb, #4e73df, black 15%);
}

</style>
</head>

<body id="page-top">


  <div id="wrapper">


    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

      @if(View::exists('tourcms::layouts.menu'))
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-rocket"></i>
            </div>
            <div class="sidebar-brand-text mx-3">ADMIN PANEL</div>
      
          </a>

         

      @else
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-rocket"></i>
            </div>
            <div class="sidebar-brand-text mx-3">MENU</div>
      
          </a>
      @endif
      

      <!-- ##################################################################### -->
      
      @includeIf('layouts.menu')
      @includeIf('tourcms::layouts.menu')

      <!-- ##################################################################### -->


      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- ##################################################################### -->
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <!-- ##################################################################### -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">

            @includeIf('mail::layouts.menu')
            

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 text-right">
                  {{ Auth::user()->name }} 
                </span>
                <i class="ml-2 fas fa-3x fa-user-circle"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('route_coresdk_account.index') }}/setting">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- ##################################################################### -->

        <div class="container-fluid">
         
          @yield('content')

        </div>
        

      </div>

     
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{env('APP_NAME')}} 2020</span>
          </div>
        </div>
      </footer>
     

    </div>
    <!-- ##################################################################### -->

  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
  

<script type="text/javascript">
  if ($(window).width() < 768) { 
    $(".sidebar").addClass("toggled"); 
    $(".nav-link").addClass("collapsed"); 
    $("#collapseUtilities").removeClass("show"); 
  }
</script>
<script src="{{ asset('vendor/sbadmin2/sb-admin-2.js') }}"></script>
@if(View::exists('tourcms::layouts.menu'))
    <script src="{{ config('site.assets') }}/js/App.js"></script>
@endif



</body>
</html>
