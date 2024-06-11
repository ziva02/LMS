<!-- HTML -->
@include ('WMI.sidebar')
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
                <!-- /.col -->

                <!-- Other boxes can be added here -->

            </div>
            <div class="col-md-12" style="left:-15px;">
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
