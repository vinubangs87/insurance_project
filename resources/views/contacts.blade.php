@extends('layouts.frontendapp')
@section('content')
<div id="banner-area" class="banner-area" style="background-color: #1A2229">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Contact us</h1>
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">company</a></li>
                      <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav> --}}
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 
<section id="main-container" class="main-container">
  <div class="container">

    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title">Reaching our Office</h2>
        <h3 class="section-sub-title">Find Our Location</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fas fa-map-marker-alt mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Visit Our Office:</h4>
            <p>Near Nirikshan Bhavan AND front of NAV JYOTI PUBLIC SCHOOL, Bansi road</p>
            <p> Nagar panchayat ITWA</p>
            <p><b>POST:</b> ITWA BAZAR</p>
            <p><b>POLICE STATION:</b> ITWA BAZAR</p>
            <p><b>PIN:</b> 272192</p>
            <p><b>STATE:</b> UTTAR PRADESH (INDIA)</p>
            <p></p>
          </div>
        </div>
      </div><!-- Col 1 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-envelope mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Email Us</h4>
            <a href="mailto:durgaatozgicltd@gmail.com"><p>durgaatozgicltd@gmail.com</p></a>
          </div>
        </div>
      </div><!-- Col 2 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-phone-square mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Call Us</h4>
            <a href="tel:+919838419090"><p>(+91) 9838419090</p></a>
            <a href="tel:+919838288673"><p>(+91) 9838288673</p></a>
          </div>
        </div>
      </div><!-- Col 3 end -->

    </div><!-- 1st row end -->

    <div class="gap-60"></div>

    <div class="google-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3544.5783853204707!2d82.6967956148623!3d27.32638068295129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39973d051120b703%3A0x6c45d0a526cba45f!2sDurga%20insurance%20solution!5e0!3m2!1sen!2sin!4v1665229129428!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="map" class="map"></iframe>

    </div>

    <div class="gap-40"></div>

    <div class="row">
      <div class="col-md-12">
        <h3 class="column-title">We love to hear</h3>
        @if ($message = Session::get('success'))
           <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                   <strong>{{ $message }}</strong>
           </div>
         @endif
        <form id="contact-form" action="{{ route('send.contact.mail') }}" method="post" role="form" autocomplete="off">
         @csrf
          <div class="error-container"></div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email" required />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Phone</label>
                <input class="form-control form-control-subject" name="number" id="number" placeholder="" required />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Subject</label>
                <input class="form-control form-control-subject" name="subject" id="subject" placeholder="" required />
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10" required /></textarea>
          </div>
          <div class="text-right"><br>
            <button class="btn btn-primary solid blank" type="submit">Send Message</button>
          </div>
        </form>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

        
@endsection