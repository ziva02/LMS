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

<form role="form" action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="nama">Nama Produk:</label>
    <input type="nama" name="nama" class="form-control" id="nama">
  </div>
  <div class="form-group">
    <label for="harga">Harga:</label>
    <input type="harga" name="harga" class="form-control" id="harga">
  </input>
  </div>
  <button type="submit"  class="btn btn-primary">Submit</button>
  <a href="{{url('tabeldenahsatulantaidua ')}}" class="btn btn-primary">Kembali</a>
</form>
</div>


