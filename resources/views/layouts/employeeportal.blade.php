<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'KA Portal') }}</title> 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
   <!-- fullCalendar -->
   <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <style>
    input:focus { 
    outline: none !important;
    border-color:red !important;
    box-shadow: 0 0 10px red !important;
}
   
                    .goog-logo-link {
                    display:none !important;
                    }

                    .goog-te-gadget {
                    color: transparent !important;
                    }

                    .goog-te-gadget .goog-te-combo {
                    color: blue !important;
                    }
                    .goog-te-banner-frame {
    display:none !important
    }
    body {
    top: 0px !important; 
    }
        </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background:#143176;">
    <!-- Brand Logo -->
    <a href="{{ url('/KAEmployee')}}"  style="padding: .8125rem .1rem;" >
      <img src="{{ asset('dist/img/h_logo.png')}}" alt="AdminLTE Logo" class="brand-image    elevation-3" style="opacity: .8;padding-top: 15px;">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex"> 
        <div class="info">
          <a href="#" class="d-block"> Welcome , {{ucfirst(session()->get('employeeSession')['emp_name'])}}</a>
        </div>
      </div>

  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 My information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/KAEmployee')}}" class="nav-link {{ Request::segment(1) =='KAEmployee' ? 'active' : '' }}">
                  <i class="far  {{ Request::segment(1) =='KAEmployee' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>About Me</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{url('/EmergencyContact')}}" class="nav-link {{ Request::segment(1) =='EmergencyContact' ? 'active' : '' }}">
                  <i class="far {{ Request::segment(1) =='EmergencyContact' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Emergency Contact</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="{{url('/BankInformation')}}" class="nav-link {{ Request::segment(1) =='BankInformation' ? 'active' : '' }}">
                  <i class="far {{ Request::segment(1) =='BankInformation' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Bank Information  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/FamilyInformation')}}" class="nav-link {{ Request::segment(1) =='FamilyInformation' ? 'active' : '' }}">
                  <i class="far {{ Request::segment(1) =='FamilyInformation' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Family Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/EmployeeStatus')}}" class="nav-link {{ Request::segment(1) =='EmployeeStatus' ? 'active' : '' }}">
                  <i class="far {{ Request::segment(1) =='EmployeeStatus' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Employment Status</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="{{url('/Insurance')}}" class="nav-link {{ Request::segment(1) =='Insurance' ? 'active' : '' }}">
                  <i class="far {{ Request::segment(1) =='Insurance' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Insurance</p>
                </a>
              </li> -->

              <li class="nav-item">
                <a href="{{url('/Visa')}}" class="nav-link {{ Request::segment(1) =='Visa' ? 'active' : '' }}">
                  <i class="far {{ Request::segment(1) =='Visa' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Visa</p>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a href="{{url('/Documents')}}" class="nav-link {{ Request::segment(1) =='Documents' ? 'active' : '' }}">
                  <i class="far {{ Request::segment(1) =='Documents' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Documents and Sign</p>
                </a>
              </li> -->

              

            </ul>
          </li> 
          <li class="nav-item">
            <a href="{{url('/HolidayRequest')}}" class="nav-link {{ Request::segment(1) =='HolidayRequest' ? 'active' : '' }}"  >
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Holiday Requests 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/')}}/EmpChangePassword" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
               Change Password
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/')}}/Logout" class="nav-link">
            &nbsp; <i class="fas fa-sign-out-alt"></i>
               <p>  &nbsp; &nbsp;Logout  </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div id="google_translate_element"  style="margin-left: 87%;"></div>
      @yield('content')  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">


<script type="text/javascript">
 function googleTranslateElementInit() {
 new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages : 'ja,en'}, 'google_translate_element');
 }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <strong>KA Admin &copy; 2020-2021 .</strong> All rights reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- Page specific script -->
@yield('yoursricpt')
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
 
</body>
</html>
