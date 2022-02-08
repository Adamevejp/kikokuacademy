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
                <h3 class="card-title">Documents</h3>
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
              <form action="{{ url('/postDocument')}}" method="post" enctype='multipart/form-data' >
              @csrf  
                 <div class="card-body">
                 <div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Documents (full-time employees)</h3>  
											<p>You are required to submit different documents depending on your visa status. Open the link below and review which documents you are meant to submit based on your visa status.</p>
                                            <hr>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-file-o"></i>

                                  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I am a Japanese citizen" ) 
                                  <span>Residence card (zairyu card) (if applicable)
                                  </span>  <br> <input type="file" name="document1">
                                  @endif 
                                  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I am a permanent resident" )
                                  <span>Residence card (zairyu card) (if applicable)
                                  </span>  <br> <input type="file" name="document1">
                                  @endif 
                                  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a family-related visa" )
                                  <span>Residence card (zairyu card) (if applicable)
                                  </span>  <br><input type="file" name="document1">
                                  @endif 

                                  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a work visa" ) 
                                 <span>Residence card (zairyu card) (if applicable)
                                  </span>  <br><input type="file" name="document1">
                                  <br><br>
                                  <span>Passport copy (photo page)
                                  </span>  <br>  <input type="file" name="document1">
                                  @endif

                                 
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
										 
									 
				                      
				                    </div>
				                       
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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