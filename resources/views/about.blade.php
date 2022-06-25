@include ('navbar')
    <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url({{asset('img')}}/bg_image_3.jpg);">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About</li>
              </ol>
            </nav>
            <h1 class="text-center" style="color:white;">Information</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        @foreach  ($info as $info )
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <div class="subhead">{{$info -> Tanggal}}</div>
            <h2 class="title-section"><span class="fg-primary">{{$info -> Judul}}</span> </h2>

            <p>
            {{Str::limit($info -> Deskripsi, 280, $end='.......')}}
            </p>
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img" style="height:300px; width:800px">
              <img src="{{url('img')}}/informationimages/{{$info -> Gambar}}" alt="">
            </div>
          </div>
        </div>
        @endforeach
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    </div> <!-- .page-section -->
  </main>

  @include ('footer')

  


</body>
</html>