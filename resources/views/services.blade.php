@extends('layouts.frontendapp')
@section('content')
<div id="banner-area" class="banner-area" style="background-color: #1A2229">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Sevices</h1>
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

    <div class="row">
     <div class="col-lg-12 text-center">
          <img loading="lazy" class="img-fluid" src="{{ asset("frontend/images/slider-main/banner1.jpeg") }}" alt="Durga insurance solutions">
        </div><!-- Col end -->
    </div><!-- Row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->

        
@endsection