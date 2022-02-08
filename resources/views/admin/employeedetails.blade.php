
@extends('layouts.adminportal')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$employeedata['first_name']}} {{$employeedata['last_name']}} Information</h1>
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
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="col-md-12">
                <div class="card">
                 
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                    <div id="accordion">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                              Personal info (About Me)
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                          <div class="card-body">
            <form action="{{ url('/admin_postaboutus')}}" method="post">
              @csrf  
              <input type="hidden" name="employee_id" value={{$employee_id}}>
                  <div class="form-bottom"> 

                  <div class="row">
                      <div class="col-md-4">
                      <label> Alphabet/Romaji </label>
                      </div>
                    
                   </div>
                    
                   <div class="row">
                      <div class="col-md-4">
                      <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" placeholder="Enter First Name"  value="{{$employeedata['first_name']}}">
                  </div>
                </div>
                   <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputPassword1">Family Name</label>
                    <input type="text" class="form-control" name="last_name" id="exampleInputPassword1" placeholder="Enter Family Name"  value="{{$employeedata['last_name']}}">
                  </div>
                  
            
                      </div>
                      <div class="col-md-4">
                    
                      <div class="form-group">
                    <label for="exampleInputPassword1">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" id="exampleInputPassword1" placeholder="Enter Middle Name"  value="{{$employeedata['middle_name']}}">
                  </div> 
               

                      </div>
                   </div>
                  <div class="row"> 
                      <div class="col-md-4">
                      <label> Katakana </label>
                      </div> 
                   </div>
                  
                <div class="row">
                      <div class="col-md-4"> 
                      <div class="form-group">
                    <label  for="form-last-name">Katakana First Name</label>
                    <input type="text" name="katakana" placeholder="Katakana..." class="form-last-name form-control" id="form-last-name" value="{{$employeedata['katakana']}}">
                </div>
                 </div>
                      <div class="form-group">
                    <label  for="form-last-name">Katakana Family Name</label>
                     <input type="text" name="emergency_katakana_family" placeholder="Katakana Family Name" class="form-last-name form-control" id="form-last-name" value="{{$employeedata['Katakana_family_name']}}">  
                </div>
                </div>

                <div class="row"> 
                      <div class="col-md-4">
                      <label>  Kanji (if applicable)</label>
                      </div> 
                   </div>

                   <div class="row">
                              <div class="col-md-4">
                              <div class="form-group">
                    <label  for="form-last-name">Kanji First Name </label>
                    <input type="text"  name="emergency_kanji_name" placeholder="Kanji First Name" class="form-last-name form-control" id="form-last-name"  value="{{$employeedata['Kanji_first_name']}}">
                  </div> 
                  </div>

                  <div class="form-group">
                    <label  for="form-last-name">Kanji Family Name  </label>
                     <input type="text" name="emergency_kanji_family_name" placeholder="Kanji Family Name " class="form-last-name form-control" id="form-last-name" value="{{$employeedata['Kanji_family_name']}}">
                  </div>
                   </div>
 

                   <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                    <label  for="form-last-name">Date of Birth</label>
                    <input type="date"  name="dob" placeholder="Date of Birth..." class="form-last-name form-control" id="form-last-name"  value="{{$employeedata['dob']}}"  min="1900-01-01" max="2200-12-31">
         </div>
                            </div>

                            <div class="form-group">
 <label   for="form-last-name">Nationality	</label> 
 <select id="country" name="nationality" class="form-control">
   <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
</select>
                  </div>
                   </div>
     
                  
                   <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label   for="form-last-name">Japanese Mobile Phone Number</label>
                                <input type="number" name="japanese_mobile" placeholder="Japanese Mobile Phone Number..." class="form-last-name form-control" id="form-last-name"  value="{{$employeedata['japanese_mobile']}}">
                                        <span>If you do not have a Japanese phone number, leave this blank. Update this form when you receive a phone number.</span>
                            </div>
                            </div>

                         <div class="col-md-6">
                         <div class="form-group">
                    <label  for="form-last-name">Email Address</label>
                    <input type="text" name="email" placeholder="Email ..." class="form-last-name form-control" id="form-last-name"  value="{{$employeedata['email']}}">
                      <span>Even if you have already received your @kikokushijoacademy.com email address, fill in your non KA email address.</span>
                    </div>
                          </div>

                   </div>


<div class="row">
   <div class="col-md-2">
   <label  for="form-last-name">Postal Code</label>
   <input type="text"  pattern="\d*"   maxlength="3"  class="form-control"  style="width: 100px;" name="demo1_zip1" onkeyup="postalCodeApiDriver.postalCode2Addr('demo1_zip1', 'demo1_zip2', 'demo1_address1', 'demo1_address2');postalCodeApiDriver.postalCode2Addr('demo1_zip1', 'demo1_zip2', 'demo1_address1_en', 'demo1_address2_en', '', 'en');"  value="{{$employeedata['postal1']}}">
   </div>

   <div class="col-md-6">
          <label  for="form-last-name">Postal Code</label>
          <input type="text" pattern="\d*"   maxlength="4"  class="form-control" style="width: 100px;" name="demo1_zip2" onkeyup="postalCodeApiDriver.postalCode2Addr('demo1_zip1', 'demo1_zip2', 'demo1_address1', 'demo1_address2');postalCodeApiDriver.postalCode2Addr('demo1_zip1', 'demo1_zip2', 'demo1_address1_en', 'demo1_address2_en', '', 'en');"  value="{{$employeedata['postal2']}}">
   </div>
