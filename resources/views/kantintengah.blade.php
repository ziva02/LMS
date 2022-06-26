@include ('navbar')
    <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url({{asset('img')}}/bg_image_3.jpg);">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Denah</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">Denah</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header><br>


  <H2 style="font-family:Garamond ;" class="text-center">Denah Kantin Tengah</H2>
  <div class="container mt-5 mb-3">
    <div class="row">
      <?php $number=1;?>
    @foreach($datadenah as $tampil )
        <div class="col-md-3">
           
            <div class="card p-3 mb-2" style="box-shadow: 1px 1px 1px 1px rgba(20,20,20,0.4); width:100%; height:100px" >
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                    </div>
                  
                    <h6 class="text-center">{{$tampil -> meja}} </h6>
                </div>
                <div class="mt-2">
                  <div class="row">
                    <div class="col-md-6">  
                    <h6 class="text-left">{{$tampil -> nama}} </h6>     
                    </div>
                  <div class="col-md-6">

                    <h6 class="text-right">{{$tampil -> namadua}}</h6>
                    </div>

                  </div>
                   
                    
                </div>
            </div>
            
        </div>
        
        @endforeach
    </div>
</div>
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