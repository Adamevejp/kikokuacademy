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
                <h3 class="card-title">Insurance</h3>
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
              <form action="{{ url('/postinsurance')}}" method="post">
              @csrf  
                 <div class="card-body">
                     <p>All full-time teachers are required by law to join the company health insurance program. This is standard in Japan. The questions below are being asked for insurance purposes.</p>
                     <hr>
                 <span>Employment  Status</span>
                 <span>What kind of insurance did you have in Japan before joining KA?</span>
										<div class="form-check"> 
											<input class="form-check-input" type="radio" name="what_kind_insurance" id="exampleRadios1" value="Social Insurance"  @if(isset($employeedata['what_kind_insurance']) && $employeedata['what_kind_insurance']=="Social Insurance" ) checked  @endif >
											<label class="form-check-label" for="exampleRadios1">
												Social Insurance (Shakai hoken, 社会保険) from a different company 
											</label>
										  </div>
										  <div class="form-check">
											<input class="form-check-input" type="radio" name="what_kind_insurance" id="exampleRadios2" value="National Health Insurance"  @if(isset($employeedata['what_kind_insurance']) && $employeedata['what_kind_insurance']=="National Health Insurance" ) checked  @endif >
											<label class="form-check-label" for="exampleRadios2">
												National Health Insurance (Kokumin kenkō hoken, 国民健康保険) 
											</label>
										  </div>
										  <div class="form-check">
											<input class="form-check-input" type="radio" name="what_kind_insurance" id="exampleRadios2" value="I did not have insurance"  @if(isset($employeedata['what_kind_insurance']) && $employeedata['what_kind_insurance']=="I did not have insurance" ) checked  @endif >
											<label class="form-check-label" for="exampleRadios2">
												I did not have insurance 
											</label>
										  </div>
										  <div class="form-group">
				                        	<span>If applicable, write your unemployment insurance number (kōyō hoken, 雇用保険).</span>
				                        	<input type="text" name="unemployment_insurance_number" placeholder="" class="form-google-plus form-control" id="form-google-plus" value="{{$employeedata['unemployment_insurance_number']}}">
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