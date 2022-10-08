@extends('layouts.frontendapp')
@section('content')
<div id="banner-area" class="banner-area" style="background-color: #1A2229">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">About</h1>
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
        <div class="col-lg-6">
          <h3 class="column-title">Who We Are</h3>
          <blockquote><p>The director of Durga Insurance Solution is <b style="color: red;">Durga Prasad jaiswal</b>. He is Sales Adviser all Company. First joining of him was- <br/> ICICI LOMBARD GENERAL INSURANCE CO. LTD GORAKHPUR <br/> <b>Date:</b> 28-06-2013 <br/>  <b>LICENCE NO.-</b> ILG 9498190</p></blockquote>

        </div><!-- Col end -->

        <div class="col-lg-6 mt-5 mt-lg-0">

          <img src="{{ asset("frontend/images/honour.JPG") }}" style="width: 400px; height: auto;" class=" small-bg img-responsive">        

        </div><!-- Col end -->
    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->

        
@endsection