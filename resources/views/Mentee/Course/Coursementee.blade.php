@include('WMI.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelas</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <a href="/nilaiakhir" class="btn btn-primary">Cek Nilai</a>
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
                                                alt="Course Image" style="height:250px; width:100%; object-fit:cover;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <b>{{ $data->name }}</b>
                                                </h5>
                                                &nbsp;&nbsp;<h6 class="text-muted">{{ $data->durasi }}</h6>
                                                <p class="card-text" style="color: black;">
                                                    {{ Illuminate\Support\Str::limit($data->deskripsi, 150) }}
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
<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        @if (session('success'))
            $('#successModal').modal('show');
        @endif
    });
</script>
