@extends('layouts.adminportal')
@section('content')
  <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Employee</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
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
              <div class="alert alert-warning alert-dismissible" id="mydiv" >
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $message }}
                    <script type="text/javascript">
                        setTimeout(function() {
                                $('#mydiv').fadeOut('fast');
                            }, 3000); // <-- time in milliseconds
                      </script>
              </div>
    @endif
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <div class="card">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{ url('/postEmployee')}}" method="post">
              @csrf   
               <div class="form-bottom"> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Employee First Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Employee Name"  value="" require>
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Employee Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="exampleInputEmail1" placeholder="Enter Employee Name"  value="">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Employee Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Employee Name"  value="" require>
                  </div> 
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="return validation();">Add Employee</button>
                </div></form>
                 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('yoursricpt')
<script>
    function validation(){
        var name = $("#name").val();
        if(name==""){
          $("#name").focus();
          return false ;
        }

        var email = $("#email").val();
        if(email==""){
          $("#email").focus();
          return false ;
        }
    }
</script>
@endsection 