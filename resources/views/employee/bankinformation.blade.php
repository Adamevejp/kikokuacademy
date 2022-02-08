@extends('layouts.employeeportal')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My information</h1>
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
                <h3 class="card-title">Bank Information</h3>
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
              <form action="{{ url('/postbankinformation')}}" method="post">
              @csrf  
                 <div class="card-body">
                   <div class="row">
                   <div class="form-group col-md-3">
                        <label   for="form-facebook">Registered Name on Bank Account</label>
                        <input type="text" name="bank_registered_name"  value="{{$employeedata['bank_registered_name']}}" placeholder="Registered Name on Bank Account..." class="form-facebook form-control" id="bank_registered_name">
                    </div>
                    <div class="form-group col-md-3">
                        <label  for="form-twitter">Bank Name</label>
                        <input type="text" name="bank_name"  value="{{$employeedata['bank_name']}}" placeholder="Bank Name..." class="form-twitter form-control" id="bank_name">
                    </div>
                    <div class="form-group col-md-3">
                        <label  for="form-google-plus">Branch Name</label>
                        <input type="text" name="bank_branch_name"  value="{{$employeedata['bank_branch_name']}}" placeholder="Branch Name..." class="form-google-plus form-control" id="bank_branch_name">
                    </div>
                   </div>
                 
                   <div class="row">
                 
                    <div class="form-group col-md-3">
                        <label   for="form-google-plus">Branch Number</label>
                        <input type="text" name="bank_branch_number"   value="{{$employeedata['bank_branch_number']}}" placeholder="Branch Number..." class="form-google-plus form-control" id="bank_branch_number">
                    </div>
                    <div class="form-group col-md-3">
                        <label  for="form-google-plus">Account Number</label>
                        <input type="text" name="bank_account_number"  value="{{$employeedata['bank_account_number']}}" placeholder="Account Number..." class="form-google-plus form-control" id="bank_account_number">
                    </div>  
                   </div>
                   
                            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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