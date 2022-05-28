@include ('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kantin Satu Lantai Dua</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kantin Satu Lantai Dua</li>
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
                <h3 class="card-title">Jadwal Piket Kantin Satu Lantai Dua</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="format" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <?php $number=1;?>
                  <tbody>
                    @foreach  ($jadwal as $jadwal )
                  <tr>
                    <td><?php echo $number++; ?></td>
                    <td>{{$jadwal -> hari }}</td>
                    <td>
                    {!!nl2br(str_replace(" ", " &nbsp;", $jadwal -> piketsatudua))!!}
                    </td>
                    <td>
                    <a class="btn btn-info btn-sm" href="/editjadwalsatudua/edit/{{$jadwal->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                    </td>
                  </tr>@endforeach
                                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">PA kel 10.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- Page specific script -->
<script>
  $(function () {
    $("#format").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#format_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
