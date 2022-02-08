<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KA Admin</title>  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <style>
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
    </ul>

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('KAAdmin')}}" class="brand-link"> 
      <span class="brand-text font-weight-light"> KA Admin </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"> 
     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Employee Information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
              <li class="nav-item">
                <a href="{{url('/')}}/KAAdmin" class="nav-link {{ Request::segment(1) =='KAAdmin' ? 'active' : '' }}">
                  <i class="far  {{ Request::segment(1) =='KAAdmin' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                  <p>Employee Information</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{url('/')}}/EmployeeHoliday" class="nav-link {{ Request::segment(1) =='EmployeeHoliday' ? 'active' : '' }}">
                    <i class="far  {{ Request::segment(1) =='EmployeeHoliday' ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                    <p>Holidays request</p>
                </a>
              </li> 

              <li class="nav-item">
            <a href="{{url('/')}}/Events" class="nav-link {{ Request::segment(1) =='Events' ? 'active' : '' }}">
              <i class="nav-icon far   {{ Request::segment(1) =='Events' ? 'fa-check-circle' : 'fa-circle' }}"></i>
              <p>
               Create Events
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('/')}}/ChangePassword" class="nav-link {{ Request::segment(1) =='ChangePassword' ? 'active' : '' }}">
              <i class="nav-icon fa fa-key {{ Request::segment(1) =='ChangePassword' ? 'fa-check-circle' : 'fa-circle' }}"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>
              
            </ul>
          </li>

          
          

          <li class="nav-item">
            <a href="{{url('/')}}/AdminLogout" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
              <p>
               Logout
              </p>
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
  <div id="google_translate_element" style="margin-left: 87%;"></div>
  @yield('content') 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">


<script type="text/javascript">
 function googleTranslateElementInit() {
 new google.translate.TranslateElement({pageLanguage: 'en' , includedLanguages : 'ja,en'}, 'google_translate_element');
 }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <div class="float-right d-none d-sm-block">
      
    </div>
    <strong>KA Admin &copy; 2020-2021 </strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  $(document).ready(function() {
    $('#example3').DataTable({
        dom: 'Plfrtip',
        ajax: '{{url("/")}}/AjaxEmployeeHoliday',
        "order": [[ 2, "desc" ]],
        columns: [
            { data: "first_name" },
            { data: "email" },
            { data: "start" },
            { data: "end" },
            { data: "leave_type" }, 
            { data: "leave_days" },
            {   
                 data: "status", 
                width: "90px",
                render: function (data, type,row) {
                  console.log(data +'==='+row.status);
                    if (type === "display") {
                      var seletedDiv1 ='';
                      var seletedDiv2 ='';
                      var seletedDiv3 ='';
    
                        if(data==1){
                          if(data==row.status){
                          seletedDiv1 = 'selected';
                          }
                        }
                        if(data==2){
                          if(data==row.status){
                          seletedDiv2 = 'selected';
                          }
                        }

                        if(data==3){
                          if(data==row.status){
                          seletedDiv3 = 'selected';
                          }
                        } 
                        return "<select  onchange='trigger(this.value,"+row.id+");' class='form-control'><option "+seletedDiv1+" value='1'>Pending</option> <option  "+seletedDiv2+"  value='2'>Accept</option>  <option "+seletedDiv3+" value='3'>Cancel</option> </select>";
                    }
                    return data;
                },
                className: "dt-body-center"
            }
        ], 
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        deferRender: true
    });
});

  function confirmDelete(){
    var r = confirm('are you sure for delete?');
    if(r){
      return true;
    } else 
    {
      return false;
    }
  }
</script>
<!-- Page specific script -->
@yield('yoursricpt')
</body>
</html>
