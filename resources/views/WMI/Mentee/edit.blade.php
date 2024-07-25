<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data Mentee</title>
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
                        <h1>Form Edit Data Mentee</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="{{ route('update.mentee', ['id' => $mentee->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>ID Mentee</label>
                                        <input type="text" class="form-control" value="{{ $mentee->id_mentee }}"
                                            name="id_mentee" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Mentee</label>
                                        <input type="text" class="form-control" value="{{ $mentee->name }}"
                                            name="name" required placeholder="Enter Name Mentee">
                                    </div>

                                    <div class="form-group">
                                        <label>Role Mentee</label>
                                        <input type="text" class="form-control" value="{{ $mentee->role }}"
                                            name="role" required placeholder="Enter Role Mentee">
                                    </div>

                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" value="{{ $mentee->email }}"
                                            name="email" required placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label>Email Supervisior</label>
                                        <input type="text" class="form-control" value="{{ $mentee->email_supervisior }}"
                                            name="email_supervisior" required placeholder="Enter Supervisor Email">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>

                                    <!-- New fields -->
                                    <div class="form-group">
                                        <label>Nama DPP</label>
                                        <input type="text" class="form-control" value="{{ $mentee->nama_dpp }}"
                                            name="nama_dpp" placeholder="Enter Nama DPP">
                                    </div>

                                    <div class="form-group">
                                        <label>No DPP</label>
                                        <input type="text" class="form-control" value="{{ $mentee->no_dpp }}"
                                            name="no_dpp" placeholder="Enter No DPP">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('datamentee') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
