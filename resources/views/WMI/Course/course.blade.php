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
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="row">
                            @foreach ($courses as $data)
                                <div class="col-md-4 mb-4">
                                    <div class="card" style="width: 100%; background-color: #f0f0f0;">
                                        <!-- Tautan ke halaman detail -->
                                        <a href="{{ route('courses.detail', ['id' => $data->id]) }}">
                                            <img class="card-img-top" src="{{ asset('img/' . $data->gambar) }}"
                                                alt="Course Image" style="height:250px; width:100%; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $data->name }}</b></h5><br>
                                                <h6 class="text-muted">{{ $data->durasi }}</h6>
                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                    <div>
                                                        <a href="{{ route('edit.course', ['id' => $data->id]) }}"
                                                            class="btn btn-warning mr-2">Ubah</a>
                                                        <!-- Menggunakan modal untuk konfirmasi penghapusan -->
                                                        <button type="button" class="btn btn-danger"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal{{ $data->id }}">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                                <p class="card-text mt-3" style="color: black;">
                                                    {{ Illuminate\Support\Str::limit($data->deskripsi, 300) }}
                                                </p>
                                            </div>
                                        </a> <!-- Akhir dari tautan ke halaman detail -->
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="pagination justify-content-end">
                            {{ $courses->links() }}
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Konfirmasi Penghapusan -->
@foreach ($courses as $data)
    <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
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
                    <!-- Tambahkan formulir untuk mengirimkan permintaan DELETE -->
                    <form id="delete-form-{{ $data->id }}"
                        action="{{ route('delete.course', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        @if (session('success'))
            // Menampilkan modal
            $('#successModal').modal('show');
            
            // Menutup modal setelah 0.8 detik
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 800);
        @endif
    });
</script>



<!-- End Modal -->
