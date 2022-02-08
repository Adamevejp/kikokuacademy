@extends('layouts.frontend')
@section('content')
<div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
							<br> 
                            <h1><strong>KA Employee Login Form</strong> </h1>
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box"> 
                        	<form role="form" action="{{ url('/loginemployee') }}" method="post" class="registration-form1"> 
                        		<fieldset>
								@csrf
		                        	<div class="form-top">
		                        		<div class="form-top-left">
											<h3>Login</h3> 
		                        		</div> 
		                            </div>
		                            <div class="form-bottom"> 
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Email</label>
				                        	<input type="text" name="email" placeholder="Email ..." class="form-last-name form-control" id="email">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Password</label>
				                        	<input type="password" name="password" placeholder="Password..." class="form-last-name form-control" id="password">
				                        </div>
										<div class="row">
											<div class="col-md-6">
											<button type="submit" class="btn">Login</button>
											</div>
											<div class="col-md-6">
											<a href="{{url('/')}}/ForgotPassword"  class="btn">Forgot Password</a>	
											</div>
											
											
										</div>
				                    </div>
			                    </fieldset> 
		                    </form> 
                        </div>
                    </div>
                </div>
            </div>
@endsection          