@include ('admin.sidebar')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Canteen Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Canteen Plan</li>
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
                <h3 class="card-title">Create Canteen Plan</h3>
              </div>
              <div>

<form role="form" action="{{route('kantinsatu.storee')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="nama">nama:</label>
    <input type="nama" name="nama" class="form-control" id="nama">
  </div>
  <div class="form-group">
    <label for="prodi">prodi:</label>
    <input type="prodi" name="prodi" class="form-control" id="prodi">
  </div>
  
  <button type="submit"  class="btn btn-primary">Submit</button>
  <a href="{{url('tabeldenah ')}}" class="btn btn-primary">Back</a>
</form>
</div>





