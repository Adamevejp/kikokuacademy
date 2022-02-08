@extends('layouts.frontend')
@section('content')
<div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
							<br> 
                            <h1><strong>KA Employee Create Password</strong> </h1>
                            <div class="description">
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


                            @if ($message = Session::get('success'))
							<div class="alert alert-dismissible" id="mydiv" style="color:green;" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									{{ $message }}
									<script type="text/javascript">
										setTimeout(function() {
												$('#mydiv').fadeOut('fast');
                                                window.location.href ='https://athostechnologies.in/athostechnologies.in/dev/public/login';
											}, 3000); // <-- time in milliseconds
									</script>
							</div>
							@endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box"> 
                        	<form role="form" action="{{ url('/restforgotpassword') }}" method="post" class="registration-form1"> 
                        		<fieldset>
								@csrf
		                        	<div class="form-top">
		                        		<div class="form-top-left">
											<h3>Reset Password</h3> 
		                        		</div> 
		                            </div>
		                            <div class="form-bottom"> 
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Password</label>
				                        	<input type="password" name="password" placeholder="Password ..." class="form-last-name form-control" id="email">
				                        </div>

                                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Confirm Password</label>
				                        	<input type="password" name="con_password" placeholder="Confirm Password ..." class="form-last-name form-control" id="email">
				                        </div>
									       <input type="hidden" value="{{$stringVar}}" name="stringVar">
											<button type="submit" class="btn">Create New Password</button>
											
				                    </div>
			                    </fieldset> 
		                    </form> 
                        </div>
                    </div>
                </div>
            </div>
@endsection          