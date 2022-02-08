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
                <h3 class="card-title">Family Information</h3>
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
              <form action="{{ url('/postfamily')}}" method="post">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                 <div class="card-body">
                     <p>This information is required for the Japanese health insurance program.</p>
                 <hr>
                     <span>Marital Status</span>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="marital_status" id="exampleRadios1" value="1" @if(isset($employeedata['marital_status']) && $employeedata['marital_status']==1 ) checked  @endif >
                        <label class="form-check-label" for="exampleRadios1">
                            Single
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="marital_status" id="exampleRadios2" value="2" @if(isset($employeedata['marital_status']) && $employeedata['marital_status']==2 ) checked  @endif >
                        <label class="form-check-label" for="exampleRadios2">
                            Married
                        </label>
                        </div>
                        <br>

                        <div class="form-group col-md-3">
                        <span>Do you have a family in Japan?</span>  <br>
                         <select class="form-control is_family_japan" id="is_family_japan" name="is_family_japan" aria-label="Default select example">
                            <option selected>Please select</option>
                            <option value="1" @if(isset($employeedata['is_family_japan']) && $employeedata['is_family_japan']==1 ) selected  @endif >Yes</option>
                            <option value="2" @if(isset($employeedata['is_family_japan']) && $employeedata['is_family_japan']==2 ) selected  @endif >No</option> 
                         </select>
                        </div>    

                    
  <div class="FamilyMembers  container-fluid"  @if(isset($employeedata['is_family_japan']) && $employeedata['is_family_japan']==1 ) style="display:block;" @else style="display:none;"   @endif >  
               
        <!-- dynamaic family member details start   -->

        @if(isset($employeefamilydata))
          @foreach($employeefamilydata as $k => $value)
                <div class="card innerdiv_{{$k+1}}" style="background:#fbf8f8;"> 
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Family Member #{{$k+1}}</h3> 
                    <input type="hidden" name="family_member_id[]" value="{{$value->id}}">
                    <a href="javascript:void(0);" onclick="removefamilymembersdynamic({{$k+1}},{{$value->id}});">Remove</a>  
                  </div>
                </div> 
                 <div class="card-body form-group"> 

                 <div class="row">

                    <div class="col-md-4">
                           <label  for="form-google-plus">Full name</label>
                          <input type="text" name="full_name[]"  value="{{$value->member_full_name}}" placeholder="" class="form-google-plus form-control" >
                    </div>
                    <div class="col-md-4">
                    <label  for="form-google-plus">Katakana/Furigana for family member #{{$k+1}}</label>
                          <input type="text" name="katakana_family[]"  value="{{$value->member_katakana}}" placeholder="" class="form-google-plus form-control" >
                    </div>

                    <div class="col-md-4">
                    <label  for="form-google-plus">Kanji for family member #{{$k+1}} (if applicable)</label>
                          <input type="text" name="kanji_family[]"  value="{{$value->member_kanji}}" placeholder="" class="form-google-plus form-control" >
                    </div>


                 </div>

                       <br/>
                 <div class="row">

                 <div class="col-md-4">


                 <span>  Relationship #{{$k+1}} </span>
                          <div class="form-check">
                        <input class="form-check-input" type="radio" name="ralation_{{$k+1}}" id="exampleRadios2" value="spouse" @if(isset($value->member_relations) && $value->member_relations=="spouse" ) checked @endif >
                        <label class="form-check-label" for="exampleRadios2">
                           Spouse 
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="ralation_{{$k+1}}" id="exampleRadios2" value="child"  @if(isset($value->member_relations) && $value->member_relations=="child" ) checked @endif >
                        <label class="form-check-label" for="exampleRadios2">
                           Child
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="ralation_{{$k+1}}" id="exampleRadios2" value="parent" @if(isset($value->member_relations) && $value->member_relations=="parent" ) checked @endif >
                        <label class="form-check-label" for="exampleRadios2">
                            Parent
                        </label>
                        </div> 

                 </div>

                 <div class="col-md-4">

                 <span>  Gender #{{$k+1}} </span>
                          <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender_{{$k+1}}" id="exampleRadios2" value="female" @if(isset($value->member_gender) && $value->member_gender=="female" ) checked @endif >
                        <label class="form-check-label" for="exampleRadios2">
                           Female 
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender_{{$k+1}}" id="exampleRadios2" value="male" @if(isset($value->member_gender) && $value->member_gender=="male" ) checked @endif>
                        <label class="form-check-label" for="exampleRadios2">
                           Male
                        </label>
                        </div>
                        <br>
                       
                </div>

                 </div>
                         
                 <br>  

                 <div class="row">
                    <div class="col-md-4">
                    <label  for="form-google-plus">Date of Birth</label>
                    <input type="date" name="date_birth[]"  value="{{$value->date_birth}}" placeholder="" class="form-google-plus form-control" >
                   </div> 

                   <div class="col-md-4">
                   <span>  Is this person your dependent? #{{$k+1}} </span>
                          <div class="form-check">
                        <input class="form-check-input" type="radio" name="dependents_{{$k+1}}" id="exampleRadios2" value="yes"  @if(isset($value->member_dependency) && $value->member_dependency=="yes" ) checked @endif >
                        <label class="form-check-label" for="exampleRadios2">
                           Yes 
                        </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="dependents_{{$k+1}}" id="exampleRadios2" value="no"  @if(isset($value->member_dependency) && $value->member_dependency=="no" ) checked @endif>
                        <label class="form-check-label" for="exampleRadios2">
                           No
                        </label>
                        </div> 
                   </div>
                 </div>
                   
                        
                         
                    </div> 
                  </div> 

                   @endforeach
                 @endif 




                  <!-- dynamaic family member details end  -->

 
                         <div class="container-fluid extrafamily"> 
                        </div>

                          <div> <a href="javascript:void();" onclick="handleChange1();">Add More</a></div>
 
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
           

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
  $(document).ready(function() {
        $( "#is_family_japan" ).change(function() {
      //  $("#is_family_japan").one('click', function () {  

          $(".FamilyMembers").hide();
           if(this.value==1){
            $(".FamilyMembers").show();
           } 
           //$(".FamilyMembers").append('<div class="form-group"> <label  for="form-google-plus">Account Number</label><input type="text" name="bank_account_number"  value="" placeholder="Account Number..." class="form-google-plus form-control" id="bank_account_number"></div>');
        }); 
 });

 
