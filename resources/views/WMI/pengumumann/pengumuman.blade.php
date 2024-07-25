@include('WMI.sidebar')

<!-- Custom CSS for styling -->
<style>
    .content-wrapper {
        background: #f8f9fa;
        padding: 20px;
    }
    .content-header {
        padding: 15px 0;
        border-bottom: 2px solid #dee2e6;
    }
    .content-header h1 {
        font-family: 'Roboto', sans-serif;
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
    .table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }
    .table th, .table td {
        vertical-align: middle;
        padding: 15px;
    }
    .table th {
        background-color: #007bff;
        color: #fff;
        font-weight: 500;
    }
    .table tbody tr {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .table tbody tr td {
        border-top: none;
        border-bottom: none;
    }
    .table-responsive {
        margin-top: 20px;
    }
    .modal-header {
        border-bottom: 2px solid #dee2e6;
    }
    .modal-footer {
        border-top: 2px solid #dee2e6;
    }
    .modal-title {
        font-family: 'Roboto', sans-serif;
        font-weight: 700;
        color: #343a40;
    }
    .form-group label {
        font-weight: 600;
        color: #495057;
    }
    .btn-secondary, .btn-danger, .btn-warning {
        border-radius: 30px;
        font-size: 14px;
    }
    .pagination {
        margin-top: 20px;
    }
    .pagination .page-link {
        border-radius: 50px;
    }
    .action-buttons {
        display: flex;
        gap: 10px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengumuman</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPengumumanModal">Tambah Pengumuman</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul Pengumuman</th>
                                    <th>Deskripsi Pengumuman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengumumans as $value)
                                    <tr>
                                        <td>{{ $value->judul }}</td>
                                        <td>{{ \Illuminate\Support\Str::words($value->deskripsi, 100, '...') }}</td>
                                        <td class="action-buttons">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $value->id }}" data-judul="{{ $value->judul }}" data-deskripsi="{{ $value->deskripsi }}">
                                                Ubah
                                            </button>

                                            <form action="{{ route('pengumuman.delete', ['id' => $value->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $value->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $value->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $value->id }}">Form Ubah Pengumuman</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="editForm{{ $value->id }}" method="post" action="{{ route('pengumuman.update', ['id' => $value->id]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="judul{{ $value->id }}">Judul</label>
                                                            <input type="text" class="form-control" id="judul{{ $value->id }}" value="{{ $value->judul }}" name="judul" required placeholder="Masukkan Judul">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deskripsi{{ $value->id }}">Deskripsi</label>
                                                            <textarea class="form-control" id="deskripsi{{ $value->id }}" name="deskripsi" required rows="5" placeholder="Masukkan Deskripsi">{{ $value->deskripsi }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edit Modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="pagination justify-content-end">
                {{ $pengumumans->links() }}
            </div>
        </div>
    </section>

    <!-- Tambah Pengumuman Modal -->
    <div class="modal fade" id="tambahPengumumanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengumuman.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="judul" class="form-control" id="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            @if (session('success'))
                $('#successModal').modal('show');
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 800);
            @endif
        });

        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var judul = button.data('judul');
            var deskripsi = button.data('deskripsi');
            var modal = $(this);
            modal.find('.modal-body #judul').val(judul);
            modal.find('.modal-body #deskripsi').val(deskripsi);
        });
    </script>
</div>
