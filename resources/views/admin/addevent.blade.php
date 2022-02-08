@extends('layouts.adminportal')
@section('content')
  <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Event</h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <div class="card">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{ url('/postevents')}}" method="post">
              @csrf   
                            <div class="form-bottom"> 
                            <div class="form-group">
                    <label for="exampleInputEmail1">Event Name</label>
                    <input type="text" class="form-control" name="event_name" id="exampleInputEmail1" placeholder="Enter Event Name"  value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Start Date</label>
                    <input type="date" class="form-control" name="start" id="exampleInputPassword1" placeholder="Enter Start Date"  value="">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">End Date</label>
                    <input type="date" class="form-control" name="end" id="exampleInputPassword1" placeholder="Enter End Date"  value="">
                    <span>If event have more then one day.</span>
                  </div>
 
        
                  
 
                  <div class="form-group">
                    <label   for="form-about-yourself">Details</label>
                    <textarea name="details" placeholder="Details of events..." 
                          class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                        
                  </div> 
										

                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Event</button>
                </div>
              </form>
                 
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
            alert(triggerValue);

            var token  = $("#token").val();


            $.ajax({
            url: '{{url("/")}}/eventschangestatus',
            data: 'event_status='+triggerValue+'&_token='+token+'&event_id='+event_id,
            type: 'POST',
            dataType: 'json',
            success: function(response){   
              //  console.log(response);
                location.reload();
            },
            error: function(e){
              console.log(e.responseText);
            }
          });
    }
</script>
@endsection 