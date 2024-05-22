@extends('template-admin.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Tambah Aduan</h1>
                    <form action="{{ route('complaint.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nik_warga" class="col-sm-2 col-form-label">NIK Warga</label>
                            <input type="text" class="form-control" id="nik_warga" name="nik_warga" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_aduan" class="col-sm-2 col-form-label">Tanggal Aduan</label>
                            <input type="date" class="form-control" id="tanggal_aduan" name="tanggal_aduan" required>
                        </div>
                        <div class="form-group">
                            <label for="isi_aduan" class="col-sm-2 col-form-label">Isi Aduan</label>
                            <input type="text" class="form-control" id="isi_aduan" name="isi_aduan" required>
                        </div>
                        <div class="form-group">
                            <label for="status_aduan" class="col-sm-2 col-form-label">Status Aduan</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status_aduan" name="status_aduan" required>
                                    <option value="diterima">Diterima</option>
                                    <option value="dalam proses">Dalam Proses</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('complaint.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
