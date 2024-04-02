@include ('WMI.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2"> 
                <div class="col-sm-6">
                    <h1>Form Tambah Course</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <form method="post" action="{{ route('addcourse') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" class="form-control" name="gambar" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Course</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required placeholder="Enter Nama Course">
                                </div>

                                <div class="form-group">
                                    <label>Durasi</label>
                                    <input type="text" class="form-control" value="{{ old('durasi') }}" name="durasi" required placeholder="Enter Durasi Course">
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Course</label>
                                    <input type="text" class="form-control" value="{{ old('deskripsi') }}" name="deskripsi" required placeholder="Enter Deskripsi Course">
                                </div>                                    
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button> &nbsp; 
                                <a href="" style="display: inline-block; padding: 7px 20px; background-color: #ff0000; color: #fff; text-decoration: none; border-radius: 3px; position: absolute; bottom: 3.2%;">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