function handleChange1(){ 
      var lengthvalue = $(".extrafamily").length; 
      var lengthvalue2 = $("div.form-group").length;  
      if(lengthvalue==1){
        $(".extrafamily").show();
        $(".extrafamily").append('<div class="form-group card  innerdiv_'+lengthvalue2+'"  style="background:#fbf8f8;"> <input type="hidden" name="family_member_id[]" value="0"><div class="card-header border-0"><div class="d-flex justify-content-between"> <h3 class="card-title"> Family Member</h3><a href="javascript:void(0);" onclick="removefamilymembers('+lengthvalue2+');">Remove</a>  </div>  </div> <div class="row"> <div class="col-md-4"> <label  for="form-google-plus">Full name</label> <input type="text" name="full_name[]"  value="" placeholder="" class="form-google-plus form-control" > </div> <div class="col-md-4"> <label  for="form-google-plus">Katakana/Furigana for family member </label> <input type="text" name="katakana_family[]"  value="" placeholder="" class="form-google-plus form-control" > </div> <div class="col-md-4"> <label  for="form-google-plus">Kanji for family member  (if applicable)</label><input type="text" name="kanji_family[]"  value="" placeholder="" class="form-google-plus form-control" > </div>  </div>  <br> <div class="row">  <div class="col-md-4"><span>  Relationship  </span>   <div class="form-check">  <input class="form-check-input" type="radio" name="ralation_'+lengthvalue2+'" id="exampleRadios2" value="spouse"  > <label class="form-check-label" for="exampleRadios2">Spouse   </label> </div>   <div class="col-md-4"> <div class="form-check"> <input class="form-check-input" type="radio" name="ralation_'+lengthvalue2+'" id="exampleRadios2" value="child"  > <label class="form-check-label" for="exampleRadios2">Child  </label> </div>  <div class="form-check"> <input class="form-check-input" type="radio" name="ralation_'+lengthvalue2+'" id="exampleRadios2" value="parent" ><label class="form-check-label" for="exampleRadios2"> Parent </label> </div> </div> </div>    <br>  <div class="col-md-4"> <span>  Gender  </span>  <div class="form-check">   <input class="form-check-input" type="radio" name="gender_'+lengthvalue2+'" id="exampleRadios2" value="female"  > <label class="form-check-label" for="exampleRadios2">Female   </label>  </div> <div class="form-check">  <input class="form-check-input" type="radio" name="gender_'+lengthvalue2+'" id="exampleRadios2" value="male" ><label class="form-check-label" for="exampleRadios2">  Male  </label> </div>  </div> </div> <br> <div class="row">  <div class="col-md-4"><label  for="form-google-plus">Date of Birth</label> <input type="date" name="date_birth[]"  value="" placeholder="" class="form-google-plus form-control" > </div>  <div class="col-md-4"> <span>  Is this person your dependent?   </span><div class="form-check">  <input class="form-check-input" type="radio" name="dependents_'+lengthvalue2+'" id="exampleRadios2" value="yes"  > <label class="form-check-label" for="exampleRadios2"> Yes   </label>  </div> <div class="form-check"> <input class="form-check-input" type="radio" name="dependents_'+lengthvalue2+'" id="exampleRadios2" value="no" ><label class="form-check-label" for="exampleRadios2">No </label> </div></div></div></div>');
      }  
}


function removefamilymembers(temp){
       // alert('i am back.');
      var lengthvalue = $(".extrafamily").length; 
      var lengthvalue2 = $("div.form-group").length;  
      $(".innerdiv_"+temp).remove();
}

function removefamilymembersdynamic(temp,member_id){
       // alert('i am back.');
          var txt;
          var r = confirm("Are you want to remove this member!");
          if (r == true) {
            var lengthvalue = $(".extrafamily").length; 
            var lengthvalue2 = $("div.form-group").length;  
            $(".innerdiv_"+temp).remove();
          }  


      var token = $("#token").val();
      
       $.ajax({
            type: "POST",
            url: '{{url("/")}}/removefamilymember',
            data: {member_id: member_id,_token: token},
            dataType: 'JSON',
            success: function( msg ) {
              console.log(msg);
             if(msg=='1'){ 
                 return true;
             }    

            }
        });



}


</script>
@endsection