@include ('WMI.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Tambah Data Mentor</h1>
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
                        <form method="post" action="">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ID Mentor</label>
                                    <input type="text" class="form-control" value="{{ old('id_mentor') }}"
                                        name="id_mentor" required placeholder="Enter ID Mentor">
                                    {{-- <div style="color: red">
                                        {{ $errors->first('id_mentor') }}
                                    </div> --}}

                                </div>

                                <div class="form-group">
                                    <label>Nama Mentor</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" required placeholder="Enter Name Mentor">

                                </div>

                                <div class="form-group">
                                    <label for="role">Role Mentor</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="">Select Role Mentor</option>
                                        <option value="UI/UX">UI/UX</option>
                                        <option value="Mobile Development">Mobile Development</option>
                                        <option value="IBM Academy">IBM Academy</option>
                                        <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                    </select>
                                </div>
                                

                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" value="{{ old('email') }}"
                                        name="email" required placeholder="Enter email">
                                    {{-- <div style="color: red">
                                        {{ $errors->first('email') }}
                                    </div> --}}
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" required
                                        placeholder="Password">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                &nbsp; &nbsp;
                                <a href="{{ url('/datamentor') }}"
                                    style="display: inline-block; padding: 7px 20px; background-color: #ff0000; color: #fff; text-decoration: none; border-radius: 5px; position :absolute; bottom:2%;">Batal</a>
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
