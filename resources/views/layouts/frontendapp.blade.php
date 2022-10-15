<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Durga Insurance Solution</title>
  <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Durga Insurance Solution">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<!--   <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0"> -->

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/all.min.css') }}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/animate-css/animate.css') }}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick-theme.css') }}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/colorbox/colorbox.css') }}">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <style type="text/css">
       .inactive-class {
         animation: blinker 1s linear infinite;
       }

       @keyframes blinker {
         50% {
           opacity: 0;
         }
       }

       .red{
       	color: red;
       }

       .blue{
       	color: blue;
       }

       .whole-page-overlay{
         left: 0;
         right: 0;
         top: 0;
         bottom: 0;
         position: fixed;
         background: rgba(0,0,0,0.6);
         width: 100%;
         height: 100% !important;
         z-index: 1050;
         display: none;
       }
       .whole-page-overlay .center-loader{
         top: 50%;
         left: 52%;
         position: absolute;
         color: white;
       }
     </style>
</head>
<body>
    <div class="whole-page-overlay" id="whole_page_loader">
<img class="center-loader"  style="height:100px;" src="{{ asset('frontend/images/loader.gif') }}"/>
</div>
  <div class="body-inner">
    <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fa fa-phone-square mr-0"></i> <b class="info-text">+91-9838419090, +91-9838288673</b>
                    </li>
                </ul>
              </div>
              <!--/ Top info end -->
  
              <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                {{-- <ul class="list-unstyled">
                    <li>
                      <a title="Facebook" href="https://facebbok.com/themefisher.com">
                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                      </a>
                      <a title="Twitter" href="https://twitter.com/themefisher.com">
                          <span class="social-icon"><i class="fab fa-twitter"></i></span>
                      </a>
                      <a title="Instagram" href="https://instagram.com/themefisher.com">
                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
                      </a>
                      <a title="Linkdin" href="https://github.com/themefisher.com">
                          <span class="social-icon"><i class="fab fa-github"></i></span>
                      </a>
                    </li>
                </ul> --}}

                    <div class="row">
                      <div class="col-lg-9">
                      <input type="text" class="form-control" id="vehicle_number" placeholder="Type Vehicle number..." autocomplete="off" />
                      </div>
                      <div class="col-lg-2">
                      <button class="btn btn-danger" id="search-button">Search</button>
                    </div>
                </div><!-- Search end -->
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
@include('layouts.frontendinclude.header')
<!--/ Header end -->

@yield('content')

@include('layouts.frontendinclude.footer')



  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="{{ asset('frontend/plugins/jQuery/jquery.min.js') }}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
  <!-- Slick Carousel -->
  <script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/slick/slick-animation.min.js') }}"></script>
  <!-- Color box -->
  <script src="{{ asset('frontend/plugins/colorbox/jquery.colorbox.js') }}"></script>
  <!-- shuffle -->
  <script src="{{ asset('frontend/plugins/shuffle/shuffle.min.js') }}" defer></script>

  <!-- Template custom -->
  <script src="{{ asset('frontend/js/script.js') }}"></script>

  <script type="text/javascript">
  	// display a modal (medium modal)
$(document).on('click', '#search-button', function(event) {
   event.preventDefault();
	var vehicle_number = $('#vehicle_number').val();
	$.ajax({
	url: "{{ route('show.vehicle.details')}}",
	type: "POST",
	data: {
	    vehicle_number: vehicle_number,
	    _token: '{{csrf_token()}}'
	},
    beforeSend: function() {
        $('.whole-page-overlay').show();
    },
	success:function(data) {
		$('#vehicle_data').html(data);
		$('#vehicle_modal').modal('show');
    $('.whole-page-overlay').hide();
	},
	  error:function (response) {
    $('.whole-page-overlay').hide();
	      alert(response.responseJSON.errors.vehicle_number[0]);
	    }
	});
});
  </script>

  </div><!-- Body inner end -->
  </body>

  </html>