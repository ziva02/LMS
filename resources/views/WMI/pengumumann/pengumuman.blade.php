@include ('WMI.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengumuman</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <button class="btn btn-primary" style="vertical-align: middle;" data-toggle="modal"
                        data-target="#tambahPengumumanModal">Tambah Pengumuman</button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($pengumumans as $value)
                    <div class="col-md-12">
                        <div style="background-color: #b0c9f1; border-radius: 5px; margin-bottom: 20px; padding: 20px;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <b>
                                    <h4 style="margin-bottom: 10px; color: #000000;">{{ $value->judul }}</h4>
                                </b>
                                <div>
                                    <form action="{{ route('pengumuman.edit', ['id' => $value->id]) }}" method="GET"
                                        style="display: inline-block;">
                                        <button type="submit"
                                            style="background-color: hsl(231, 100%, 95%); color: #3B80F2; padding: 10px 20px; border-radius: 5px; margin-right: 10px; min-width: 60px; text-align: center; 
                                            display: inline-block; border: 1px solid #3B80F2;">Edit</button>
                                    </form>
                                    <form action="{{ route('pengumuman.delete', ['id' => $value->id]) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')"
                                            style="background-color: hsl(0, 85%, 52%); color: #ffffff; padding: 10px 20px; border-radius: 5px; min-width: 60px; text-align: center; display: inline-block; border: none;">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            <p style="margin-bottom: 10px; color: #000000; overflow: hidden; word-wrap: break-word;">
                                {{ $value->deskripsi }}
                            </p>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination justify-content-end">
                {{ $pengumumans->links() }}
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="tambahPengumumanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengumuman.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="judul" class="form-control" id="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
