@include('WMI.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Kelas</h1>
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
                            <!-- Tautan ke halaman detail -->
                            <a href="{{ route('courses.detail', ['id' => $data->id]) }}">
                                <img class="card-img-top" src="{{ asset('img/' . $data->gambar) }}" alt="Course Image" style="height:150px; width:100%; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{ $data->name }}</b></h5>
                                    
                                    <p class="card-text">{{ Illuminate\Support\Str::limit($data->deskripsi, 100) }}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <a href="{{ route('courses.detail', ['id' => $data->id]) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                                    </div>
                                    <h6 class="text-muted">{{ $data->durasi }}</h6>
                                </div>
                            </a>
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
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- End Modal -->
