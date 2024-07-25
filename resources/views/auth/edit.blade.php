@include ('WMI.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <!-- Tampilkan foto profil sementara di samping form -->
                    <div class="card card-primary">
                        <div class="card-body">
                            @if($user->foto)
                                <img src="{{ asset('profil/' . $user->foto) }}" class="img-fluid" alt="Foto Profil">
                            @else
                                <p>Foto Profil Belum Diunggah</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <form method="post" action="{{ route('update-profile', ['id' => $user->id]) }}"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT') <!-- karena metode update menggunakan PUT -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <input type="file" class="form-control" name="foto" accept="image/*">
                                    @if ($errors->has('foto'))
                                        <span class="text-danger">{{ $errors->first('foto') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Nama </label>
                                    <input type="text" class="form-control" value="{{ $user->name }}"
                                        name="name" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}"
                                        name="email" required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="/landingmentee" class="btn btn-danger">Batal</a>
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
