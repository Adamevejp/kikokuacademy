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

    <!-- Main content  'employeevisadetaildata','employeecompaniedata','employeedegreedata','employeetraveleedata' -->

    <?php // if(empty($employeevisadetaildata))
     //dd($employeevisadetaildata);  ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Visa</h3>
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
              <form action="{{ url('/postvisa')}}" method="post"  enctype='multipart/form-data'>
              @csrf  
                 <div class="card-body">
                 <span>Which best describes your visa status. </span>

                 <div class="form-check">
                        <input class="form-check-input" type="radio" name="visa_status" id="exampleRadios2" value="I have a work visa"  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a work visa" ) checked  @endif  onchange="functionpoint3();">
                        <label class="form-check-label" for="exampleRadios2">
                            I have a work visa. 
                        </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="visa_status" id="exampleRadios2" value="I have a work visa, am currently in Japan"  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a work visa, am currently in Japan" ) checked  @endif  onchange="functionpoint3();" >
                        <label class="form-check-label" for="exampleRadios2">
                            I have a work visa, am currently in Japan, and coming from another company. 
                        </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="visa_status" id="exampleRadios2" value="I am coming from overseas"  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I am coming from overseas" ) checked  @endif  onchange="functionpoint4();">
                        <label class="form-check-label" for="exampleRadios2">
                            I am coming from overseas (and don't have a visa) or I have a tourist visa. 
                        </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="visa_status" id="exampleRadios9" value="I have a student visa and am currently in Japan"  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a student visa and am currently in Japan" ) checked  @endif onchange="functionpoint7();" >
                        <label class="form-check-label" for="exampleRadios9">
                            I have a student visa and am currently in Japan. 
                        </label>
                        </div>  

                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="visa_status" id="exampleRadios1" value="I am a Japanese citizen"  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I am a Japanese citizen" ) checked  @endif  onchange="functionpoint1();" >
                        <label class="form-check-label" for="exampleRadios1">
                            I am a Japanese citizen. 
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="visa_status" id="exampleRadios2" value="I am a permanent resident"  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I am a permanent resident" ) checked  @endif onchange="functionpoint2();" >
                        <label class="form-check-label" for="exampleRadios2">
                            I am a permanent resident. 
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="visa_status" id="exampleRadios2" value="I have a family-related visa"  @if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a family-related visa" ) checked  @endif onchange="functionpoint23();">
                        <label class="form-check-label" for="exampleRadios2">
                            I have a family-related visa (those granted according to their family status). 
                        </label>
                        </div>
                    
                       
                      
                     
                        
                        <br>
                        <div class="stepOneDiv" style="display:none;">
                          <div class="form-check">
                            <label for="residence">Period of validity of your residence card</label>
                            <input type="date" class="form-control" name="residence_validity_date_japan" value="@if(isset($employeedata->residence_validity_date)){{$employeedata->residence_validity_date}}@endif"   min="1900-01-01" max="2200-12-31">
                          </div>
                        </div>

                        <div class="workVisaDiv" style="display:none;">
            
                   <div id="part1">
                       <div class="row"> 
                      
                           <div class="col-md-5 form-check">
                            <label for="residence">What type of work visa do you have?</label>
                            <input type="text" class="form-control" name="work_visa" value="@if(isset($employeevisadetaildata[0]->type_of_visa)) {{$employeevisadetaildata[0]->type_of_visa}} @endif">
                            <span>Ex: Engineer/Specialist in Humanities/Int'l Services</span>
                           </div>   

                           <div class="form-check col-md-3">
                            <label for="residence">Expiry year of current visa</label>
                            <input type="date" class="form-control" name="currentvisaYear" id="currentvisaYear" value="@if(isset($employeevisadetaildata[0]->visa_expire_year)){{$employeevisadetaildata[0]->visa_expire_year}}@endif"  min="1900-01-01" max="2200-12-31">
                           </div>    
                           <div class="form-check col-md-4">
                            <label for="residence">Period of validity of your residence card</label>
                              <input type="date" class="form-control" name="validaity_residence_visa" value="@if(isset($employeevisadetaildata[0]->valididty_residence_date)){{$employeevisadetaildata[0]->valididty_residence_date}}@endif"   min="1900-01-01" max="2200-12-31">
                           </div>
                   </div> 
                  </div>
                  <br/>

                           <div id="part2"> 
                             <div class="row">  
                              <div class="form-check col-md-6">
                                <label for="residence">University Name</label>
                                <input type="text" class="form-control" name="university_name" value="@if(isset($employeedegreedata[0]->university_name)) {{$employeedegreedata[0]->university_name}} @endif">
                              </div> 
                              <div class="form-check col-md-6">
                                <label for="residence">Major/Degree</label>
                                <input type="text" class="form-control" name="degree" value="@if(isset($employeedegreedata[0]->degree)) {{$employeedegreedata[0]->degree}} @endif">
                              </div> 
                              </div>
                              <br/>
                              <div class="row"> 
                              <div class="form-check col-md-6">
                                <label for="residence">Date of graduation </label>
                                  <input type="date" class="form-control" name="date_graduation" value="@if(isset($employeedegreedata[0]->date_graduation)) {{$employeedegreedata[0]->date_graduation}} @endif"   min="1900-01-01" max="2200-12-31">
                              </div> 
                              <div class="form-check col-md-6">
                                  <label for="residence">Overseas location </label>
                                  <input type="text" class="form-control" name="overseas_location" value="@if(isset($employeedegreedata[0]->overseas_location)) {{$employeedegreedata[0]->overseas_location}} @endif">
                              </div>  
                          </div>
                           </div>

                       <div id="part3" style="display:none;margin-left: 26px;"> 
                          <br><br>
                        <b>Have you ever cleared customs and entered Japan?</b> 
                          
                        <div class="row"> 
                        <div class="form-check col-md-2">
                        <input class="form-check-input" type="radio" name="cleared_customs_and_entered_Japan" id="innerpartcheck3" value="1"  @if(isset($employeedata['cleared_customs']) && $employeedata['cleared_customs']=="1" ) checked  @endif  onchange="functionpoint5();" >
                        <label class="form-check-label" for="innerpartcheck3">
                           Yes
                        </label>
                        </div>

                        <div class="form-check col-md-6">
                        <input class="form-check-input" type="radio" name="cleared_customs_and_entered_Japan" id="innerpartcheck4" value="2"  @if(isset($employeedata['cleared_customs']) && $employeedata['cleared_customs']=="2" ) checked  @endif  onchange="functionpoint6();" >
                        <label class="form-check-label" for="innerpartcheck4">
                           no
                        </label>
                        </div>
                          </div>


              </div>  <!-- end of part3 -->

              <div id="innerpart3" style="display:none;">
              <br><br>
                            <div class="form-check col-md-4">
                                <label for="innercheckbox">If yes, how many times?  </label>
                                  <input type="text" id="innercheckbox" class="form-control" name="many_time" value="@if(isset($employeetraveleedata[0]->how_many_time)) {{$employeetraveleedata[0]->how_many_time}} @endif">
                              </div>
                              <div class="form-check col-md-4">
                                <label for="innercheckbox">When was the most recent entry date?</label>
                                  <input type="date"  id="innercheckbox" class="form-control" name="most_recent_entry_date" value="@if(isset($employeetraveleedata[0]->how_many_time)) {{$employeetraveleedata[0]->how_many_time}} @endif">
                              </div>
                              <div class="form-check col-md-4">
                                <label for="residence">When was the most recent departure date? </label>
                                  <input type="date" class="form-control" name="most_recent_departure_date" value="@if(isset($employeetraveleedata[0]->how_many_time)) {{$employeetraveleedata[0]->how_many_time}} @endif"   min="1900-01-01" max="2200-12-31">
                              </div>
              </div>



                           </div>


                           <div class="form-check">
                           <br> <br>
                          
            <div class="card" id="part4" style="display:none;">
              <div class="card-header">
                <h3 class="card-title">Fill in the chart below for up to your last six full-time positions. (Exclude part-time jobs or internships.)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Company Name</th>
                      <th>Start Date (MM-YYYY)</th>
                      <th>End Date (MM-YYYY)</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Previous Work #1 (most recent) </td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[0]->company_name)) {{$employeecompaniedata[0]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[0]->start_date)){{$employeecompaniedata[0]->start_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[0]->end_date)){{$employeecompaniedata[0]->end_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                       
                    </tr>
                    <tr>
                      <td>Previous Work #2</td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[1]->company_name)) {{$employeecompaniedata[1]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[1]->start_date)){{$employeecompaniedata[1]->start_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[1]->end_date)){{$employeecompaniedata[1]->end_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                     
                    </tr>
                    <tr>
                      <td>Previous Work #3</td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[2]->company_name)) {{$employeecompaniedata[2]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[2]->start_date)){{$employeecompaniedata[2]->start_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[2]->end_date)){{$employeecompaniedata[2]->end_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                      
                    </tr>
                    <tr>
                      <td>Previous Work #4</td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[3]->company_name)) {{$employeecompaniedata[3]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[3]->start_date)){{$employeecompaniedata[3]->start_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[3]->end_date)){{$employeecompaniedata[3]->end_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                    </tr>
                    <tr>
                      <td>Previous Work #5</td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[4]->company_name)) {{$employeecompaniedata[4]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[4]->start_date)){{$employeecompaniedata[4]->start_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[4]->end_date)){{$employeecompaniedata[4]->end_date}}@endif"   min="1900-01-01" max="2200-12-31"></td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

         


            </div>
            <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Documents</h3>
                  </div> 
                 <div class="card-body">
                 <div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Documents (full-time employees)</h3>  
											<p>You are required to submit different documents depending on your visa status. Open the link below and review which documents you are meant to submit based on your visa status.</p>
                                            <hr>
		                        		</div>

                                <div class="form-top-right" id="mainDiv2">

                                   <h2 style="    background-color: #aea9a9;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    font-size: 21px;
    border-bottom: 1px solid rgba(0,0,0,.125);
    padding: 0.40rem 1.00em;
    position: relative;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;"> Please send by mail</h2>
                                   <br/>

                                   <span>
                                   Post the following documents to the address below:
                                    <br/> <br/>
                                    KA International Inc.  <br/>
                                    3-7-9 Jiyugaoka  <br/>
                                    Meguro-ku, Tokyo  <br/>
                                    Japan 152-0035  <br/>  <br/> 

                                    Passport style-photo 3cm x 4cm  <br/>
                                    Passport copy (photo page)  <br/>
                                    University diploma copy  <br/>


                                   </span>

                                </div>

		                        		<div class="form-top-right" id="mainDiv1">
		                        			<i class="fa fa-file-o"></i>


                                  <h2 style="background-color: #aea9a9;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    font-size: 21px;
    border-bottom: 1px solid rgba(0,0,0,.125);
    padding: 0.40rem 1.00em;
    position: relative;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;"> Electronic Submissions</h2>
                                   
                                  <div class="row" id="document1">
                                    <div class="col-md-6">
                                       <span>Residence card (zairyu card) (if applicable)
                                       </span>  <br> <input type="file" name="document1"> 
                                       @if(count($employeedocument1)) 
                                       <input type="hidden" name="image1" value='{{$employeedocument1[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument1[0]->documents}}" alt="" width="100">
                                        @else
                                       <input type="hidden" name="image1" value='0'>
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                  
                                    <span>Status :  
                                    @if(count($employeedocument1) && $employeedocument1[0]->documents_status==0) Pending @endif
                                   @if(count($employeedocument1) && $employeedocument1[0]->documents_status==1) Completed @endif
                                   @if(count($employeedocument1) && $employeedocument1[0]->documents_status==2) Rejected @endif 
                                 
                                       </span> 
                                    </div>
                                  </div>
                                <hr class="divideme1"/>

                                <div class="row" id="document12">
                                    <div class="col-md-6">
                                       <span>Passport copy (photo page)
                                       </span>  <br> <input type="file" name="document12">
                                       @if(count($employeedocument12)) 
                                       <input type="hidden" name="image12" value='{{$employeedocument12[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument12[0]->documents}}" alt="" width="100">
                                        @else
                                       <input type="hidden" name="image12" value='0'>
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  
                                     @if(count($employeedocument12) && $employeedocument12[0]->documents_status==0) Pending @endif 
                                     @if(count($employeedocument12) && $employeedocument12[0]->documents_status==1) Completed @endif 
                                      @if(count($employeedocument12) && $employeedocument12[0]->documents_status==2) Rejected @endif 
                                 
                                       </span> 
                                    </div>
                                  </div>
                                <hr class="divideme12"/>


                                <div class="row" id="document13">
                                    <div class="col-md-6">
                                       <span>University diploma copy
                                       </span>  <br> <input type="file" name="document13">
                                       @if(count($employeedocument13)) 
                                       <input type="hidden" name="image13" value='{{$employeedocument13[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument13[0]->documents}}" alt="" width="100">
                                        @else
                                       <input type="hidden" name="image13" value='0'>
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  
                                      @if(count($employeedocument13) && $employeedocument13[0]->documents_status==0) Pending @endif  
                                      @if(count($employeedocument13) && $employeedocument13[0]->documents_status==1) Completed @endif 
                                      @if(count($employeedocument13) && $employeedocument13[0]->documents_status==2) Rejected @endif 
                                  </select>
                                       </span> 
                                    </div>
                                  </div>
                                <hr class="divideme13"/>

                                <h2 style="background-color: #aea9a9;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    font-size: 21px;
    border-bottom: 1px solid rgba(0,0,0,.125);
    padding: 0.40rem 1.00em;
    position: relative;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;"> Physical Submissions (Please bring copies or originals to be copied to your first meeting) </h2>




                                  <div class="row" id="document20">
                                    <div class="col-md-12">
                                       <span> Bank book [tsucho] or bank cash card(bring physical book / Cover and first page)  </span>    <br/>  <br/>
                                       <span> Japanese pension book copy (This only applies to you if you had social insurance through your previous employer in Japan.)   </span>     <br/>  <br/>
                                       <span> Collect the following documents from your former company and bring them to your first meeting..
You can hand this checklist to your former employer.  </span>     <br/>  <br/>
                                       <span> 源泉徴収票 Tax-withholding slip for current year and previous year (W-2 form for you Americans) </span>     <br/>  <br/>
                                       <span> 特別徴収異動届出書 Change of special collection of residence tax 
Submit this document if your residence tax was automatically deducted from your salary</span>   <br/>    <br/>
                                       <span> 雇用保険資格喪失証　Certificate of Loss of Labor Insurance
Note: This document may take some time for your former employer to produce. For our purposes, we need to know your Labor Insurance Number (雇用保険番号) which is written on this form. Any copy of a document containing that number will suffice  </span>    <br/>   <br/>
                                       <span> 被保険者資格喪失届　Certificate of Loss of Social Insurance  (This only applies to you if you had social insurance through your previous employer in Japan.)</span>      <br/>  <br/>
                                     
                                    </div> 
                                  </div>


                                  <div class="row" id="document2">
                                    <div class="col-md-6">
                                       <span>Bank book [tsucho] or bank cash card(bring physical book / Cover and first page) 
                                       </span>  <br> <input type="file" name="document2">
                                       @if(count($employeedocument2)) 
                                       <input type="hidden" name="image2" value='{{$employeedocument2[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument2[0]->documents}}" alt="" width="100">
                                        @else
                                        <input type="hidden" name="image2" value='0'>
                                      @endif
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  
                                      @if(count($employeedocument2) && $employeedocument2[0]->documents_status==0) Pending @endif 
                                      @if(count($employeedocument2) && $employeedocument2[0]->documents_status==1) Completed @endif 
                                      @if(count($employeedocument2) && $employeedocument2[0]->documents_status==2) Rejected @endif 
                                 
                                       </span> 
                                    </div>
                                  </div>
                                  <hr class="divideme22"/>

                                  <div class="row" id="document22">
                                    <div class="col-md-6">
                                       <span>My Number (Personal Identification Number) マイナンバー 
                                        <br/>Note: DO NOT submit this document electronically (email, Google Drive, etc.) 

                                       </span>  <br> <input type="file" name="document22">
                                       @if(count($employeedocument22)) 
                                       <input type="hidden" name="image22" value='{{$employeedocument22[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument22[0]->documents}}" alt="" width="100">
                                        @else
                                        <input type="hidden" name="image22" value='0'>
                                      @endif
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  
                                    @if(count($employeedocument22) && $employeedocument22[0]->documents_status==0) Pending @endif  
                                    @if(count($employeedocument22) && $employeedocument22[0]->documents_status==1) Completed @endif 
                                    @if(count($employeedocument22) && $employeedocument22[0]->documents_status==2) Rejected @endif 
                                
                                       </span> 
                                    </div>
                                  </div>
                                  <hr class="divideme2"/>

                                  <div class="row" id="document3">
                                    <div class="col-md-6">
                                       <span>Japanese pension book copy (This only applies to you if you had social insurance through your previous employer in Japan.) 
                                       </span>  <br> <input type="file" name="document3">
                                       @if(count($employeedocument3)) 
                                       <input type="hidden" name="image3" value='{{$employeedocument3[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument3[0]->documents}}" alt="" width="100">
                                        @else
                                        <input type="hidden" name="image3" value='0'>
                                      @endif
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status : 
                                    @if(count($employeedocument3) && $employeedocument3[0]->documents_status==0) Pending @endif 
                                    @if(count($employeedocument3) && $employeedocument3[0]->documents_status==1) Completed @endif  
                                    @if(count($employeedocument3) && $employeedocument3[0]->documents_status==2) Rejected @endif  
                                  
                                       </span> 
                                    </div>
                                  </div>

                                  <hr class="divideme3"/>

                                  <div class="row" id="document4">
                                    <div class="col-md-6">
                                       <span>Collect the following documents from your former company and bring them to your first meeting..
You can hand this checklist to your former employer.
                                       </span>  <br> 
                                       <span>源泉徴収票 Tax-withholding slip for current year and previous year (W-2 form for you Americans)</span>
                                       <br><input type="file" name="document4">
                                       @if(count($employeedocument4)) 
                                       <input type="hidden" name="image4" value='{{$employeedocument4[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument4[0]->documents}}" alt="" width="100">
                                        @else
                                        <input type="hidden" name="image4" value='0'>
                                      @endif
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  
                                     @if(count($employeedocument4) && $employeedocument4[0]->documents_status==0) Pending @endif 
                                     @if(count($employeedocument4) && $employeedocument4[0]->documents_status==1) Completed @endif  
                                     @if(count($employeedocument4) && $employeedocument4[0]->documents_status==2) Rejected @endif  
                                  </select>
                                       </span> 
                                    </div>
                                  </div>
                                     <hr class="divideme4"/>

                                  <div class="row" id="document5">
                                    <div class="col-md-6">
                                       <span>特別徴収異動届出書 Change of special collection of residence tax 
Submit this document if your residence tax was automatically deducted from your salary
                                       </span>  <br> <input type="file" name="document5">
                                       @if(count($employeedocument5)) 
                                       <input type="hidden" name="image5" value='{{$employeedocument5[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument5[0]->documents}}" alt="" width="100">
                                        @else
                                        <input type="hidden" name="image5" value='0'>
                                      @endif
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status : 
                                      @if(count($employeedocument5) && $employeedocument5[0]->documents_status==0) Pending @endif  
                                      @if(count($employeedocument5) && $employeedocument5[0]->documents_status==1) Completed @endif 
                                      @if(count($employeedocument5) && $employeedocument5[0]->documents_status==2) Rejected @endif 
                                  </select>
                                       </span> 
                                    </div>
                                  </div>
                                    <hr class="divideme5"/>

                                  <div class="row" id="document6">
                                    <div class="col-md-6">
                                       <span>雇用保険資格喪失証　Certificate of Loss of Labor Insurance
Note: This document may take some time for your former employer to produce. For our purposes, we need to know your Labor Insurance Number (雇用保険番号) which is written on this form. Any copy of a document containing that number will suffice
                                       </span>  <br> <input type="file" name="document6">
                                       @if(count($employeedocument6)) 
                                       <input type="hidden" name="image6" value='{{$employeedocument6[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument6[0]->documents}}" alt="" width="100">
                                       @else
                                        <input type="hidden" name="image6" value='0'>
                                      @endif
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  
                                     @if(count($employeedocument6) && $employeedocument6[0]->documents_status==0) Pending @endif  
                                     @if(count($employeedocument6) && $employeedocument6[0]->documents_status==1) Completed @endif  
                                      @if(count($employeedocument6) && $employeedocument6[0]->documents_status==2) Rejected @endif  
                                  
                                       </span> 
                                    </div>
                                  </div>
                                  <hr class="divideme6"/>
                                  <div class="row" id="document7">
                                    <div class="col-md-6">
                                       <span>被保険者資格喪失届　Certificate of Loss of Social Insurance  (This only applies to you if you had social insurance through your previous employer in Japan.)
                                       </span>  <br> <input type="file" name="document7">
                                       @if(count($employeedocument7)) 
                                       <input type="hidden" name="image7" value='{{$employeedocument7[0]->id}}'>
                                        <img src="{{url('/')}}/uploads/{{$employeedocument7[0]->documents}}" alt="" width="100">
                                        @else
                                        <input type="hidden" name="image7" value='0'>
                                      @endif
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  
                                    @if(count($employeedocument7) && $employeedocument7[0]->documents_status==0) Pending @endif 
                                    @if(count($employeedocument7) && $employeedocument7[0]->documents_status==1) Completed @endif  
                                     @if(count($employeedocument7) && $employeedocument7[0]->documents_status==2) Rejected @endif  
                                  </select>
                                       </span> 
                                    </div>
                                  </div>
                                  <hr class="divideme7"/>
                                 
		                        		</div>

		                     </div> 
                     </div>
                <!-- /.card-body -->
 
            </div>

                           </div>



                          
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
@section('yoursricpt')
<script>
 
 
@if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I am a Japanese citizen" )
functionpoint1();
@endif

@if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a work visa" )
functionpoint3();
@endif

@if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a work visa, am currently in Japan" ) 
functionpoint3();
@endif 

@if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I am coming from overseas" ) 
functionpoint4();
  @if(isset($employeedata['cleared_customs']) && $employeedata['cleared_customs']==1)
  functionpoint5();
  @endif 
@endif 

@if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a student visa and am currently in Japan" ) 
functionpoint7();
@endif 

@if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I am a permanent resident" ) 
functionpoint2();
@endif 

@if(isset($employeedata['visa_status']) && $employeedata['visa_status']=="I have a family-related visa" ) 
functionpoint23();
@endif 


  function functionpoint1(){
      $('.stepOneDiv').hide();
      $('.workVisaDiv').hide();
      $("#part4").hide();
      $("#part3").hide();

      $("#mainDiv2").hide();
      $("#mainDiv1").show();

      $('#document1').show();
      $("#document2").hide();
      $("#document3").hide();
      $("#document4").hide();
      $("#document5").hide();
      $("#document6").hide();
      $("#document7").hide();

      $("#document20").show();
      $(".divideme2").hide();
      $(".divideme3").hide();
      $(".divideme4").hide();
      $(".divideme5").hide();
      $(".divideme6").hide();
      $(".divideme7").hide();

      $('#document12').hide(); 
      $('#document13').hide(); 
        $("#document22").hide();

  }


  function functionpoint23(){
    $("#mainDiv2").hide();
    $("#mainDiv1").show();
      $('.stepOneDiv').hide();
      $('.workVisaDiv').hide();
      $("#part4").hide();
      $("#part3").hide();
 
      $('#document1').show();
      $("#document2").show();
      $("#document3").show();
      $("#document4").show();
      $("#document5").show();
      $("#document6").show();
      $("#document7").show();

      $("#document20").hide();
      $(".divideme2").show();
      $(".divideme3").show();
      $(".divideme4").show();
      $(".divideme5").show();
      $(".divideme6").show();
      $(".divideme7").show(); 
      $('#document12').hide();  
      $('#document13').hide();  
      $("#document22").hide(); 

  }

  function functionpoint2(){
    $("#mainDiv2").hide();
    $("#mainDiv1").show();
     // alert('hello i am back.');
      $('.stepOneDiv').show();
      $('.workVisaDiv').hide();
      $("#part4").hide();
      $("#part3").hide();

      $('#document1').show();
      $("#document2").show();
      $("#document3").show();
      $("#document4").show();
      $("#document5").show();
      $("#document6").show();
      $("#document7").show();
      $("#document20").hide();
      $(".divideme2").show();
      $(".divideme3").show();
      $(".divideme4").show();
      $(".divideme5").show();
      $(".divideme6").show();
      $(".divideme7").show();

      $('#document12').hide();   $("#document22").hide();
      $('#document13').hide();  

  }


  function functionpoint3(){
    $("#mainDiv2").hide();
    $("#mainDiv1").show();
      $('.workVisaDiv').show();
      $('.stepOneDiv').hide();
      $("#part4").show();
      $("#part3").hide();
      $("#part1").show();
      $("#part2").show();
 
      $('#document1').show();
      $('#document12').show(); 
      $("#document22").show();
      $("#document2").show();
      $("#document22").show();
      $("#document3").hide();
      $("#document4").hide();
      $("#document5").hide();
      $("#document6").hide();
      $("#document7").hide();
      $("#document20").hide();
      $(".divideme2").show();
      $(".divideme3").hide();
      $(".divideme4").hide();
      $(".divideme5").hide();
      $(".divideme6").hide();
      $(".divideme7").hide();
      $('#document13').hide();  

  }


  function functionpoint4(){
    $('.workVisaDiv').show();
    $('.stepOneDiv').hide();
    $("#part1").hide();
    $("#part2").show();
    $("#part3").show();
    $("#part4").show();
    $("#mainDiv1").hide();
    $("#mainDiv2").show();

  }

  function functionpoint5(){
        $("#innerpart3").show();
  }
  function functionpoint6(){
        $("#innerpart3").hide();
  }


  function functionpoint7(){
    $('.workVisaDiv').show();
    $("#part1").hide();
    $("#part3").hide();
    $("#innerpart3").hide();
    $("#part2").show();
    $("#part4").hide();


      $('#document13').show();   
      $('#document1').show();
      $('#document12').show(); 

      $("#document22").hide();
      $("#document2").show(); 
      $("#document3").hide();
      $("#document4").hide();
      $("#document5").hide();
      $("#document6").hide();
      $("#document7").hide();
      $("#document20").hide();
      $(".divideme2").show();
      $(".divideme3").hide();
      $(".divideme4").hide();
      $(".divideme5").hide();
      $(".divideme6").hide();
      $(".divideme7").hide();
      
      $("#mainDiv2").hide();
      $("#mainDiv1").show();


  }
  </script>

@endsection 