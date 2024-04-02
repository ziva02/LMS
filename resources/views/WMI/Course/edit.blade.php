@include ('WMI.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2"> 
                <div class="col-sm-6">
                    <h1>Form Ubah Course</h1>
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
                        <form method="post" action="{{ route('update.course', ['id' => $course->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- karena metode update menggunakan PUT -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" class="form-control" name="gambar" accept="image/*">
                                    @if ($errors->has('gambar'))
                                        <span class="text-danger">{{ $errors->first('gambar') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Nama Course</label>
                                    <input type="text" class="form-control" value="{{ $course->name }}" name="name" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Durasi</label>
                                    <input type="text" class="form-control" value="{{ $course->durasi }}" name="durasi" required>
                                    @if ($errors->has('durasi'))
                                        <span class="text-danger">{{ $errors->first('durasi') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi Course</label>
                                    <input type="text" class="form-control" value="{{ $course->deskripsi }}" name="deskripsi" required>
                                    @if ($errors->has('deskripsi'))
                                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                                    @endif
                                </div>                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('course') }}" class="btn btn-danger">Batal</a>
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
