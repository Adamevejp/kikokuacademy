@extends('layouts.adminportal')
@section('content')
  <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Holidays</h1>
          </div>
           
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <div class="card">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Employee Name</th> 
                    <th>Email</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Leave Type</th> 
                    <th>Leave Days</th>
                    <th>Acition</th>
                  </tr>
                  </thead>
                  <tbody> 
                  </tbody>
               
                </table>
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
    function trigger(triggerValue,event_id){
           // alert(triggerValue); 
            var token  = $("#token").val(); 
            $.ajax({
            url: '{{url("/")}}/eventschangestatus',
            data: 'event_status='+triggerValue+'&_token='+token+'&event_id='+event_id,
            type: 'POST',
            dataType: 'json',
            success: function(response){   
              //  console.log(response);
              //  location.reload();
            },
            error: function(e){
              console.log(e.responseText);
            }
          });
    }
</script>
@endsection 