@extends('layouts.adminportal')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php // dd($employeedata);?>

              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible" id="mydiv" >
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $message }}
                    <script type="text/javascript">
                        setTimeout(function() {
                                $('#mydiv').fadeOut('fast');
                            }, 3000); // <-- time in milliseconds
                      </script>
              </div>
              @endif

              @if ($message = Session::get('error'))
              <div class="alert alert-warning alert-dismissible" id="mydiv2" >
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $message }}
                    <script type="text/javascript">
                        setTimeout(function() {
                                $('#mydiv2').fadeOut('fast');
                            }, 3000); // <-- time in milliseconds
                      </script>
              </div>
              @endif


              <form action="{{ url('/postchangepassword')}}" method="post">
              @csrf  
                 <div class="card-body">
                 <div class="form-group">
                        <label   for="form-facebook">Current Password</label>
                        <input type="text" name="current_password"  value=""  class="form-facebook form-control" id="bank_registered_name">
                    </div>
                    <div class="form-group">
                        <label  for="form-twitter">New Password</label>
                        <input type="text" name="new_password"  value="" class="form-twitter form-control" id="bank_name">
                    </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" name="admin_id" value="{{$admin_id}}">
                  <button type="submit" class="btn btn-primary" onclick="return formValidation();">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
 

           
           
            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('yoursricpt')
<script>
   function formValidation(){ 
    var rv = true;
   $('input').each(function() { 
    $(this).css({'background-color' : ''});
          if($(this).val()==""){
            console.log($(this).val());
            //  alert('Some fields are empty');
            $(this).css({' outline-color' : 'red'});
            $(this).focus();
            return rv = false;
         } 
    });  
    return rv; 

  }
</script>

@endsection