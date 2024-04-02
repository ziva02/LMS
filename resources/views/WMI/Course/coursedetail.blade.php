@include('WMI.sidebar')

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
            </div>


        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if ($header_title === 'Course')
                    <div class="col-sm-6" style="left:89.5%">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#tambahDataModal">
                            <i class="fas fa-plus"></i> Tambah Materi
                        </button>
                    </div><br>
                    <div class="col-sm-6" style="left:89.5%">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#tambahDataModal">
                            <i class="fas fa-plus"></i> Tambah Materi
                        </button>
                    </div>
                    <br>

                    @foreach ($dataMateri as $value)
                        <div class="col-md-12" style="margin-top: 20px;"> <!-- Penambahan margin-top -->
                            <div
                                style="background-color: #d5e3fb; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <b>
                                        <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul_materi }}</h4>
                                    </b>
                                    <!-- Tombol Edit dan Hapus -->
                                    <div>
                                        <!-- Form untuk menghapus -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editDataModal{{ $value->id }}"
                                            style="background-color: FFCD29; color: #000000; padding: 10px 20px; border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">
                                            Ubah
                                        </button>
                                        <form action="{{ route('materi.delete', ['id' => $value->id]) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')"
                                                style="background-color: hsl(0, 85%, 52%); color: #ffffff; padding: 10px 20px; border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">Hapus</button>
                                        </form>
                                    </div>
                                </div>

                                <div style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                    <a href="{{ asset('filemateri/' . $value->file_materi) }}"
                                        download>{{ $value->file_materi }}</a>
                                </div>

                                <div style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                    {{ $value->deskripsi_materi }}
                                </div>
                            </div>
                        </div>
                        <!-- Modal Edit Materi -->
                        <div class="modal fade" id="editDataModal{{ $value->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Materi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('materi.update', ['id' => $value->id]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="judul_materi">Judul Materii:</label>
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
                    @endforeach
                @elseif ($header_title === 'Link Pertemuan')
                    @foreach ($dataLink as $value)
                        <div class="col-md-12">
                            <div
                                style="background-color: #d5e3fb; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <b>
                                        <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul_link }}</h4>
                                    </b>
                                    <!-- Tombol Edit dan Hapus -->
                                    <div>
                                        <!-- Form untuk menghapus -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editLinkModal{{ $value->id }}"
                                            style="background-color: FFCD29; color: #000000; 
                                            padding: 10px 20px; border-radius: 5px; min-width: 60px; 
                                            text-align: center; display: inline-block; border: none;">
                                            Ubah
                                        </button>
                                        <form action="{{ route('link.delete', ['id' => $value->id]) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')"
                                                style="background-color: hsl(0, 85%, 52%); color: #ffffff; 
                                            padding: 10px 20px; border-radius: 5px; min-width: 60px; 
                                            text-align: center; display: inline-block; border: none;">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                <div style="margin-bottom: 10px; color: #000000; overflow: auto; max-height: 100px;">
                                    {{ $value->deskripsi }}
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit Link Pertemuan -->
                        <div class="modal fade" id="editLinkModal{{ $value->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Link Pertemuan</h5>
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
                @endif
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('materi.store', ['id' => $valuee->course_id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul_materi">Judul Materi:</label>
                        <input type="text" name="judul_materi" class="form-control" id="judul_materi" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_materi">Deskripsi Materi:</label>
                        <textarea name="deskripsi_materi" class="form-control" id="deskripsi_materi" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file_materi">File Materi:</label>
                        <input type="file" name="file_materi" class="form-control" id="file_materi" required>
                    </div>
                    <input type="hidden" name="course_id" value="{{ $valuee->course_id }}">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
