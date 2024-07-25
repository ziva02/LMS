@include ('WMI.sidebar')

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
    .info-box {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin-bottom: 20px;
    }
    .info-box-icon {
        font-size: 40px;
        color: #ffffff;
    }
    .info-box-content {
        color: #ffffff;
    }
    .info-box.bg-info {
        background-color: #007bff;
    }
    .announcement {
        background-color: #b0c9f1;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .announcement h4 {
        margin-bottom: 10px;
        color: #000000;
    }
    .announcement p {
        margin-bottom: 10px;
        color: #000000;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Selamat datang {{ Auth::user()->name }} </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info Boxes -->
            <div class="row">
                <!-- Box - Mentee Count -->
                <div class="col-md-3">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Mentee</span>
                            <span class="info-box-number">{{ $landing }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Mentor</span>
                            <span class="info-box-number">{{ $mentor }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Materi</span>
                            <span class="info-box-number">{{ $materi }}</span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <!-- Announcement Section -->
                <div class="col-md-12">
                    @foreach ($pengumumans as $value)
                        <div class="announcement">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <h4>{{ $value->judul }}</h4>
                            </div>
                            <p>{{ $value->deskripsi }}</p>
                        </div>
                    @endforeach
                </div>
                <!-- Other boxes can be added here -->

            </div>
            <!-- /.row -->

            <!-- Main row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Calendar -->

    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

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
            // Set calendar options here
            // Example:
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                // You can load events/availability list from your data source here
                // Example:
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