</div> 



<div class="row">
  <div class="col-md-6">
              <div class="form-group">
                    <label   for="form-about-yourself">Address in Japanese</label>
                    <input type="text" class="form-control" style="margin-bottom: 8px;" name="demo1_address1" placeholder=""  onkeyup="formValidation();"  value="{{$employeedata['address_japan']}}"> 
                    <input type="text" class="form-control" style="margin-bottom: 8px;" name="demo1_address2" placeholder=""  onkeyup="formValidation();"  value="{{$employeedata['address_japan2']}}">
                  </div>
  </div>

  <div class="col-md-6">
              <div class="form-group">
                    <label   for="form-about-yourself"></label>  
                    <input type="text" class="form-control" style="margin-bottom: 8px;" name="demo1_address1_en" placeholder="Please add additional address informtion , if needed "  onkeyup="formValidation();" value="{{$employeedata['address_english']}}"> 
                    <input type="text" class="form-control" style="margin-bottom: 8px;" name="demo1_address2_en" placeholder="Apt name, Room #"  onkeyup="formValidation();" value="{{$employeedata['address_english2']}}">
                  </div>
  </div>
</div>


                  
        

                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100" data-toggle="collapse">
                              Emergency Contact (About You)
                            </a>
                           </h4>
                        </div>


                  <div class="row">
                      <div class="col-md-4">
                      <label> Alphabet/Romaji </label>
                      </div> 
                    
                   </div>
                   

               <div class="row">
                   <div class="col-md-4"> 
                    <div class="form-group">
                      <label   for="form-email">Name</label>
                      <input type="text" name="emergancy_name" placeholder="Name..." class="form-email form-control" id="form-email" value="{{$employeedata['emergancy_name']}}" >
                   </div>
                </div>
                      <div class="col-md-4">
                      <div class="form-group">
                    <label for="exampleInputPassword1">Family Name</label>
                    <input type="text" class="form-control" name="emergency_family_name" id="exampleInputPassword1" placeholder="Enter Family Name"  value="{{$employeedata['emergency_family_name']}}">
                  </div> 
                      
                   
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                    <label for="exampleInputPassword1">Middle Name</label>
                    <input type="text" class="form-control" name="emergency_middle_name" id="exampleInputPassword1" placeholder="Enter Middle Name"  value="{{$employeedata['emergency_middle_name']}}">
                  </div>  
                   
                  </div>
                   </div>
                   <div class="row"> 
                      <div class="col-md-4">
                      <label> Katakana</label>
                      </div> 
                   </div>
                    
                   <div class="row">
                     <div class="col-md-4">
                     <div class="form-group">
                    <label  for="form-last-name">Katakana First Name</label>
                     <input type="text" name="emergency_katakana_name" placeholder="Katakana Fistt Name" class="form-last-name form-control" id="form-last-name" value="{{$employeedata['emergency_katakana_name']}}">
                </div>

              

                     </div>

                     <div class="form-group">
                    <label  for="form-last-name">Katakana Family Name</label>
                     <input type="text" name="emergency_katakana_family" placeholder="Katakana Family Name" class="form-last-name form-control" id="form-last-name" value="{{$employeedata['emergency_katakana_family']}}">  
                </div>

                   </div>


                   <div class="row"> 
                      <div class="col-md-4">
                      <label>  Kanji (if applicable)</label>
                      </div> 
                   </div>


                   <div class="row">
                     <div class="col-md-4">
                     <div class="form-group">
                    <label  for="form-last-name">Kanji First Name (If aaplicable)</label>
                    <input type="text"  name="emergency_kanji_name" placeholder="Kanji First Name" class="form-last-name form-control" id="form-last-name"  value="{{$employeedata['emergency_kanji_name']}}">
                  </div>  

                     </div>

                     <div class="form-group">
                    <label  for="form-last-name">Kanji Family Name (If aaplicable)</label>
                     <input type="text" name="emergency_kanji_family_name" placeholder="Kanji Family Name " class="form-last-name form-control" id="form-last-name" value="{{$employeedata['emergency_kanji_family_name']}}">
                     
                </div>

                   </div>

               
                   <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                    <label   for="form-password">Relationship to You</label>
                    <input type="text" name="emergancy_relation" placeholder="Relationship to You..." class="form-password form-control" id="form-password" value="{{$employeedata['emergancy_relation']}}">
                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-repeat-password">Phone Number</label>
                                    <input type="number" name="emergancy_phone" placeholder="Phone Number..." 
                                    class="form-repeat-password form-control" id="form-repeat-password" value="{{$employeedata['emergancy_phone']}}">
                                    <span>Please include the country code if outside of Japan.</span>
                                </div>
                            </div>
                   </div>
              

                


                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
				                    </div>

                          </div>
                        </div>
                      </div>
                      
                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
                              Banking info
                            </a>
                          </h4>
                        </div>

                        <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                          <div class="card-body">
                          <form action="{{ url('/admin_postbankinformation')}}" method="post">
              @csrf  
              <input type="hidden" name="employee_id" value={{$employee_id}}>
                          <div class="form-group">
                        <label   for="form-facebook">Registered Name on Bank Account</label>
                        <input type="text" name="bank_registered_name"  value="{{$employeedata['bank_registered_name']}}" placeholder="Registered Name on Bank Account..." class="form-facebook form-control" id="bank_registered_name">
                    </div>
                    <div class="form-group">
                        <label  for="form-twitter">Bank Name</label>
                        <input type="text" name="bank_name"  value="{{$employeedata['bank_name']}}" placeholder="Bank Name..." class="form-twitter form-control" id="bank_name">
                    </div>
                    <div class="form-group">
                        <label  for="form-google-plus">Branch Name</label>
                        <input type="text" name="bank_branch_name"  value="{{$employeedata['bank_branch_name']}}" placeholder="Branch Name..." class="form-google-plus form-control" id="bank_branch_name">
                    </div>
                    <div class="form-group">
                        <label   for="form-google-plus">Branch Number</label>
                        <input type="text" name="bank_branch_number"   value="{{$employeedata['bank_branch_number']}}" placeholder="Branch Number..." class="form-google-plus form-control" id="bank_branch_number">
                    </div>
                    <div class="form-group">
                        <label  for="form-google-plus">Account Number</label>
                        <input type="text" name="bank_account_number"  value="{{$employeedata['bank_account_number']}}" placeholder="Account Number..." class="form-google-plus form-control" id="bank_account_number">
                    </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
                          </div>
                        </div>
                      </div>

                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#family" aria-expanded="false">
                              Family info
                            </a>
                          </h4>
                        </div>
                        <div id="family" class="collapse" data-parent="#accordion" style="">
                          <div class="card-body">
       <form action="{{ url('/admin_postfamily')}}" method="post">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
              <input type="hidden" name="employee_id" value={{$employee_id}}>
                 <div class="card-body">
                     <p>This information is required for the Japanese health insurance program. Use this area to add up to 5 family members. If you have more than 5 people in your family, add 5 to this form and email additional information to: generalaffairs@kikokushijoacademy.com</p>
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
                        <div class="form-group">
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
                <div class="card innerdiv_{{$k+1}}"> 
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Family Member #{{$k+1}}</h3> 
                    <input type="hidden" name="family_member_id[]" value="{{$value->id}}">
                    <a href="javascript:void(0);" onclick="removefamilymembersdynamic({{$k+1}},{{$value->id}});">Remove</a>  
                  </div>
                </div> 
                 <div class="card-body form-group"> 
                          <label  for="form-google-plus">Full name</label>
                          <input type="text" name="full_name[]"  value="{{$value->member_full_name}}" placeholder="" class="form-google-plus form-control" >
                          <label  for="form-google-plus">Katakana for family member #{{$k+1}}</label>
                          <input type="text" name="katakana_family[]"  value="{{$value->member_katakana}}" placeholder="" class="form-google-plus form-control" >
                          <label  for="form-google-plus">Kanji for family member #{{$k+1}} (if applicable)</label>
                          <input type="text" name="kanji_family[]"  value="{{$value->member_kanji}}" placeholder="" class="form-google-plus form-control" >
                          <br> 
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
                       
                        <br>
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
                        <label  for="form-google-plus">Date of Birth</label>
                        <input type="date" name="date_birth[]"  value="{{$value->date_birth}}" placeholder="" class="form-google-plus form-control"  min="1900-01-01" max="2200-12-31">
                          <br>

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
                      </div>


                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#employeestatus" aria-expanded="false">
                             Employee Status
                            </a>
                          </h4>
                        </div>
                        <div id="employeestatus" class="collapse" data-parent="#accordion" style="">
                          <div class="card-body">
                          <form action="{{ url('/admin_postemployeestatus')}}" method="post">
              @csrf  
              <input type="hidden" name="employee_id" value={{$employee_id}}>
                          <span>Employment  Status</span>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="employee_status" value="1"  id="employee_status"  @if(isset($employeedata['employee_status']) && $employeedata['employee_status']==1 ) checked  @endif  >
                        <label class="form-check-label" for="employee_status">
                            Full Time
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="employee_status"    id="employee_status2" value="2"  @if(isset($employeedata['employee_status']) && $employeedata['employee_status']==2 ) checked  @endif>
                        <label class="form-check-label" for="employee_status2">
                            Part Time or Substitute
                        </label>
                        <br>  
                        <span>Leave this question blank if you are unsure.</span>
                        <br><br></div>

                        <div class="form-group">
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
                    

                    <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#Insurance" aria-expanded="false">
                              Insurance
                            </a>
                          </h4>
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
										  <div class="form-group">
				                        	<span>If applicable, write your unemployment insurance number (kōyō hoken, 雇用保険).</span>
				                        	<input type="text" name="unemployment_insurance_number" placeholder="" class="form-google-plus form-control" id="form-google-plus" value="{{$employeedata['unemployment_insurance_number']}}">
				                        </div>
				                    		 
				                       
                </div>


                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

                          </div>
                        </div>
                      </div>
                   

                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#visa" aria-expanded="false">
                              Visa
                            </a>
                          </h4>
                        </div>
                        <div id="visa" class="collapse" data-parent="#accordion" style="">
                          <div class="card-body">
              <form action="{{ url('/admin_postvisa')}}" method="post">
              @csrf  
              <input type="hidden" name="employee_id" value={{$employee_id}}>
                 <div class="card-body">
                 <span>Which best describes your visa status. </span>
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
                        
                        <br>
                        <div class="stepOneDiv" style="display:none;">
                          <div class="form-check">
                            <label for="residence">Period of validity of your residence card</label>
                            <input type="date" class="form-control" name="residence_validity_date_japan" value="@if(isset($employeedata->residence_validity_date)){{$employeedata->residence_validity_date}}@endif">
                          </div>
                        </div>

                        <div class="workVisaDiv" style="display:none;">
            
                         <div id="part1">
                           <div class="form-check">
                            <label for="residence">What type of work visa do you have?</label>
                            <input type="text" class="form-control" name="work_visa" value="@if(isset($employeevisadetaildata[0]->type_of_visa)) {{$employeevisadetaildata[0]->type_of_visa}} @endif">
                            <span>Ex: Engineer/Specialist in Humanities/Int'l Services</span>
                           </div>   

                           <div class="form-check">
                            <label for="residence">Expiry year of current visa</label>
                             <select name="currentvisaYear" id="currentvisaYear" class="form-control">
                               <option @if(isset($employeevisadetaildata[0]->visa_expire_year)) @if($employeevisadetaildata[0]->visa_expire_year=="2020") selected @endif @endif value="2020">2020</option>
                               <option @if(isset($employeevisadetaildata[0]->visa_expire_year)) @if($employeevisadetaildata[0]->visa_expire_year=="2021") selected @endif @endif value="2021">2021</option>
                             </select>
                           </div>  

                           <div class="form-check">
                            <label for="residence">Expiry month of current visa</label>
                             <select name="currentvisamonth" id="currentvisaYear" class="form-control">
                               <option value="1" @if(isset($employeevisadetaildata[0]->visa_expire_month)) @if($employeevisadetaildata[0]->visa_expire_month=="1") selected @endif @endif>January</option>
                               <option value="2" @if(isset($employeevisadetaildata[0]->visa_expire_month)) @if($employeevisadetaildata[0]->visa_expire_month=="2") selected @endif @endif>Fabuary</option>
                             </select>
                           </div>

                           <div class="form-check">
                            <label for="residence">Period of validity of your residence card</label>
                              <input type="date" class="form-control" name="validaity_residence_visa" value="@if(isset($employeevisadetaildata[0]->valididty_residence_date)){{$employeevisadetaildata[0]->valididty_residence_date}}@endif">
                           </div>

                           </div>

                           <div id="part2"> 
                              <div class="form-check">
                                <label for="residence">University Name</label>
                                <input type="text" class="form-control" name="university_name" value="@if(isset($employeedegreedata[0]->university_name)) {{$employeedegreedata[0]->university_name}} @endif">
                              </div> 
                              <div class="form-check">
                                <label for="residence">Major/Degree</label>
                                <input type="text" class="form-control" name="degree" value="@if(isset($employeedegreedata[0]->degree)) {{$employeedegreedata[0]->degree}} @endif">
                              </div> 
                              <div class="form-check">
                                <label for="residence">Date of graduation </label>
                                  <input type="date" class="form-control" name="date_graduation" value="@if(isset($employeedegreedata[0]->date_graduation)) {{$employeedegreedata[0]->date_graduation}} @endif">
                              </div> 
                              <div class="form-check">
                                  <label for="residence">Overseas location </label>
                                  <input type="text" class="form-control" name="overseas_location" value="@if(isset($employeedegreedata[0]->overseas_location)) {{$employeedegreedata[0]->overseas_location}} @endif">
                              </div>  
                           </div>

                       <div id="part3" style="display:none;margin-left: 26px;"> 
                          <br><br>
                        <b>Have you ever cleared customs and entered Japan?</b> 
                           <div class="form-check">
                        <input class="form-check-input" type="radio" name="cleared_customs_and_entered_Japan" id="innerpartcheck3" value="1"  @if(isset($employeedata['cleared_customs']) && $employeedata['cleared_customs']=="1" ) checked  @endif  onchange="functionpoint5();" >
                        <label class="form-check-label" for="innerpartcheck3">
                           Yes
                        </label>
                        </div>

                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="cleared_customs_and_entered_Japan" id="innerpartcheck4" value="2"  @if(isset($employeedata['cleared_customs']) && $employeedata['cleared_customs']=="2" ) checked  @endif  onchange="functionpoint6();" >
                        <label class="form-check-label" for="innerpartcheck4">
                           no
                        </label>
                        </div>

              </div>  <!-- end of part3 -->

              <div id="innerpart3" style="display:none;">
              <br><br>
                            <div class="form-check">
                                <label for="innercheckbox">If yes, how many times?  </label>
                                  <input type="text" id="innercheckbox" class="form-control" name="many_time" value="@if(isset($employeetraveleedata[0]->how_many_time)) {{$employeetraveleedata[0]->how_many_time}} @endif">
                              </div>
                              <div class="form-check">
                                <label for="innercheckbox">When was the most recent entry date?</label>
                                  <input type="date"  id="innercheckbox" class="form-control" name="most_recent_entry_date" value="@if(isset($employeetraveleedata[0]->how_many_time)) {{$employeetraveleedata[0]->how_many_time}} @endif">
                              </div>
                              <div class="form-check">
                                <label for="residence">When was the most recent departure date? </label>
                                  <input type="date" class="form-control" name="most_recent_departure_date" value="@if(isset($employeetraveleedata[0]->how_many_time)) {{$employeetraveleedata[0]->how_many_time}} @endif">
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
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[0]->start_date)){{$employeecompaniedata[0]->start_date}}@endif"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[0]->end_date)){{$employeecompaniedata[0]->end_date}}@endif"></td>
                       
                    </tr>
                    <tr>
                      <td>Previous Work #2</td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[1]->company_name)) {{$employeecompaniedata[1]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[1]->start_date)){{$employeecompaniedata[1]->start_date}}@endif"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[1]->end_date)){{$employeecompaniedata[1]->end_date}}@endif"></td>
                     
                    </tr>
                    <tr>
                      <td>Previous Work #3</td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[2]->company_name)) {{$employeecompaniedata[2]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[2]->start_date)){{$employeecompaniedata[2]->start_date}}@endif"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[2]->end_date)){{$employeecompaniedata[2]->end_date}}@endif"></td>
                      
                    </tr>
                    <tr>
                      <td>Previous Work #4</td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[3]->company_name)) {{$employeecompaniedata[3]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[3]->start_date)){{$employeecompaniedata[3]->start_date}}@endif"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[3]->end_date)){{$employeecompaniedata[3]->end_date}}@endif"></td>
                    </tr>
                    <tr>
                      <td>Previous Work #5</td>
                      <td><input type="text" name="company_name[]" class="form-control" value="@if(isset($employeecompaniedata[4]->company_name)) {{$employeecompaniedata[4]->company_name}} @endif" ></td>
                      <td><input type="date" name="start_date[]"  class="form-control" value="@if(isset($employeecompaniedata[4]->start_date)){{$employeecompaniedata[4]->start_date}}@endif"></td>
                      <td><input type="date" name="end_date[]" class="form-control" value="@if(isset($employeecompaniedata[4]->end_date)){{$employeecompaniedata[4]->end_date}}@endif"></td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


                           </div>



                          
                        </div>
                </div>
                <!-- /.card-body -->

                 

                   <div class="card-body">
                             
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
                                        <img src="{{url('/')}}/uploads/{{$employeedocument1[0]->documents}}" alt="" width="100">
                                      @endif 
                                      
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status : <select onchange="updatedocumentstatus('doc1','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument1) && $employeedocument1[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument1) && $employeedocument1[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument1) && $employeedocument1[0]->documents_status==2) selected @endif>Rejected</option>
                                  </select>
                                       </span> 
                                    </div>
                                  </div>
                                <hr class="divideme1"/>

                                <div class="row" id="document12">
                                    <div class="col-md-6">
                                       <span>Passport copy (photo page)
                                       </span>  <br> <input type="file" name="document12">
                                       @if(count($employeedocument12)) 
                                        <img src="{{url('/')}}/uploads/{{$employeedocument12[0]->documents}}" alt="" width="100">
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status : <select onchange="updatedocumentstatus('doc12','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument12) && $employeedocument12[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument12) && $employeedocument12[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument12) && $employeedocument12[0]->documents_status==2) selected @endif>Rejected</option>
                                  </select>
                                       </span> 
                                    </div>
                                  </div>
                                <hr class="divideme12"/>


                                <div class="row" id="document13">
                                    <div class="col-md-6">
                                       <span>University diploma copy
                                       </span>  <br> <input type="file" name="document13">
                                       @if(count($employeedocument13)) 
                                        <img src="{{url('/')}}/uploads/{{$employeedocument13[0]->documents}}" alt="" width="100">
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  <select onchange="updatedocumentstatus('doc13','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument13) && $employeedocument13[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument13) && $employeedocument13[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument13) && $employeedocument13[0]->documents_status==2) selected @endif>Rejected</option>
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
                                        <img src="{{url('/')}}/uploads/{{$employeedocument2[0]->documents}}" alt="" width="100">
                                      @endif 
                                      
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  <select onchange="updatedocumentstatus('doc2','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument2) && $employeedocument2[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument2) && $employeedocument2[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument2) && $employeedocument2[0]->documents_status==2) selected @endif>Rejected</option>
                                  </select>
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
                                        <img src="{{url('/')}}/uploads/{{$employeedocument22[0]->documents}}" alt="" width="100">
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  <select onchange="updatedocumentstatus('doc22','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument22) && $employeedocument22[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument22) && $employeedocument22[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument22) && $employeedocument2[0]->documents_status==2) selected @endif>Rejected</option>
                                  </select>
                                       </span> 
                                    </div>
                                  </div>
                                  <hr class="divideme2"/>

                                  <div class="row" id="document3">
                                    <div class="col-md-6">
                                       <span>Japanese pension book copy (This only applies to you if you had social insurance through your previous employer in Japan.) 
                                       </span>  <br> <input type="file" name="document3">
                                       @if(count($employeedocument3))  
                                        <img src="{{url('/')}}/uploads/{{$employeedocument3[0]->documents}}" alt="" width="100">
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  <select onchange="updatedocumentstatus('doc3','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument3) && $employeedocument3[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument3) && $employeedocument3[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument3) && $employeedocument3[0]->documents_status==2) selected @endif>Rejected</option>
                                  </select>
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
                                        <img src="{{url('/')}}/uploads/{{$employeedocument4[0]->documents}}" alt="" width="100">
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  <select onchange="updatedocumentstatus('doc4','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument4) && $employeedocument4[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument4) && $employeedocument4[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument4) && $employeedocument4[0]->documents_status==2) selected @endif>Rejected</option>
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
                                        <img src="{{url('/')}}/uploads/{{$employeedocument5[0]->documents}}" alt="" width="100">
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  <select onchange="updatedocumentstatus('doc5','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument5) && $employeedocument5[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument5) && $employeedocument5[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument5) && $employeedocument5[0]->documents_status==2) selected @endif>Rejected</option>
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
                                        <img src="{{url('/')}}/uploads/{{$employeedocument6[0]->documents}}" alt="" width="100">
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  <select onchange="updatedocumentstatus('doc6','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument6) && $employeedocument6[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument6) && $employeedocument6[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument6) && $employeedocument6[0]->documents_status==2) selected @endif>Rejected</option>
                                  </select>
                                       </span> 
                                    </div>
                                  </div>
                                  <hr class="divideme6"/>
                                  <div class="row" id="document7">
                                    <div class="col-md-6">
                                       <span>被保険者資格喪失届　Certificate of Loss of Social Insurance  (This only applies to you if you had social insurance through your previous employer in Japan.)
                                       </span>  <br> <input type="file" name="document7">
                                       @if(count($employeedocument7)) 
                                        <img src="{{url('/')}}/uploads/{{$employeedocument7[0]->documents}}" alt="" width="100">
                                      @endif 
                                    </div>
                                    <div class="col-md-6">
                                    <span>Status :  <select onchange="updatedocumentstatus('doc7','{{$employee_id}}',this.value);" class="form-control"> 
                                    <option value="0" @if(count($employeedocument7) && $employeedocument7[0]->documents_status==0) selected @endif >Pending</option>
                                    <option value="1"  @if(count($employeedocument7) && $employeedocument7[0]->documents_status==1) selected @endif>Completed</option>
                                    <option value="2"  @if(count($employeedocument7) && $employeedocument7[0]->documents_status==2) selected @endif>Rejected</option>
                                  </select> 
                                       </span> 
                                    </div>
                                  </div>
                                  <hr class="divideme7"/> 
		                         
                          </div>
                  </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
                          </div>
                        </div>
                      </div>

                      

                      <div class="card card-primary">
                        <div class="card-header">
                          <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#paidHoliday" aria-expanded="false">
                              Leave   
                            </a>
                          </h4>
                        </div>

                        <div id="paidHoliday" class="collapse" data-parent="#accordion" style="">
                          <div class="card-body">
                          <form action="{{ url('/admin_postpaidholiday')}}" method="post">
                            @csrf  
                            <input type="hidden" name="employee_id" value={{$employee_id}}>
                          
                            <div class="form-check">
                            <label for="residence">Job Start Date </label>
                            <input type="date" class="form-control" id="job_start_date" name="job_start_date" value="@if(isset($employeedata->job_start_date)){{$employeedata->job_start_date}}@endif">
                           </div>  


                          <div class="form-check">
                            <label for="residence">Next Holiday issue date (Always the 1st of the month )</label>
                            <input type="date" class="form-control"  value="@if(isset($employeedata->holiday_issue_date)){{$employeedata->holiday_issue_date}}@endif" readonly >
                          
                           </div>  
                           <br>
                           <div class="form-check">
                           <label for="residence">Paid Holidays</label>
                           </div>
                           <br>

                           <div class="form-check">
                            <label for="residence">Number of year Employeed (Years employed should work by current date.)</label>
                            <input type="text" class="form-control" name="total_number_holiday" value="@if(isset($numbofyearemployee)) {{$numbofyearemployee}} @endif" >
                            
                           </div> 

                           <div class="form-check">
                             <table class="table table-bordered no-footer">
                               <tr>
                                 <td></td>
                                 <td>Previous period ({{$currentYear-1}})</td>
                                 <td>Current period ({{$currentYear}})</td>
                               </tr>

                               <tr>
                                 <td>Holiday period (In Years)</td>
                                 <td>{{$previousHolidayPeriod}}</td>
                                 <td>{{$currentHolidayPeriod}}</td>
                               </tr>

                               <tr>
                                 <td>Paid holidays issued</td>
                                 <td>{{$previusholiday}} </td>
                                 <td>{{$currentholiday}}</td>

                           <input type="hidden" name="previousholiday" value="{{$previusholiday}}">
                          <input type="hidden" name="currentholiday" value="{{$currentholiday}}">
                               </tr>

                               <tr>
                                 <td>Paid holidays from previous period</td>
                                 <td>-</td>
                                 <td>@if(isset($previousexitornot->remaining_holiday)){{$previousexitornot->remaining_holiday}}@endif</td>
                               </tr>


                               <tr>
                                 <td>Paid holidays used</td>
                                 <td><input type="text" name="previous_used_holiday" value="@if(isset($previousexitornot->used_holiday)){{$previousexitornot->used_holiday+$employeePreviousYearCount}}@endif"></td>
                                 <td><input type="text" name="current_used_holiday" value="@if(isset($currentexitornot->used_holiday)){{$currentexitornot->used_holiday+$employeeCurrentYearCount}}@endif"></td>
                               </tr>


                               <tr>
                                 <td>Paid holidays remaining</td>
                                 <td>@if(isset($previousexitornot->remaining_holiday)){{$previousexitornot->remaining_holiday-$employeePreviousYearCount}}@endif</td>
                                 <td>@if(isset($currentexitornot->remaining_holiday)){{$currentexitornot->remaining_holiday-$employeeCurrentYearCount}}@endif</td>
                               </tr> 
                             </table>
                          </div> 

                           <div class="form-check">
                            <label for="residence">Number of paid holidays that will be issued (Show the number of paid Holidays that will be issued based on the logic . And this number should be added to the Total number of holidays on the Holiday issue date)</label>
                            <input type="text" class="form-control" name="total_number_holiday" value="@if(isset($employeedata->total_number_holiday)) {{$employeedata->total_number_holiday-$employeeCurrentYearCount}} @endif" readonly>
                           </div>  

                           <div class="form-check" style="display:none;">
                            <label for="residence">Total number of holidays remainings</label>
                            <input type="text" class="form-control" name="total_number_expire_holiday" value="@if(isset($employeedata->total_number_remaining_holiday)) {{$employeedata->total_number_remaining_holiday}} @endif" readonly>
                            
                           </div>  
                           <div class="form-check" style="display:none;">
                            <label for="residence">Total number of days about to expire</label>
                            <input type="text" class="form-control" name="total_number_expire_holiday" value="@if(isset($employeedata->total_number_expire_holiday)) {{$employeedata->total_number_expire_holiday}} @endif" readonly>
                            
                           </div>  

                          
 
                 @if($employeefamilyCount)
                          <br>
                           <div class="form-check">
                           <label for="residence">Childs Leave</label>
                           </div>
                           <br>
                           <div class="form-check">
                            <label for="residence">Number of childs  (The number of children is coming from “Family info”) </label>
                            <input type="text" class="form-control" readonly   value="{{$employeefamilyCount}}">
                           </div> 

                           <div class="form-check">
                            <label for="residence">Number of Child Leave days that will be issued (5 days will be issued for Child , 10 days will be issued for 2 or more children )</label>
                            <input type="text" class="form-control" name="total_number_child_holiday" value="@if($employeefamilyCount==1) {{5}} @elseif ($employeefamilyCount>1) {{10}} @endif">
                           </div> 

                           <div class="form-check">
                            <label for="residence">Number of child Leave days remaining (All Child Leave will expire on the next “Holiday issue day” and 5 days or 10 days will be issued)</label>
                            <input type="text" class="form-control" name="total_remaining_child_holiday" value="@if(isset($employeedata->total_number_child_holiday)){{$employeedata->total_number_child_holiday}}@endif">
                           </div> 


                           @endif

                          <div class="card-footer">
                          <input type="hidden" name="previousYear" value="{{$currentYear-1}}">
                          <input type="hidden" name="currentYear" value="{{$currentYear}}">
                          <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                          </form> 
                         

                          <form action="{{ url('/admin_old_leave')}}" method="post" style="display:none;">
                            @csrf  
                            <input type="hidden" name="employee_id" value={{$employee_id}}>
                            <hr>
                           <div class="form-check">
                           <label for="residence">Old Leave Management</label>
                           </div>
                           <br>


                            <div class="form-check">
                            <label for="residence">Year</label>
                             <select name="old_leave_year" id="">
                                @for($i=1989; $i<=$currentYear;$i++)
                                  <option value="{{$i+1}}">{{$i+1}}</option> 
                                @endfor
                             </select>
                           </div>  

                           <div class="form-check">
                            <label for="residence">Total number of Holidays</label>
                            <input type="text" class="form-control" name="old_leave_total" value="" >
                           </div>  

                           <div class="form-check">
                            <label for="residence">Remaining Holidays</label>
                            <input type="text" class="form-control" name="old_leave_remaining" value="" >
                           </div>  

                          <div class="card-footer">
                             <button type="submit" class="btn btn-primary">Add more</button>
                          </div>

                          </form>

                          </div>
                        </div> 
                      </div>

                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
    <!-- jQueryとpostal-code-api-driver APIを読み込みます。 -->
