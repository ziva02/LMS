<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mentor</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Tambahkan gaya CSS khusus di sini */
        .pagination .page-link {
            font-size: 14px !important;
            /* Atur ukuran font */
        }

        .pagination .page-link::before,
        .pagination .page-link::after {
            font-size: 14px !important;
            /* Atur ukuran font */
        }

        .text-right {
            text-align: right !important;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .pagination>.page-item>.page-link {
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            margin: 0 2px;
            /* Atur margin antara setiap halaman */
        }

        .pagination>.page-item.active>.page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
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
                        <h1>Data Mentor</h1>
                    </div>
                    <div class="col-sm-6 text-right"> <!-- Menggunakan kelas text-right -->
                        <a href="{{ url('wmi/mentor/add') }}" class="btn btn-primary">Tambah
                            Data Mentor</a>
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
                                <h3 class="card-title">Data Mentor</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="format" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Mentor</th>
                                            <th>Nama Mentor</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mentor as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->id_mentor }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->role }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <a href="{{ url('wmi/mentor/edit/' . $item->id) }}"
                                                        class="btn btn-warning">Ubah</a>
                                                    <form id="deleteForm{{ $item->id }}"
                                                        action="{{ route('delete.mentor', ['id' => $item->id]) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data mentor ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination justify-content-end">
                                    {{ $mentor->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->

    <!-- Tambahkan script Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function deleteMentor(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data mentor ini?")) {
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
</body>

</html>
