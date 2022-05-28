@include ('admin.sidebar')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Denah Kantin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Denah Kantin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Create Denah Kantin</h3>
              </div>
              <div>

<form role="form" action="{{route('kantinsatulantaidua.store')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="nama">nama:</label>
    <input type="nama" name="nama" class="form-control" id="nama">
  </div>
  <div class="form-group">
    <label for="prodi">prodi:</label>
    <input type="prodi" name="prodi" class="form-control" id="prodi">
  
  </input>
    
    
  </div>
  <div class="form-group">
    <label for="namadua">nama-2:</label>
    <input type="namadua" name="namadua" class="form-control" id="namadua">
  </div>
  <div class="form-group">
    <label for="prodidua">prodi-2:</label>
    <input type="prodidua" name="prodidua" class="form-control" id="prodidua">
  </div>
  <div class="form-group">
    <label for="meja">meja:</label>
    <input type="meja" name="meja" class="form-control" id="meja">
  </div>
  
  <button type="submit"  class="btn btn-primary">Submit</button>
  <a href="{{url('tabeldenahsatulantaidua ')}}" class="btn btn-primary">Back</a>
</form>
</div>


