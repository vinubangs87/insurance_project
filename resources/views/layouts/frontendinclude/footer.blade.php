<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-4 col-md-6 footer-widget footer-about">
            {{-- <h3 class="widget-title">About Us</h3> --}}
            <img loading="lazy" width="200px" class="footer-logo" src="{{ asset('frontend/images/logo.jpg') }}" alt="Logo">
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
              labore et dolore magna aliqua.</p>
            <div class="footer-social">
              <ul>
                <li><a href="https://facebook.com/themefisher" aria-label="Facebook"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/themefisher" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a href="https://instagram.com/themefisher" aria-label="Instagram"><i
                      class="fab fa-instagram"></i></a></li>
                <li><a href="https://github.com/themefisher" aria-label="Github"><i class="fab fa-github"></i></a></li>
              </ul>
            </div> --}}<!-- Footer social end -->
          </div><!-- Col end -->

          <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Menu</h3>
            <ul class="list-arrow">
             {{--  <li><a href="service-single.html">Home</a></li> --}}
              <li><a href="{{ route('about.us')}}">About</a></li>
              <li><a href="{{ route('our.services')}}">Services</a></li>
              <li><a href="{{ route('our.partner')}}">Our partner</a></li>
              <li><a href="{{ route('contact.us')}}">Contact</a></li>
            </ul>
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Services</h3>
            <ul class="list-arrow">
              <li><a href="#">Third party insurance</a></li>
              <li><a href="#">Claims</a></li>
              <li><a href="#">Cash less insurance facility</a></li>
              <li><a href="#">Travel insurance (Tatkal)</a></li>
            </ul>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info">
              <span>Copyright &copy; Designed by <a href="https://themefisher.com" target="_blank">Themefisher</a></span>
            </div>
          </div>

          
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer><!-- Footer end -->