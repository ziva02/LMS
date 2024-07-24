<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Example</title>
    <!-- Bootstrap CSS -->
</head>
<body>
    <!-- Include Sidebar -->
    @include('WMI.sidebar')

    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Selamat datang {{ Auth::user()->name }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info Boxes -->
                <div class="row">
                    <!-- Box - Mentor Count -->
                    <div class="col-md-3">
                        <div class="info-box bg-info" data-bs-toggle="modal" data-bs-target="#mentorModal">
                            <span class="info-box-icon"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <h4 class="info-box-text">Mentor</h4>
                                <span class="info-box-number">{{ $totalMentor }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <!-- Section for Unsubmitted Tasks -->
                    <div class="col-md-9">
                        @if ($tugasBelumDikumpul->isNotEmpty())
                            <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                                <div>
                                    <h5><i class="icon fas fa-exclamation-triangle"></i> Tugas Belum Dikumpulkan!</h5>
                                    <ul>
                                        @foreach ($tugasBelumDikumpul as $tugas)
                                            <li>{{ $tugas->judul_tugas }} (Course: {{ $tugas->name }})</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    @if ($coursesQuery->isNotEmpty())
                                        <a href="{{ route('courses.detail', ['id' => $coursesQuery->first()->id]) }}">Pergi ke Halaman Tugas</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.section -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tugas Mentee</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Tugas</th>
                                            <th>Course Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tugasmentee as $index => $tugas)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $tugas->judul_tugas }}</td>
                                                <td>{{ $tugas->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $tugasmentee->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <!-- Pengumuman Section -->
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($pengumumans as $value)
                            <div class="col-md-12">
                                <div style="background-color: #b0c9f1; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul }}</h4>
                                    </div>
                                    <p style="margin-bottom: 10px; color: #000000; overflow: hidden; word-wrap: break-word;">
                                        {{ $value->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mentorModal" tabindex="-1" aria-labelledby="mentorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="mentorModalLabel">Daftar Mentor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        @foreach ($mentor as $mentorName)
                            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-user"></i> {{ $mentorName }}</span>
                                <span class="badge bg-primary rounded-pill">Mentor</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
   
</body>
</html>
