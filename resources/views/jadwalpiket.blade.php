@include ('navbar')
<main>
    <div class="page-section">
      <div class="container">
        <div class="filterable-btn">
          <button class="btn active" data-filter="*">All</button>
          <button class="btn" data-filter=".web">Website</button>
          <button class="btn" data-filter=".mobile">Mobile</button>
          <button class="btn" data-filter=".desktop">Desktop</button>
          <button class="btn" data-filter=".java">rewrwe</button>
          <button class="btn" data-filter=".php">Desktrwerweop</button>
          <button class="btn" data-filter=".golang">Desrwerwektop</button>
        </div>

        <div class="grid mt-3">
          <div class="grid-item mobile" >
            <div class="portfolio" width="6000px" height="100px">
              <table id="format" class="table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th width="50px">No</th>
                    <th >Judul</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach  ($jadwal as $jadwal )
                  <tr>
                    <td>{{$jadwal -> hari }}</td>
                    <td> {!!nl2br(str_replace(" ", " &nbsp;", $jadwal -> piket))!!}</td>

                    
                  </tr>
                  @endforeach
                                  </tbody>
                 
                </table>
            </div>
          </div>
          
          <div class="grid-item  desktop">
            <div class="portfolio">
                <table id="format" class="table table-bordered table-hover" width="300px" height="100px">
                  <thead>
                  <tr>
                    <th width="50px">No</th>
                    <th >Judul</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td>Tian</td>
                    <td>sds</td>

                    
                  </tr>
                                  </tbody>
                 
                </table>
            </div>
          </div>

          <div class="grid-item  java">
            <div class="portfolio">
                <table id="format" class="table table-bordered table-hover" width="300px" height="100px">
                  <thead>
                  <tr>
                    <th width="50px">No</th>
                    <th >Judul</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td>Tian</td>
                    <td>sds</td>

                    
                  </tr>
                                  </tbody>
                 
                </table>
            </div>
          </div>

          <div class="grid-item  php">
            <div class="portfolio">
                <table id="format" class="table table-bordered table-hover" width="300px" height="100px">
                  <thead>
                  <tr>
                    <th width="50px">No</th>
                    <th >Judul</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td>Tian</td>
                    <td>sds</td>

                    
                  </tr>
                                  </tbody>
                 
                </table>
            </div>
          </div>

          <div class="grid-item  golang">
            <div class="portfolio">
                <table id="format" class="table table-bordered table-hover" width="300px" height="100px">
                  <thead>
                  <tr>
                    <th width="50px">No</th>
                    <th >Judul</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td>Tian</td>
                    <td>sds</td>

                    
                  </tr>
                                  </tbody>
                 
                </table>
            </div>
          </div>

          <div class="grid-item web">
            <div class="portfolio">
                <table id="format" class="table table-bordered table-hover" width="300px" height="100px">
                  <thead>
                  <tr>
                    <th width="50px">No</th>
                    <th >Judul</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td>Roonaldo</td>
                    <td>sds</td>

                    
                  </tr>
                                  </tbody>
                 
                </table>
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