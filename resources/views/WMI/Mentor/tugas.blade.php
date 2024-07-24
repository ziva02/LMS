<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@include('WMI.sidebar')

<div class="content-wrapper"><br>
    <div style="position: relative  ; left:18px;">
        <h4 class=" text-primary my-4 py-2" style="font-weight: bold; background-color: #f8f9fa; border-radius: 5px;">
            {{ $judulTugas }}
        </h4>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
            Belum Kumpul Tugas
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nilai">
            Belum Dinilai
        </button>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="modal fade" id="nilai">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tugas Mentee yang belum dinilai</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    @foreach ($ceknilai as $userrr)
                                        <li>{{ $userrr->user->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="userModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Nama Mentee yang belum mengumpulkan tugas</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    @foreach ($data as $user)
                                        <li>{{ $user->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($tugasMentees as $value)
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div style="background-color: #d5e3fb; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <b>
                                    <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->user->name }}</h4>
                                </b>
                                @php
                                    $allowedRoles = [1, 2]; // Daftar peran yang diizinkan untuk mengakses tombol
                                @endphp
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#nilaiModal{{ $value->id }}"
                                    style="background-color: #FFCD29; color: #000000; padding: 10px 20px; border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">
                                    Beri Nilai
                                </button>
                            </div>

                            <div class="modal fade" id="nilaiModal{{ $value->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="nilaiModalLabel{{ $value->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="nilaiModalLabel{{ $value->id }}">Beri Nilai
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('isiNilai', ['id' => $value->id]) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nilai">Nilai:</label>
                                                    <input type="number" class="form-control" id="nilai"
                                                        name="nilai" min="1" max="100" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Nilai</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                <a href="{{ asset('filemateri/' . $value->tugas_file) }}"
                                    download>{{ $value->tugas_file }}</a>
                                <h6>{{ $value->nilai }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
