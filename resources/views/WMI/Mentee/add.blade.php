<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Mentee</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .content-wrapper {
            padding: 20px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: 500;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-cancel {
            background-color: #ff0000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            padding: 7px 20px;
        }

        .btn-cancel:hover {
            background-color: #cc0000;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    @include('WMI.sidebar')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Tambah Data Mentee</h1>
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
                                        <label>ID Mentee</label>
                                        <input type="text" class="form-control" value="{{ old('id_mentee') }}"
                                            name="id_mentee" required placeholder="Enter ID Mentee">
                                        {{-- <div style="color: red">
                                            {{ $errors->first('id_mentee') }}
                                        </div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Mentee</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"
                                            name="name" required placeholder="Enter Name Mentee">
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Role Mentee</label>
                                        <select class="form-control" id="role" name="role" required>
                                            <option value="">Select Role Mentee</option>
                                            <option value="UI/UX">UI/UX</option>
                                            <option value="Mobile Development">Mobile Development</option>
                                            <option value="IBM Academy">IBM Academy</option>
                                            <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" value="{{ old('email') }}"
                                            name="email" required placeholder="Enter email">
                                        {{-- <div style="color: red">
                                            {{ $errors->first('email') }}
                                        </div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Email Supervisior</label>
                                        <input type="text" class="form-control" value="{{ old('email_supervisior') }}"
                                            name="email_supervisior" required placeholder="Enter email">
                                        {{-- <div style="color: red">
                                            {{ $errors->first('email_supervisior') }}
                                        </div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Nama DPP</label>
                                        <input type="text" class="form-control" value="{{ old('nama_dpp') }}"
                                            name="nama_dpp" required placeholder="Enter Name">
                                        {{-- <div style="color: red">
                                            {{ $errors->first('nama_dpp') }}
                                        </div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Nomor DPP</label>
                                        <input type="text" class="form-control" value="{{ old('no_dpp') }}"
                                            name="no_dpp" required placeholder="Enter Number">
                                        {{-- <div style="color: red">
                                            {{ $errors->first('no_dpp') }}
                                        </div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required
                                            placeholder="Password">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a href="{{ route('datamentee') }}" class="btn btn-cancel">Batal</a>
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

    <!-- Modal HTML -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Berhasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            @if (session('success'))
                $('#successModal').modal('show');
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 800);
            @endif
        });
    </script>
</body>

</html>
