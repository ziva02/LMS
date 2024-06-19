@include ('WMI.sidebar')
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

            <div class="col-md-12" style="left:-7px;">
                @foreach ($pengumumans as $value)
                    <div class="col-md-12">
                        <div
                            style="background-color: #b0c9f1; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                            <div
                                style="display: flex; justify-content: space-between; align-items: center;">
                                <b>
                                    <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul }}
                                    </h4>
                                </b>
                            </div>
                            <p
                                style="margin-bottom: 10px; color: #000000; overflow: hidden; word-wrap: break-word;">
                                {{ $value->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Calendar -->
    <div class="container-fluid">
        <div id="calendar"></div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>

<!-- Script for FullCalendar initialization -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                {
                    title: 'Meeting',
                    start: '2024-04-01T10:00:00',
                    end: '2024-04-01T12:00:00'
                },
                {
                    title: 'Conference',
                    start: '2024-04-15',
                    end: '2024-04-18'
                }
            ]
        });

        calendar.render();
    });
</script>
