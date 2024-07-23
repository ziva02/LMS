@include('WMI.sidebar')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Edit Data Mentee</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form method="post" action="{{ route('update.mentee', ['id' => $mentee->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ID Mentee</label>
                                    <input type="text" class="form-control" value="{{ $mentee->id_mentee }}"
                                        name="id_mentee" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Mentor</label>
                                    <input type="text" class="form-control" value="{{ $mentee->name }}"
                                        name="name" required placeholder="Enter Name Mentor">
                                </div>

                                <div class="form-group">
                                    <label>Role Mentor</label>
                                    <input type="text" class="form-control" value="{{ $mentee->role }}"
                                        name="role" required placeholder="Enter Role Mentor">
                                </div>

                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" value="{{ $mentee->email }}"
                                        name="email" required placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label>Email Supervisior</label>
                                    <input type="text" class="form-control" value="{{ $mentee->email_supervisior}}"
                                        name="email_supervisior" required placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <!-- New fields -->
                                <div class="form-group">
                                    <label>Nama DPP</label>
                                    <input type="text" class="form-control" value="{{ $mentee->nama_dpp }}"
                                        name="nama_dpp" placeholder="Enter Nama DPP">
                                </div>

                                <div class="form-group">
                                    <label>No DPP</label>
                                    <input type="text" class="form-control" value="{{ $mentee->no_dpp }}"
                                        name="no_dpp" placeholder="Enter No DPP">
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('datamentee') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
