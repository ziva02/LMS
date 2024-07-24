@include('WMI.sidebar')
<!-- jQuery (for compatibility) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Kelas</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{ url('wmi/course/add') }}" class="btn btn-primary">Tambah Kelas</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($courses as $data)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%; max-width: 400px; background-color: #f0f0f0;">
                            <img class="card-img-top" src="{{ asset('img/' . $data->gambar) }}" alt="Course Image" style="height:150px; width:100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $data->name }}</b></h5>
                                <p class="card-text" style="color: black;">
                                    {{ Illuminate\Support\Str::limit($data->deskripsi, 100) }}
                                </p>
                                <h6 class="text-muted">{{ $data->durasi }}</h6>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailsModal{{ $data->id }}">
                                        Lihat Detail
                                    </button>
                                    <div>
                                        <a href="{{ route('edit.course', ['id' => $data->id]) }}" class="btn btn-warning">Ubah</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $data->id }}">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination justify-content-end">
                {{ $courses->links() }}
            </div>

        </div>
    </section>
</div>

<!-- Modal Konfirmasi Penghapusan -->
@foreach ($courses as $data)
    <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form id="delete-form-{{ $data->id }}" action="{{ route('delete.course', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal Detail Deskripsi -->
@foreach ($courses as $data)
    <div class="modal fade" id="detailsModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel{{ $data->id }}">{{ $data->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('img/' . $data->gambar) }}" alt="Course Image" style="width: 100%; height: auto; object-fit: cover;">
                    <p class="mt-3">{{ $data->deskripsi }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal Berhasil -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
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

<script type="text/javascript">
    $(document).ready(function() {
        @if (session('success'))
            $('#successModal').modal('show');
            
            // Menutup modal setelah 0.8 detik
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 800);
        @endif
    });
</script>
