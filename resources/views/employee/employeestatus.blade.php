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
                <h3 class="card-title">Employment  Status</h3>
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
              <form action="{{ url('/postemployeestatus')}}" method="post">
              @csrf  
                 <div class="card-body">
                   <span>Employment  Status</span>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="employee_status" value="1" onclick="checkmeDivEnable(true);" id="employee_status"  @if(isset($employeedata['employee_status']) && $employeedata['employee_status']==1 ) checked  @endif  >
                        <label class="form-check-label" for="employee_status">
                            Full Time
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="employee_status"    id="employee_status2" value="2" onclick="checkmeDivEnable(false);"  @if(isset($employeedata['employee_status']) && $employeedata['employee_status']==2 ) checked  @endif>
                        <label class="form-check-label" for="employee_status2">
                            Part Time or Substitute
                        </label>
                        <br>  
                        <span>Leave this question blank if you are unsure.</span>
                        <br><br></div>

                        <div class="form-group col-md-4">
                        <span>What is your main school?</span>  <br>
                            <select class="form-control" name="main_school" aria-label="Default select example">
                            <option selected>Please select</option> 
                            <option value="Funabashi" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Funabashi' ) selected  @endif>Funabashi</option>
                            <option value="Kichijoji" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Kichijoji' ) selected  @endif>Kichijoji</option> 
                           
                            <option value="Meguro" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Meguro' ) selected  @endif>Meguro</option>
                            <option value="Meidaimae" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Meidaimae' ) selected  @endif>Meidaimae</option> 

                            <option value="Nishifunabashi" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Nishifunabashi' ) selected  @endif>Nishifunabashi</option>
                            <option value="Shimokitazawa" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Shimokitazawa' ) selected  @endif>Shimokitazawa</option> 

                            <option value="Tama Plaza" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Tama Plaza' ) selected  @endif>Tama Plaza</option>
                            <option value="Toritsudaigaku" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Toritsudaigaku' ) selected  @endif>Toritsudaigaku</option> 

                            <option value="KTech" @if(isset($employeedata['main_school']) && $employeedata['main_school']=="KTech" ) selected  @endif>KTech</option>
                            <option value="KAIS EMS" @if(isset($employeedata['main_school']) && $employeedata['main_school']=="KAIS EMS" ) selected  @endif>KAIS EMS</option> 

                            <option value="KAIS HS" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='KAIS HS' ) selected  @endif>KAIS HS</option>
                            <option value="Offices" @if(isset($employeedata['main_school']) && $employeedata['main_school']=='Offices' ) selected  @endif>Offices</option> 

                             
                            </select>
                    </div>
				                    		 
				                       
                </div>
                <!-- /.card-body -->


                <div class="card card-primary" id="insuranceDiv" @if(isset($employeedata['employee_status']) && $employeedata['employee_status']==2 )  style="display:none;"  @endif>
              <div class="card-header">
                <h3 class="card-title">Insurance</h3>
              </div>
           
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
                      <div class="form-group col-md-4">
                      <span>If applicable, write your unemployment insurance number (kōyō hoken, 雇用保険).</span>
                      <input type="text" name="unemployment_insurance_number" placeholder="" class="form-google-plus form-control" id="form-google-plus" value="{{$employeedata['unemployment_insurance_number']}}">
                      </div>
				                    		 
				                       
                </div>
                <!-- /.card-body -->

               
            </div>

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

@section('yoursricpt')

<script>
  function checkmeDivEnable(checkedme){ 
       if(checkedme)
       $("#insuranceDiv").show(); 
       else 
       $("#insuranceDiv").hide(); 

  }
</script>
@endsection