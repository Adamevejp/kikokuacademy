@extends('layouts.adminportal')
@section('content')
  <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Event Listing</h1>
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
              <a href="{{url('/')}}/addEvents"><button class="btn btn-success">Add Event</button></a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Event Name</th>  
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th> 
                    <th>Action</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  @if(isset($Calendardata))   
                   @foreach($Calendardata as $k =>$Calendar) 
                  <tr>
                    <td> {{$Calendar->title}} </td>
                    <td>{{$Calendar->start}}</td>
                    <td>{{$Calendar->end}}</td>
                    <td>{{$Calendar->description}}</td> 
                    <td> <a href="javascript:void()" onclick ="confirmremove({{$Calendar->id}});">Delete</a> </td>
                  </tr>
                    @endforeach 
                  @endif
                   
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
 
    function confirmremove(id){
        if (confirm("is this okay?")) {
            var urlname = '{{url("/")}}/deleteEvent/'+id;
            window.location.href  = urlname;
        }
    }

    function confirmhide(id){
        if (confirm("is this okay?")) {
            var urlname = '{{url("/")}}/changeEvent/'+id;
            window.location.href  = urlname;
        }
    }

    

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