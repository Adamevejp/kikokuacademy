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
                <h3 class="card-title">Emergency Contact</h3>
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
              <form action="{{ url('/postemergancycontact')}}" method="post">
              @csrf  
                 <div class="card-body">  
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" placeholder="Enter First Name"  value="{{$employeedata['first_name']}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" id="exampleInputPassword1" placeholder="Enter Middle Name"  value="{{$employeedata['middle_name']}}">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Family Name</label>
                    <input type="text" class="form-control" name="last_name" id="exampleInputPassword1" placeholder="Enter Family Name"  value="{{$employeedata['last_name']}}">
                  </div> 
                  <div class="form-group">
                    <label  for="form-last-name">Katakana / Furigan First Name</label>
                     <input type="text" name="katakana" placeholder="Katakana / Furigan Fistt Name" class="form-last-name form-control" id="form-last-name" value="{{$employeedata['katakana']}}">
                </div>

                <div class="form-group">
                    <label  for="form-last-name">Katakana / Furigan Family Name</label>
                     <input type="text" name="katakana" placeholder="Katakana / Furigan Family Name" class="form-last-name form-control" id="form-last-name" value="{{$employeedata['katakana']}}">  
                </div>

                 <div class="form-group">
                    <label  for="form-last-name">Kanji First Name (If aaplicable)</label>
                    <input type="text"  name="dob" placeholder="Kanji First Name" class="form-last-name form-control" id="form-last-name"  value="{{$employeedata['dob']}}">
                  </div>


                  <div class="form-group">
                    <label  for="form-last-name">Kanji Family Name (If aaplicable)</label>
                     <input type="text" name="katakana" placeholder="Kanji Family Name " class="form-last-name form-control" id="form-last-name" value="{{$employeedata['katakana']}}">
                     
                </div>



                <div class="form-group">
                    <label   for="form-password">Relationship to You</label>
                    <input type="text" name="emergancy_relation" placeholder="Relationship to You..." class="form-password form-control" id="form-password" value="{{$employeedata['emergancy_relation']}}">
                </div>
                <div class="form-group">
                    <label   for="form-repeat-password">Phone Number</label>
                    <input type="text" name="emergancy_phone" placeholder="Phone Number..." 
                    class="form-repeat-password form-control" id="form-repeat-password" value="{{$employeedata['emergancy_phone']}}">
                    <span>Please include the country code if outside of Japan.</span>
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