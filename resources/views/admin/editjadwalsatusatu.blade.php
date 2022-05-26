@include ('admin.sidebar')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Jadwal Piket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">>Edit Jadwal Piket</li>
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
                <h3 class="card-title">Edit Jadwal Piket</h3>
              </div>
              <div>

<form role="form" action="{{route('jadwal.update',$update->id)}}" method="POST" >
{{ csrf_field() }}
<div class="form-group">
    <label for="hari">Hari:</label>
    <input type="hari" name="hari" class="form-control" id="hari" value="{{$update->hari}}" readonly>
  </div>
  <div class="form-group">
    <label for="piket">Piket:</label>
    <textarea type="piket" name="piket" class="form-control" id="piket" height="400px" rows="7" >{{$update->piket}}</textarea>
  </div>
  <button type="submit"  class="btn btn-primary">Edit</button>
  <a href="{{url('tabeljadwalkantinsatusatu ')}}" class="btn btn-primary">Back</a>
  </div>
</form>



