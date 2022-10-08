<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="row logo-area">
            <div class="logo col-md-3">
                <a class="d-block" href="{{ route('front.home') }}">
                  <img loading="lazy" src="{{ asset('frontend/images/logo.jpg') }}" alt="Logo">
                </a>
            </div><!-- logo end -->
          <div class="align-items-center col-md-9">
  
            <div class="col-lg-9 header-right">
                <ul class="top-info-box">
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <b class="info-box-title" style="font-size: 41px !important; color: #EF4822;">Durga Insurance Solutions</b>
                      </div>
                    </div>
                  </li>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-8">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item dropdown {{ request()->is('/') ? 'active' : ''}}">
                          <a href="{{ route('front.home')}}" class="nav-link dropdown-toggle">Home</a>
                      </li>

                      <li class="nav-item dropdown {{ request()->is('about/us') ? 'active' : ''}}">
                          <a href="{{ route('about.us')}}" class="nav-link dropdown-toggle">About us</a>
                      </li>
              
                      <li class="nav-item dropdown {{ request()->is('our/services') ? 'active' : ''}}">
                          <a href="{{ route('our.services')}}" class="nav-link dropdown-toggle">Services</a>
                      </li>
              
                      <li class="nav-item dropdown {{ request()->is('our/partner') ? 'active' : ''}}">
                          <a href="{{ route('our.partner')}}" class="nav-link dropdown-toggle">Our partner</a>
                      </li>
              
                      <li class="nav-item {{ request()->is('contact/us') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('contact.us')}}">Contact</a>
                      </li>
                    </ul>
                </div>
              </nav>
          </div>

        <div class="nav-search col-lg-4">
          <ul class="list-unstyled">
              <li style="margin: 8px 0 0 0">
                <a title="Facebook" href="#" style="padding: 0 20px 0 20px;">
                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                </a>
                <a title="Twitter" href="#" style="padding: 0 20px 0 20px;">
                    <span class="social-icon"><i class="fab fa-twitter"></i></span>
                </a>
                <a title="Instagram" href="#" style="padding: 0 20px 0 20px;">
                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                </a>
                <a title="Linkdin" href="#" style="padding: 0 20px 0 20px;">
                    <span class="social-icon"><i class="fab fa-github"></i></span>
                </a>
              </li>
          </ul>
        </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>

<!-- modal -->
<!-- Modal: modalCart -->
<div class="modal fade" id="vehicle_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #ff3547;">
        <h4 class="modal-title" id="myModalLabel">Vehicle detail</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body" id="vehicle_data">

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="border-color: #ff3547 !important;">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->

<!-- end modal-->