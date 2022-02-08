@extends('layouts.frontend')
@section('content')
<div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
							<br> 
                            <h1><strong>KA Employee Signup Form</strong> </h1>
                            <div class="description">
             
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
 
			  <?php
			  
			    print_r( Session::get('employeeSession'));

				if (Session::has('employeeSession')) {
						?>
						 <script>window.location = "/KAEmployee";</script>
						<?php 
				} else {
					?>
						 <script>window.location = "/login";</script>
				  <?php 
				}
			  
			  ?>
              @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-dismissible" id="mydiv" >
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $message }}
                    <script type="text/javascript">
                        setTimeout(function() {
                                $('#mydiv').fadeOut('fast');
                            }, 3000); // <-- time in milliseconds
                      </script>
              </div>
              @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11 col-sm-offset-1 form-box"> 
                        	<form role="form" action="{{ url('/saveemployee') }}" method="post" class="registration-form"> 
                           
                            <fieldset>
                            @csrf
		                        	<div class="form-top">
		                        		<div class="form-top-left">
											<h3>Signup</h3> 
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-user"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                    	<div class="form-group">
				                    		<label   for="form-first-name">First name <code>*</code> </label>
				                        	<input type="text" name="first_name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
				                        </div>
				                        <div class="form-group">
				                        	<label   for="form-last-name">Last name  <code>*</code></label>
				                        	<input type="text" name="last_name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
				                        </div>
										<div class="form-group">
				                        	<label   for="form-Katakana">Katakana / Furigana  <code>*</code></label>
				                        	<input type="text" name="form_Katakana" placeholder="Katakana / Furigan..." class="form-last-name form-control" id="form-Katakana">
				                        </div>
										<div class="form-group">
				                        	<label   for="form-email">Email <code>*</code></label>
				                        	<input type="text" name="form_email" placeholder="Email ..." class="form-last-name form-control" id="email">
				                        </div>
										<div class="form-group">
				                        	<label   for="form-confirm-email">Confirm Email <code>*</code></label>
				                        	<input type="text"  placeholder="Confirm Email ..." class="form-last-name form-control" id="confirm-email">
				                        </div>
										
										<div class="form-group">
				                        	<label for="form-date-birth">Date of Birth <code>*</code></label>
				                        	<input type="date" name="form_date_birth" placeholder="Date of Birth..." class="form-last-name form-control" id="dateofbirth">
				                        </div>
										<div class="form-group">
				                        	<label  for="form-mobile">Japanese Mobile Phone Number <code>*</code></label>
				                        	<input type="text" name="form_mobile" placeholder="Japanese Mobile Phone Number..." class="form-last-name form-control" id="mobilenumber">
				                        </div>
										<div class="form-group">
				                        	<label  for="form-password">Password	<code>*</code></label>
				                        	<input type="password" name="form_password" placeholder="Password..." class="form-last-name form-control" id="password">
				                        </div> 
										<div class="form-group">
				                        	<label  for="form-confirm-password">Confirm Password	<code>*</code></label>
				                        	<input type="password" placeholder="Confirm Password..." class="form-last-name form-control" id="confirmpassword">
				                        </div> 

										<button type="submit" class="btn">Sign me up!</button>	
				                    </div>
			                    </fieldset> 

		                    </form>
		                    
                        </div>
                    </div>
                </div>
            </div>
@endsection          