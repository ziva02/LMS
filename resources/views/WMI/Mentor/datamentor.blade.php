<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mentor</title>
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

        .content-header h1 {
            font-weight: 700;
            color: #343a40;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: 500;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .table th, .table td {
            vertical-align: middle;
            padding: 15px;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #007bff;
            background-color: #fff;
            border: 1px solid #dee2e6;
            margin: 0 2px;
            border-radius: 50px;
        }

        .pagination .page-item.active .page-link {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .modal-header {
            border-bottom: 2px solid #dee2e6;
        }

        .modal-footer {
            border-top: 2px solid #dee2e6;
        }

        .modal-title {
            font-weight: 700;
            color: #343a40;
        }

        .btn-warning, .btn-danger {
            border-radius: 30px;
            font-size: 14px;
        }

        .form-control {
            border-radius: 10px;
        }

        .card-tools input {
            border-radius: 20px;
            padding: 5px 15px;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>

<body>

@include('WMI.sidebar')

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Mentor</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('wmi/mentor/add') }}" class="btn btn-primary">Tambah Data Mentor</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mentor</h3>
                            <div class="card-tools">
                                <input type="text" id="searchInput" class="form-control" placeholder="Cari Mentor">
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mentorTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Mentor</th>
                                            <th>Nama Mentor</th>
                                            <th>Program</th>
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
                            </div>
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

<!-- Success Modal -->
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

    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#mentorTable tbody tr');

        tableRows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });

    function deleteMentor(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data mentor ini?")) {
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>
</body>
</html>