<script src="https://recursive-co-jp.github.io/postal-code-api-driver/api/v1/postalCodeApiDriver.js"></script>
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
        $(".extrafamily").append('<div class="form-group card  innerdiv_'+lengthvalue2+'"> <input type="hidden" name="family_member_id[]" value="0"><div class="card-header border-0"><div class="d-flex justify-content-between"> <h3 class="card-title"> Family Member '+lengthvalue2+'</h3><a href="javascript:void(0);" onclick="removefamilymembers('+lengthvalue2+');">Remove</a>  </div>  </div> <div class="card-body"><label  for="form-google-plus">Full name</label> <input type="text" name="full_name[]"  value="" placeholder="" class="form-google-plus form-control" > <label  for="form-google-plus">Katakana for family member '+lengthvalue2+'</label> <input type="text" name="katakana_family[]"  value="" placeholder="" class="form-google-plus form-control" > <label  for="form-google-plus">Kanji for family member '+lengthvalue2+' (if applicable)</label><input type="text" name="kanji_family[]"  value="" placeholder="" class="form-google-plus form-control" ><br> <span>  Relationship '+lengthvalue2+' </span>   <div class="form-check">  <input class="form-check-input" type="radio" name="ralation_'+lengthvalue2+'" id="exampleRadios2" value="spouse"  > <label class="form-check-label" for="exampleRadios2">Spouse   </label> </div>  <div class="form-check"> <input class="form-check-input" type="radio" name="ralation_'+lengthvalue2+'" id="exampleRadios2" value="child"  > <label class="form-check-label" for="exampleRadios2">Child  </label> </div> <div class="form-check"> <input class="form-check-input" type="radio" name="ralation_'+lengthvalue2+'" id="exampleRadios2" value="parent" ><label class="form-check-label" for="exampleRadios2"> Parent </label> </div>  <br>  <span>  Gender '+lengthvalue2+' </span>  <div class="form-check">   <input class="form-check-input" type="radio" name="gender_'+lengthvalue2+'" id="exampleRadios2" value="female"  > <label class="form-check-label" for="exampleRadios2">Female   </label>  </div> <div class="form-check">  <input class="form-check-input" type="radio" name="gender_'+lengthvalue2+'" id="exampleRadios2" value="male" ><label class="form-check-label" for="exampleRadios2">  Male  </label> </div> <br> <label  for="form-google-plus">Date of Birth</label> <input type="date" name="date_birth[]"  value="" placeholder="" class="form-google-plus form-control" ><br> <span>  Is this person your dependent? '+lengthvalue2+' </span><div class="form-check">  <input class="form-check-input" type="radio" name="dependents_'+lengthvalue2+'" id="exampleRadios2" value="yes"  > <label class="form-check-label" for="exampleRadios2"> Yes   </label>  </div> <div class="form-check"> <input class="form-check-input" type="radio" name="dependents_'+lengthvalue2+'" id="exampleRadios2" value="no" ><label class="form-check-label" for="exampleRadios2">No </label> </div></div></div>');
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


function showCalculation(employeeId){
  var job_start_date = $("#job_start_date").val();

  alert(job_start_date);
}

function updatedocumentstatus(documents,employee_id,status){
      //  // alert('i am back.');
      //     var txt;
      //     var r = confirm("Are you want to change status!");
      //     if (r==true) {
      //        return true;
      //     }   else {
      //       return false;
      //     }
        var token = $("#token").val(); 
       $.ajax({
            type: "POST",
            url: '{{url("/")}}/documents_status',
            data: {employee_id: employee_id,_token: token,docs:documents,status:status},
            dataType: 'JSON',
            success: function( msg ) {
              console.log(msg);
             if(msg=='1'){ 
                 return true;
             }    

            }
        }); 
} 




// Visa box related functions
 
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


@if ($message = Session::get('open_url2'))
    $('#collapseThree').collapse('show');
@endif 

  @if ($message = Session::get('open_url3'))
    $('#family').collapse('show');
@endif 

@if ($message = Session::get('open_url4'))
    $('#employeestatus').collapse('show');
@endif 

@if ($message = Session::get('open_url5'))
    $('#visa').collapse('show');
@endif 

@if ($message = Session::get('open_url6'))
    $('#paidHoliday').collapse('show');
@endif 


  </script>

@endsection 

