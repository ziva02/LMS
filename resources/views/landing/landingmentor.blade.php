@include('WMI.sidebar')
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
                <div class="col-md-3">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Mentee</span>
                            <span class="info-box-number">{{ $landing }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="left:-15px;">
                @foreach ($pengumumans as $value)
                    <div class="col-md-12">
                        <div style="background-color: #b0c9f1; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <b>
                                    <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul }}</h4>
                                </b>
                            </div>
                            <p style="margin-bottom: 10px; color: #000000; overflow: hidden; word-wrap: break-word;">
                                {{ $value->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Kalender -->
            <div id="calendar"></div>
        </div>
    </section>
</div>

<!-- jQuery (for compatibility) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Moment.js (for date manipulation) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- FullCalendar CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.2/main.min.css" rel="stylesheet">
<!-- FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.2/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    // Contoh event, Anda bisa menggantinya dengan data dari server
                    {
                        title: 'Event 1',
                        start: '2024-07-20'
                    },
                    {
                        title: 'Event 2',
                        start: '2024-07-22'
                    }
                ]
            });
            calendar.render();
        } else {
            console.error("Element with id 'calendar' not found.");
        }
    });
</script>
