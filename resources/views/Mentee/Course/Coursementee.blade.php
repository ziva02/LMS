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
                                                <div class="mt-3">
                                                    <b>
                                                        <!-- Tautan pada judul card -->
                                                        <h5 class="card-title">{{ $data->name }}</h5>
                                                    </b>
                                                    <br><br>
                                                </div>
                                                <p class="card-text">
                                                    {{ Illuminate\Support\Str::limit($data->deskripsi, 150) }}</p>
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
