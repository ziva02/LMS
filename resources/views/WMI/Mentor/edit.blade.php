@include('WMI.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Edit Data Mentor</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="post" action="{{ route('update.mentor', ['id' => $mentor->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ID Mentor</label>
                                    <input type="text" class="form-control" value="{{ $mentor->id_mentor }}"
                                        name="id_mentor" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Mentor</label>
                                    <input type="text" class="form-control" value="{{ $mentor->name }}"
                                        name="name" required placeholder="Enter Name Mentor">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ $mentor->email }}"
                                        name="email" required placeholder="Enter email Mentor">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role Mentor</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="">Select Role Mentor</option>
                                        <option value="UI/UX">UI/UX</option>
                                        <option value="Mobile Development">Mobile Development</option>
                                        <option value="IBM Academy">IBM Academy</option>
                                        <!-- Tambahkan opsi lain sesuai kebutuhan -->
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan
                                    Perubahan</button>
                                <a href="{{ url('/datamentor') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<!-- Modal HTML -->
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

        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

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
