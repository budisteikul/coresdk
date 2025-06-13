
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
</style>
</head>

<body id="page-top">


  <div id="wrapper">


    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     
      

      


      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- ##################################################################### -->
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

      	<!-- ##################################################################### -->
        
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
