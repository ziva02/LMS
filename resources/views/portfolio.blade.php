@include ('navbar')

    <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url({{asset('img')}}/bg_image_3.jpg);">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">Projects</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="filterable-btn">
          <button class="btn active" data-filter="*">All</button>
          <button class="btn" data-filter=".web">Website</button>
          <button class="btn" data-filter=".mobile">Mobile</button>
          <button class="btn" data-filter=".desktop">Desktop</button>
        </div>

        <div class="grid mt-3">
          <div class="grid-item mobile">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-1.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-1.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="grid-item mobile">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-2.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-2.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="grid-item web desktop">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-3.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-3.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="grid-item web">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-4.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-4.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="grid-item mobile">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-5.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-5.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="grid-item web desktop">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-6.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-6.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="grid-item web">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-7.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-7.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="grid-item mobile">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-8.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-8.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="grid-item mobile">
            <div class="portfolio">
              <a href="{{asset('img')}}/portfolio/work-9.jpg" data-fancybox="portfolio">
                <img src="{{asset('img')}}/portfolio/work-9.jpg" alt="">
              </a>
            </div>
          </div>
        </div> <!-- .grid -->
        <div class="mt-5 text-center">
          <button class="btn btn-primary">Load More</button>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

  @include ('footer')

  
<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

<script src="../assets/vendor/isotope/isotope.pkgd.min.js"></script>

<script src="../assets/js/google-maps.js"></script>

<script src="../assets/js/theme.js"></script>

</body>
</html>