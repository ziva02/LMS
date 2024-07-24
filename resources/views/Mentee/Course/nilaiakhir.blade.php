@include ('WMI.sidebar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nilai {{ Auth::user()->name }}</h1>
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
                            <div class="card-header">
                                <h3 class="card-title">Nilai {{ Auth::user()->name }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="format" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>Course</th>
                                            <th>Nilai Akhir</th>
                                            <th>Sertifikat</th>
                                        </tr>
                                    </thead>
                                    <?php $number = 1; ?>
                                    <tbody>
                                        @foreach ($nilaiakhir as $nilai)
                                            <tr>

                                                <td>{{ $nilai->course_name }}</td>
                                                <td>{{ number_format($nilai->average_score, 1) }}</td>
                                                <td>

                                                    <a href="{{ route('sertifikat', ['course_id' => $nilai->course_id]) }}"
                                                        class="btn btn-warning">Lihat Sertifikat</a>
                                                    <a href="{{ route('sertifikat.download', ['course_id' => $nilai->course_id]) }}"
                                                        class="btn btn-success">Unduh Sertifikat</a>



                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table><br>
                                <div class="pagination justify-content-end">
                                    {{ $nilaiakhir->links() }}
                                </div>
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
