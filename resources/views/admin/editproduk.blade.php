@include ('admin.sidebar')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Produk</li>
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
                <h3 class="card-title">Edit Produk</h3>
              </div>
              <div>

<form role="form" action="{{route('produk.update',$update->id)}}" method="POST" >
{{ csrf_field() }}
<div class="form-group">
    <label for="nama">Nama:</label>
    <input type="nama" name="nama" class="form-control" id="nama" value="{{$update->nama}}">
  </div>
  <div class="form-group">
    <label for="harga">Harga:</label>
    <input type="harga" name="harga" class="form-control" id="harga"  value="{{$update->harga}}">
  </div>
  
  <button type="submit"  class="btn btn-primary">Ubah</button>
  <a href="{{url('tabeldenahsatulantaidua ')}}" class="btn btn-primary">Kembali</a>
</form>
</div>


