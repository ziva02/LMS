
@include ('navbar')
    <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url({{asset('img')}}/bg_image_3.jpg);">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">News</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <h2 class="title-section mb-3">Komentar</h2>
          <p>Kami menerima kritik maupun saran dari kalian semua </p>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">

            <form class="form-contact" role="form" action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data" >
            {{ csrf_field() }}
              <div class="row">
                <div class="col-sm-6 py-2">
                  <label for="nama" class="fg-grey">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama..">
                </div>
                <div class="col-sm-6 py-2">
                  <label for="nim" class="fg-grey">Nim</label>
                  <input type="text" class="form-control" id="nim"name="nim" placeholder="Masukkan nim ">
                </div>
                <div class="col-12 py-2">
                  <label for="subjek" class="fg-grey">Subjek</label>
                  <input type="text" class="form-control" id="subjek" name="subjek" placeholder="Subjek..">
                </div>
                <div class="col-12 py-2">
                  <label for="Komentar" class="fg-grey">Pesan/Kritik</label>
                  <textarea id="Komentar" rows="8" class="form-control" name="Komentar" placeholder="Masukkan pesan.."></textarea>
                </div>
                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-primary px-5">Kirim</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

  </main>



  <main>
    <div class="page-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="row">
            @foreach($datakomentar as $tampil )
              <div class="col-md-6 col-lg-3 py-3">
                <div class="card-blog">
                  <div class="header">
                    <div class="avatar">
                      <img src="{{asset('img')}}/person/person_1.jpg" alt="">
                    </div>
                    <div class="entry-footer">
                      <div class="post-author">{{$tampil -> nama}}</div>
                      <a href="#" class="post-date">23 Apr 2020</a>
                    </div>
                  </div>
                  <div class="body">
                    <div class="post-title"><a href="blog-single.html">{{$tampil -> subjek}}</a></div>
                    <div class="post-excerpt">{{$tampil -> Komentar}}</div>
                  </div>

                </div>
              </div>
              @endforeach

            

              <div class="col-12 my-5">
                <nav aria-label="Page Navigation">
                  <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                      <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
              </div>
              
            </div>
          </div>
          
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