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
                                        name="id_mentor" required >
                                </div>

                                <div class="form-group">
                                    <label>Nama Mentor</label>
                                    <input type="text" class="form-control" value="{{ $mentor->name }}"
                                        name="name" required placeholder="Enter Name Mentor">
                                </div>

                                <div class="form-group">
                                    <label>Role Mentor</label>
                                    <input type="text" class="form-control" value="{{ $mentor->role }}"
                                        name="role" required placeholder="Enter Role Mentor">
                                </div>

                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" value="{{ $mentor->email }}"
                                        name="email" required placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Password">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ url('WMI/Mentor/datamentor') }}"
                                    class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
