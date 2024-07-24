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
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <a href="/nilaiakhir" class="btn btn-primary btn-sm">Cek Nilai</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($courses as $data)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100" style="background-color: #f0f0f0;">
                            <a href="{{ route('courses.detail', ['id' => $data->id]) }}" class="text-decoration-none text-dark">
                                <img class="card-img-top" src="{{ asset('img/' . $data->gambar) }}" alt="Course Image" style="height: 150px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{ $data->name }}</b></h5>
                                    <p class="card-text">{{ Illuminate\Support\Str::limit($data->deskripsi, 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <h6 class="text-muted"><b>{{ $data->durasi }}</b></h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-end">
                {{ $courses->links() }}
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
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
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery dan Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        @if (session('success'))
            $('#successModal').modal('show');
        @endif
    });
</script>
