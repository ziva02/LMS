<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mentee</title>
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
                        <h1>Data Mentee</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari Mentee">
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
                                <h3 class="card-title">Data Mentee</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="menteeTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Mentee</th>
                                            <th>Nama Mentee</th>
                                            <th>Program</th>
                                            <th>Email</th>
                                            <th>Email Supervisior Kampus</th>
                                            <th>Email DPP</th>
                                            <th>No DPP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mentee as $index => $mentees)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $mentees->id_mentee }}</td>
                                                <td>{{ $mentees->name }}</td>
                                                <td>{{ $mentees->role }}</td>
                                                <td>{{ $mentees->email }}</td>
                                                <td><a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $mentees->email_supervisior }}"
                                                        target="_blank">{{ $mentees->email_supervisior }}</a></td>
                                                <td>{{ $mentees->nama_dpp }}</td>
                                                <td>
                                                    <a href="https://wa.me/{{ str_replace('08', '628', $mentees->no_dpp) }}"
                                                        target="_blank">
                                                        {{ $mentees->no_dpp }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No mentees available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table><br>
                                <div class="pagination justify-content-end">
                                    {{ $mentee->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Tambahkan script Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Tambahkan script untuk search functionality -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#menteeTable tbody tr');

            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(searchValue) ? '' : 'none';
            });
        });
    </script>
</body>

</html>
