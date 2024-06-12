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
                                                    <td>
                                                        <a href="{{ route('sertifikat', ['course_id' => $nilai->course_id]) }}" class="btn btn-warning">Lihat Sertifikat</a>
                                                        <a href="{{ route('sertifikat.download', ['course_id' => $nilai->course_id]) }}" class="btn btn-success">Unduh Sertifikat</a>
                                                    </td>
                                                    
                                                   
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
