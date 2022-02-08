<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KA Portal') }}</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/form-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
        <style>
                    .goog-logo-link {
                    display:none !important;
                    }

                    .goog-te-gadget {
                    color: transparent !important;
                    }

                    .goog-te-gadget .goog-te-combo {
                    color: blue !important;
                    }

   .goog-te-banner-frame {
    display:none !important
    }
    body {
    top: 0px !important; 
    }
        </style>
    </head>

    <body> 
		<!-- Top menu --> 
			<div class="container">
				<div class="navbar-header"> 
					<a class="navbar-brand" href="{{ url('/') }}/login">KA Employee Portal</a>
				</div>
                
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li style="display:none;"> 
							<span class="li-text"> 
                                <a href="{{ url('/login') }}"><button type="button" class="btn btn-next">Login</button></a>
							</span> 
							 
						</li>
					</ul>
				</div>
			</div>
	 

        <!-- Top content -->
        <div class="top-content">
        <div id="google_translate_element"  style="margin-left: 87%;"></div>
            @yield('content') 
        </div> 
     

<script type="text/javascript">
 function googleTranslateElementInit() {
 new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages : 'ja,en'}, 'google_translate_element');
 }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <!-- Javascript -->
        <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.backstretch.min.js') }}"></script>
        <script src="{{ asset('assets/js/retina-1.1.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        
        <!--[if lt IE 10]>
            <script src="{{ asset('assets/js/placeholder.js') }}"></script>
        <![endif]-->

    </body>

</html>