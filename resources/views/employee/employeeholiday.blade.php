@extends('layouts.employeeportal')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" name="event_id" id="event_id">
          <h4 class="modal-title">Description</h4> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <textarea name="" id="event_description" cols="55" rows="10"></textarea>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning removeEventsTrigger" >Remove</button>
          <button type="button" class="btn btn-primary updateEventwithDescription">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="employee_id" id="employee_id" value="{{$employeedata->id}}">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row card-body">


            <div class="card card-widget widget-user-2 shadow-sm" style="width: 50%;background-color:#00800052;"> 
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    Total number <br/> of paid holidays remaining  <br/>
                    </a>
                  </li> 
                  <li style="font-size: 42px;">
                  <span class="float-right badge bg-success"> {{$employeedata->total_number_remaining_holiday}} </span>
                  </li>
                </ul>
              </div>
            </div>

            <div class="card card-widget widget-user-2 shadow-sm" style="width: 50%;background-color:#00800052;"> 
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                     Number of days <br/> taken this year
                    </a>
                  </li>
                  <li style="font-size: 42px;">
                  <span class="float-right badge bg-success">{{$yearCount}}</span>
                  </li>
                  
                </ul>
              </div>
            </div>

            <div class="card card-widget widget-user-2 shadow-sm" style="width: 50%;background-color:#00800052;"> 
              <div class="card-footer p-0">
                <ul class="nav flex-column"> 
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    Number of days expiring <br/> at the end of September<br/> 
                    </a>
                  </li> 
                  <li style="font-size: 42px;">
                  <span class="float-right badge bg-success">0</span>
                  </li>
                </ul>
              </div>
            </div>
            

            @if($employeefamilyCount>0)
            <div class="card card-widget widget-user-2 shadow-sm" style="width: 50%;background-color:#f5c0ff;"> 
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item" >
                    <a href="#" class="nav-link">
                    Total number <br/> of child leave days remaining <br/> 
                    </a>
                  </li> 
                  <li style="font-size: 42px;">
                  <span class="float-right badge bg-danger"> @if($employeefamilyCount==1) {{5-$childyearCount}} @elseif ($employeefamilyCount>1) {{10-$childyearCount}} @endif </span>
                  </li>
                </ul>
              </div>
            </div>

            <div class="card card-widget widget-user-2 shadow-sm" style="width: 50%;background-color:#f5c0ff;"> 
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  
                  <li class="nav-item" >
                    <a href="#" class="nav-link">
                     Number of days <br/> taken this year <br/>
                    </a>
                  </li>
                  <li style="font-size: 42px;">
                     <span class="float-right badge bg-danger">{{$childyearCount}}</span>
                  </li>
                  
                </ul>
              </div>
            </div>

            <div class="card card-widget widget-user-2 shadow-sm" style="width: 50%;background-color:#f5c0ff;"> 
              <div class="card-footer p-0">
                <ul class="nav flex-column"> 
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    Number of days expiring <br/> at the end of September<br/> 
                    </a>
                  </li> 
                  <li style="font-size: 42px;">
                  <span class="float-right badge bg-danger">0</span>
                    </li>
                </ul>
              </div>
            </div>

            @endif 

 
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            
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
              <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-3">
            <div class="sticky-top mb-3">
            <div class="card">  
                <div class="card-body" style="display:none;">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px; display:none;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul> 
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group" style="display:none;">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->  
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                   <h4 class="card-title">Drag and Drop to request of day off </h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success fc-event"  data-color="4ca722">Paid Holiday (Full Day)</div>
                    <div class="external-event bg-success fc-event" data-color="4ca746">Paid Holiday (Half Day)</div>
                    @if($employeefamilyCount>0)
                    <div class="external-event bg-primary fc-event" style="background-color:#ea58f9 !important" data-color="f8c146">Child Leave (Full Day)</div>
                    <div class="external-event bg-primary fc-event" style="background-color:#ea58f9 !important" data-color="157af6" >Child Leave (Half Day)</div>
                    @endif 
                     <!--  <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div> -->
                    <div class="checkbox" style="display: none;">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                          remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
              
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



   
   $(function () { 

 



/* initialize the external events
 -----------------------------------------------------------------*/
function ini_events(ele) {
  ele.each(function () {

    // create an Event Object (https://fullcalendar.io/docs/event-object)
    // it doesn't need to have a start or end
    var eventObject = {
      title: $.trim($(this).text()), // use the element's text as the event title
      color: $(this).data("color")
    }

    

    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject)

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex        : 1070,
      revert        : true, // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    })

  })
}

ini_events($('#external-events div.external-event'))

/* initialize the calendar
 -----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var date = new Date()
var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()

var Calendar = FullCalendar.Calendar;
var Draggable = FullCalendar.Draggable;

var containerEl = document.getElementById('external-events');
var checkbox = document.getElementById('drop-remove');
var calendarEl = document.getElementById('calendar');

// initialize the external events
// -----------------------------------------------------------------

new Draggable(containerEl, {
  itemSelector: '.external-event',
  eventData: function(eventEl) {
    return {
      title: eventEl.innerText,
      backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
      borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
      textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
    };
  }
});


     var eventData = {};
     var json_events=[];
       
    var employee_id = $("#employee_id").val();
    var token = $("#token").val();
       $.ajax({
            url: '{{url("/")}}/schedulecalendar',
            data: 'employee_id='+employee_id+'&_token='+token,
            type: 'POST',
            dataType: 'json',
            success: function(response){  
                  response.forEach(function(ele,key){ 
                     console.log(ele.employee_id); 

                    if(ele.end)
                  {
                    var endDate = new Date(ele.end);
                    beforeDay = new Date(endDate.getFullYear(),endDate.getMonth(),endDate.getDate() + 1);  
                    ele.end =   moment(beforeDay).format('YYYY-MM-DD');
                  }


                  var AdminEvents = ele.title;

                  if(ele.status==1)
                  ele.title  = ele.title + ' : Pending';
                 else if(ele.status==2)
                   ele.title  = ele.title + ' : Approved';
                  else 
                  ele.title  = ele.title + ' : Cancel';


                  if(ele.description)
                  {
                     ele.display =ele.description
                  }

                  if(ele.employee_id==0)
                  {
                    ele.backgroundColor = '#ba8b31';
                    ele.borderColor = '#ba8b31';
                    ele.title  = AdminEvents ;
                  } else {
                    ele.backgroundColor = "#"+ele.boxclass;
                    ele.borderColor = "#"+ele.boxclass;
                  }  
                    json_events.push(ele); 
                    console.log(json_events);  
                });  
                showCalendar();
            },
            error: function(e){
              console.log(e.responseText);
            }
     }); 

   $(".updateEventwithDescription").click(function(){
        var event_id =  $("#event_id").val(); 
        var employee_id = $("#employee_id").val();
        var event_description = $("#event_description").val();
        var token = $("#token").val();
        var start = '';
        var end = '';  
       $.ajax({
            url: '{{url("/")}}/eventsupdate',
            data: 'event_description='+event_description+'&_token='+token+'&event_id='+event_id+'start='+start+'&end='+end+'&employee_id='+employee_id,
            type: 'POST',
            dataType: 'json',
            success: function(response){   
                // console.log(response);
                // location.reload();
                if(response)
                location.reload();
                else {
                alert('You are not able to take holiday');
                location.reload();
                }
                              
            },
            error: function(e){
              console.log(e.responseText);
            }
          });

   });       

  $(".removeEventsTrigger").click(function() {
        if (confirm("Are you sure for delete Holiday  .")) {
        var event_id =  $("#event_id").val(); 
        var employee_id = $("#employee_id").val();
        var token = $("#token").val();
       $.ajax({
            url: '{{url("/")}}/eventRemove',
            data: 'employee_id='+employee_id+'&_token='+token+'&event_id='+event_id,
            type: 'POST',
            dataType: 'json',
            success: function(response){   
                console.log(response);
                location.reload();
            },
            error: function(e){
              console.log(e.responseText);
            }
          });
                    
           }
  });      

       
  function showCalendar(){

                    var calendar = new Calendar(calendarEl, {
                    headerToolbar: {
                    left  : 'prev,next today',
                    center: 'title',
                    right : ''
                    }, 
       
                    // defaultDate: $.fullCalendar.moment().startOf('week'),
                    themeSystem: 'bootstrap',
                    //Random default events
                    events: json_events,
                    timeZone: 'UTC',
                    // validRange: { start: new Date(),
                    //   end: ‘2025-06-01’
                    //  },
                    editable  : true,
                    droppable : true, // this allows things to be dropped onto the calendar !!!
                    drop      : function(info) {
                            // console.log(info.draggedEl.innerText); 
                            // return false; 
                            
                            var color = info.draggedEl.dataset.color;
 
                            var title = info.draggedEl.innerText;

                            var employee_id = $("#employee_id").val();
                            var token = $("#token").val();
                            $.ajax({
                            url: '{{url("/")}}/save_start_date_holiday',
                            data: 'employee_id='+employee_id+'&_token='+token+'&start_date='+info.dateStr+'&colorclass='+color+'&title='+title,
                            type: 'POST',
                            dataType: 'json',
                            success: function(response){ 
                            //   event.id = response.eventid;
                            //   event.created_by=response.created_by;
                                console.log(response);

                                if(response)
                                location.reload();
                                else {
                                  if(response==2)
                                  alert('holiday issue date is not define');
                                  else 
                                  alert('You are not able to take holiday');

                                  location.reload();
                                }
                              
                                // $('#calendar').fullCalendar('updateEvent',event);
                            },
                            error: function(e){
                                console.log(e.responseText);
                            }
                            });  
                          

                    },
                    eventDrop: function(info,revertFunc) {
                     
                      //var color = info.draggedEl.dataset.color;
                     // console.log(color);

        
                            var end ='';
                            if(info.event.endStr!=''){
                            end_date = new Date(info.event.endStr);
                            var endDate = new Date(end_date);
                            beforeDay = new Date(endDate.getFullYear(),endDate.getMonth(),endDate.getDate() - 1);  
                            // alert(info.event.title + "eventResize start  " + info.event.startStr);
                            // alert(info.event.title + " eventResize end is now " + moment(beforeDay).format('YYYY-MM-DD'));
                            end = moment(beforeDay).format('YYYY-MM-DD');
                            }


                            var event_id =  info.event.id; 
                            var start  = info.event.startStr; 
                            var employee_id = $("#employee_id").val();
                           // console.log(start);  console.log(start);
                            var token = $("#token").val();
                            var event_description = '';
                            $.ajax({
                                url: '{{url("/")}}/eventsupdate',
                                data: 'start='+start+'&_token='+token+'&event_id='+event_id+'&end='+end+'&event_description='+event_description+'&employee_id='+employee_id,
                                type: 'POST',
                                dataType: 'json',
                                success: function(response){   
                                console.log(response);
                               // location.reload();
                                if(response)
                                location.reload();
                                else {
                                  alert('You are not able to take holiday');
                                  location.reload();
                                }
                              

                                },
                                error: function(e){
                                console.log(e.responseText);
                                }
                            });


                         
                          
                    },
                    eventResize: function(info) {
                     // console.log(info.draggedEl);  
                    end_date = new Date(info.event.endStr);
                    var endDate = new Date(end_date);
                    beforeDay = new Date(endDate.getFullYear(),endDate.getMonth(),endDate.getDate() - 1);
                    
                        if (!confirm("is this okay?")) {
                           info.revert();
                        } else {
                            var event_id =  info.event.id; 
                            var start  = info.event.startStr;
                            var end  = moment(beforeDay).format('YYYY-MM-DD');
                            var employee_id = $("#employee_id").val();
                            console.log(start);  console.log(start);
                            var token = $("#token").val();
                            var event_description = '';
                            $.ajax({
                                url: '{{url("/")}}/eventsupdate',
                                data: 'start='+start+'&_token='+token+'&event_id='+event_id+'&end='+end+'&event_description='+event_description+'&employee_id='+employee_id,
                                type: 'POST',
                                dataType: 'json',
                                success: function(response){   
                                console.log(response);
                                // location.reload();
                                if(response)
                                location.reload();
                                else {
                                  alert('You are not able to take holiday');
                                  location.reload();
                                }
                              
                                
                                },
                                error: function(e){
                                console.log(e.responseText);
                                }
                            });
                        }


                    } ,
                    eventClick: function(event){
                        console.log(event);
                    $("#event_id").val(event.event.id);

                    if(event.event.display=='auto')
                    $("#event_description").val('');
                    else 
                    $("#event_description").val(event.event.display);

                    $("#modal-default").modal('show');


                    // calendar.render();
                    calendar.refetchEvents();

                    // $('#calendar').Calendar('updateEvent',event);
                    },  
                      
                    });

                    calendar.render();
     }    

// $('#calendar').fullCalendar()

/* ADDING EVENTS */
var currColor = '#3c8dbc' //Red by default
// Color chooser button
$('#color-chooser > li > a').click(function (e) {
  e.preventDefault()
  // Save color
  currColor = $(this).css('color')
  // Add color effect to button
  $('#add-new-event').css({
    'background-color': currColor,
    'border-color'    : currColor
  })
})
$('#add-new-event').click(function (e) {
  e.preventDefault()
  // Get value and make sure it is not null
  var val = $('#new-event').val()
  if (val.length == 0) {
    return
  }

  // Create events
  var event = $('<div />')
  event.css({
    'background-color': currColor,
    'border-color'    : currColor,
    'color'           : '#fff'
  }).addClass('external-event')
  event.text(val)
  $('#external-events').prepend(event)

  // Add draggable funtionality
  ini_events(event)

  // Remove event from text input
  $('#new-event').val('')
})
})
 </script>
@endsection