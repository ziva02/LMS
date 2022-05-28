@include ('navbar')
<main>
    <div class="page-section">
      <div class="container">
        <div class="filterable-btn">
          <button class="btn active" data-filter="*">All</button>
          <button class="btn" data-filter=".web">Kantin Satu Lantai Satu</button>
          <button class="btn" data-filter=".mobile">Kantin Satu Lantai Dua</button>
          <button class="btn" data-filter=".desktop">Kantin Tengah</button>
          <button class="btn" data-filter=".java">Kantin Dua Lantai Satu</button>
          <button class="btn" data-filter=".php">Kantin Dua Lantai Dua</button>
        </div>

        <div class="grid mt-3">
          <div class="grid-item web" >
            <div class="portfolio" width="6000px" height="100px">
              <table id="format" class="table table-bordered table-hover" >
                  <thead>
                  <tr>
                    <th width="50px">Hari</th>
                    <th >Nama</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach  ($jadwall as $jadwall )
                  <tr>
                    <td>{{$jadwall -> hari }}</td>
                    <td> {!!nl2br(str_replace(" ", " &nbsp;", $jadwall -> piket))!!}</td>

                    
                  </tr>
                  @endforeach
                                  </tbody>
                 
                </table>
            </div>
          </div>
          
          <div class="grid-item  mobile">
            <div class="portfolio">
                <table id="format" class="table table-bordered table-hover" width="300px" height="100px">
                  <thead>
                  <tr>
                    <th width="50px">Hari</th>
                    <th >Nama</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach  ($uang as $uang )
                  <tr>
                    <td>{{$uang -> hari }}</td>
                    <td> {!!nl2br(str_replace(" ", " &nbsp;", $uang -> piketsatudua))!!}</td>

                    
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
                    <th width="50px">Hari</th>
                    <th >Nama</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  @foreach  ($tengah as $tengah )
                  <tr>
                    <td>{{$tengah -> hari }}</td>
                    <td> {!!nl2br(str_replace(" ", " &nbsp;", $tengah -> pikettengah))!!}</td>

                    
                  </tr>
                  @endforeach
                                  </tbody>
                 
                </table>
            </div>
          </div>

          <div class="grid-item  java">
            <div class="portfolio">
                <table id="format" class="table table-bordered table-hover" width="300px" height="100px">
                  <thead>
                  <tr>
                  <th width="50px">Hari</th>
                    <th >Nama</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  @foreach  ($satudua as $satudua )
                  <tr>
                    <td>{{$satudua -> hari }}</td>
                    <td> {!!nl2br(str_replace(" ", " &nbsp;", $satudua -> piketduasatu))!!}</td>

                    
                  </tr>
                  @endforeach
                                  </tbody>
                 
                </table>
            </div>
          </div>

          <div class="grid-item  php">
            <div class="portfolio">
                <table id="format" class="table table-bordered table-hover" width="300px" height="100px">
                  <thead>
                  <tr>
                    <th width="50px">Hari</th>
                    <th >Nama</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  @foreach  ($duadua as $duadua )
                  <tr>
                    <td>{{$duadua -> hari }}</td>
                    <td> {!!nl2br(str_replace(" ", " &nbsp;", $duadua -> piketduadua))!!}</td>

                    
                  </tr>
                  @endforeach
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