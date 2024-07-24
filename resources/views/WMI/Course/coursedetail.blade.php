@include('WMI.sidebar')
<style>
    .search-container {
        display: flex;
        justify-content: flex-start;
        /* Menempatkan elemen di sebelah kanan */
        margin-bottom: 20px;
        /* Margin bawah agar tidak terlalu mepet */
    }

    #searchInput {
        width: 20%;
        padding: 12px 20px;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        color: #333;
        background: linear-gradient(135deg, #d5e3fb, #a2c2e2);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    #searchInput::placeholder {
        color: #666;
        font-size: 16px;
    }

    #searchInput:focus {
        background: linear-gradient(135deg, #a2c2e2, #d5e3fb);
        border: none;
        outline: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @php
                    $first = true; // Menandai apakah nama pertama sudah ditampilkan
                @endphp
                @foreach ($dataMateri as $valuee)
                    @if ($first)
                        <div class="col-sm-6">
                            <h1>{{ $valuee->course_name }}</h1>
                        </div>

                        @php
                            $first = false; // Mengubah status menjadi false setelah nama pertama ditampilkan
                        @endphp
                    @endif
                @endforeach
            </div>
            <!-- Tombol Meeting -->
            <div class="col-sm-5" style="text-align:left;">
                <a href="{{ route('courses.detail', $valuee->course_id) }}" class="btn btn-info">Materi</a>
                <a href="{{ route('link_pertemuan.detail', $valuee->course_id) }}" class="btn btn-info">Link
                    Pertemuan</a>
                <a href="{{ route('tugas.detail', $valuee->course_id) }}" class="btn btn-info">Tugas</a>
                <!-- Tombol Tugas -->
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if ($header_title === 'Course')
                    @if (auth()->user()->is_admin == 0)
                        <div class="col-sm-6 ">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#tambahMateriModal">Tambah Materi
                            </button>
                        </div>
                    @endif

                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Cari materi...">
                    </div>
                    <div id="materiList">
                        @foreach ($dataMateri as $value)
                            <div class="col-md-12 materi-item" style="margin-top: 20px;">
                                <div
                                    style="background-color: #d5e3fb; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <b>
                                            <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul_materi }}
                                            </h4>
                                        </b>
                                        @php
                                            $allowedRoles = [1, 2];
                                        @endphp
                                        @if (auth()->user()->is_admin == 0)
                                            <div>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#editMateriModal{{ $value->id }}"
                                                    style="background-color: #FFCD29; color: #000000; padding: 10px 20px; border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">
                                                    Ubah
                                                </button>
                                                <form action="{{ route('materi.delete', ['id' => $value->id]) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')"
                                                        style="background-color: hsl(0, 85%, 52%); color: #ffffff; padding: 10px 20px; border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>

                                    <div
                                        style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                        <a href="{{ asset('filemateri/' . $value->file_materi) }}"
                                            download>{{ $value->file_materi }}</a>
                                    </div>

                                    <div class="deskripsi"
                                        style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                        {{ $value->deskripsi_materi }}
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit Materi -->
                            <div class="modal fade" id="editMateriModal{{ $value->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Materi</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('materi.update', ['id' => $value->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="judul_materi">Judul Materi:</label>
                                                    <input type="text" name="judul_materi" class="form-control"
                                                        id="judul_materi" value="{{ $value->judul_materi }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi_materi">Deskripsi Materi:</label>
                                                    <textarea name="deskripsi_materi" class="form-control" id="deskripsi_materi" rows="3" required>{{ $value->deskripsi_materi }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="file_materi">File Materi:</label>
                                                    <input type="file" name="file_materi" class="form-control"
                                                        id="file_materi">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="tambahMateriModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Materi Baru</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('materi.store', ['id' => $valuee->course_id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="judul_materi">Judul Materi:</label>
                                                    <input type="text" name="judul_materi" class="form-control"
                                                        id="judul_materi" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi_materi">Deskripsi Materi:</label>
                                                    <textarea name="deskripsi_materi" class="form-control" id="deskripsi_materi" rows="3" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="file_materi">File Materi (PDF):</label>
                                                    <input type="file" name="file_materi" class="form-control"
                                                        id="file_materi" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @elseif ($header_title === 'Link Pertemuan')
                    @if (auth()->user()->is_admin == 0)
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#tambahLinkModal">
                                Tambah Link Pertemuan
                            </button>
                        </div><br><br>
                    @endif


                    @foreach ($dataLink as $value)
                        <div class="col-md-12">
                            <div
                                style="background-color: #d5e3fb; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <b>
                                        <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul_link }}</h4>
                                    </b>
                                    <!-- Tombol Edit dan Hapus -->
                                    @if (auth()->user()->is_admin == 0)
                                        <div>
                                            <!-- Form untuk menghapus -->
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#editLinkModal{{ $value->id }}"
                                                style="background-color: FFCD29; color: #000000; 
                                            padding: 10px 20px; border-radius: 5px; min-width: 60px; 
                                            text-align: center; display: inline-block; border: none;">
                                                Ubah
                                            </button>
                                            <form action="{{ route('link.delete', ['id' => $value->id]) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')"
                                                    style="background-color: hsl(0, 85%, 52%); color: #ffffff; 
                                            padding: 10px 20px; border-radius: 5px; min-width: 60px; 
                                            text-align: center; display: inline-block; border: none;">Hapus</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                    <a href="{{ $value->deskripsi }}">{{ $value->deskripsi }}</a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit Link Pertemuan -->
                        <div class="modal fade" id="editLinkModal{{ $value->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Link Pertemuan</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('link_pertemuan.update', ['id' => $value->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="judul_link">Judul Link:</label>
                                                <input type="text" name="judul_link" class="form-control"
                                                    id="judul_link" value="{{ $value->judul_link }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi:</label>
                                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required>{{ $value->deskripsi }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan
                                                Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit Link Pertemuan -->
                        <div class="modal fade" id="editLinkModal{{ $value->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Link Pertemuan</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('link_pertemuan.update', ['id' => $value->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="judul_link">Judul Link:</label>
                                                <input type="text" name="judul_link" class="form-control"
                                                    id="judul_link" value="{{ $value->judul_link }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi:</label>
                                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required>{{ $value->deskripsi }}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif ($header_title === 'Tugas')
                    @if (auth()->user()->is_admin == 1)
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#tambahTugasModal">
                                <i class="fas fa-plus"></i> Tambah Tugas
                            </button>

                            <a href="{{ route('expnilai') }}" class="btn btn-success ml-2">Export</a>


                        </div><br><br>
                    @endif



                    @foreach ($datatugas as $value)
                        <div class="col-md-12">

                            <div
                                style="background-color: #d5e3fb; border-radius: 5px; margin-bottom: 20px; padding: 20px;">

                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <b>
                                        <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul_tugas }}
                                        </h4>
                                    </b>
                                    <!-- Tombol Edit dan Hapus -->
                                    @if (auth()->user()->is_admin == 1)
                                        <div>
                                            <!-- Form untuk menghapus -->
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#editTugasModal{{ $value->id }}"
                                                style="background-color: FFCD29; color: #000000; padding: 10px 20px; border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">
                                                Ubah
                                            </button>
                                            <form action="{{ route('tugas.delete', ['id' => $value->id]) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')"
                                                    style="background-color: hsl(0, 85%, 52%); color: #ffffff; 
                                            padding: 10px 20px; border-radius: 5px; min-width: 60px; 
                                            text-align: center; display: inline-block; border: none;">Hapus</button>
                                            </form>
                                            <a href="{{ route('lihatPengumpulan', ['tugas_id' => $value->id]) }}"
                                                class="btn btn-primary"
                                                style=" color: #ffffff; padding: 10px 20px; border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">
                                                Lihat Pengumpulan
                                            </a>

                                        </div>
                                    @endif
                                    <!-- Button trigger modal -->

                                    @if (auth()->user()->is_admin == 2)
                                        <!-- Tombol "Submit Tugas" sekarang akan memicu modal -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#submitTugasModal{{ $value->id }}"
                                            style="background: linear-gradient(135deg, #25B9C9, #8A3DFF); color: #ffffff; padding: 10px 20px;
                                                border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">
                                            Kumpul Tugas
                                        </button>
                                    @endif
                                    <!-- Modal Structure -->
                                    <div class="modal fade" id="feedbackModal" tabindex="-1"
                                        aria-labelledby="feedbackModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="feedbackModalLabel">Pesan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if (session('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif

                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <!-- Modal -->
                                    <div class="modal fade" id="submitTugasModal{{ $value->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="submitTugasModalLabel{{ $value->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="submitTugasModalLabel">Form Kumpul
                                                        Tugas
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form untuk mengunggah tugas -->
                                                    <form action="{{ route('submitTugas', ['id' => $value->id]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="tugas_file">Pilih File Tugas:</label>
                                                            <input type="file" class="form-control-file"
                                                                id="tugas_file" name="tugas_file" accept=".pdf">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                    <a href="{{ asset('filetugas/' . $value->file_tugas) }}"
                                        download>{{ $value->file_tugas }}</a>
                                </div>
                                <div style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                    <h6>{{ $value->deskripsi }}</h6>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="editTugasModal{{ $value->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Tugas</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('tugas.update', ['id' => $value->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="judul_tugas">Judul Tugas:</label>
                                                <input type="text" name="judul_tugas" class="form-control"
                                                    id="judul_tugas" value="{{ $value->judul_tugas }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Tugas:</label>
                                                <textarea name="deskripsi" class="form-control" id="deskripsi_materi" rows="3" required>{{ $value->deskripsi }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="file_tugas">File Tugas:</label>
                                                <input type="file" name="file_tugas" class="form-control"
                                                    id="file_tugas">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="tambahTugasModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Tugas Baru</h5>

                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('tugas.store', ['id' => $valuee->course_id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="judul_tugas">Judul Tugas:</label>
                                                <input type="text" name="judul_tugas" class="form-control"
                                                    id="judul_tugas" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi Tugas:</label>
                                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="file_tugas">File Tugas (PDF):</label>
                                                <input type="file" name="file_tugas" class="form-control"
                                                    id="file_tugas" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="tambahLinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Link Pertemuan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('link_pertemuan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $valuee->course_id }}">
                    <div class="form-group">
                        <label for="judul_link">Judul Link:</label>
                        <input type="text" name="judul_link" class="form-control" id="judul_link" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal HTML -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        @if (session('success'))
            // Menampilkan modal
            $('#successModal').modal('show');
            
            // Menutup modal setelah 0.8 detik
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 800);
        @endif
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('error') || session('success'))
            var feedbackModal = new bootstrap.Modal(document.getElementById('feedbackModal'));
            feedbackModal.show();
        @endif
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const materiList = document.getElementById('materiList');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.trim().toLowerCase();
            const materiItems = materiList.querySelectorAll('.materi-item');

            materiItems.forEach(function(item) {
                const judul = item.querySelector('h4').textContent.trim().toLowerCase();
                const deskripsi = item.querySelector('.deskripsi').textContent.trim()
                    .toLowerCase();

                if (judul.includes(searchTerm) || deskripsi.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
