@extends('template-admin.template')

@section('content')
<div class="container">
    <!-- Success Message -->
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    <div class="row">
        <!-- Tambah Crips Form -->
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <a href="#tambahcrips" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="tambahcrips">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Crips</h6>
                </a>
                <div class="collapse show" id="tambahcrips">
                    <div class="card-body">
                        <form action="{{ route('cp.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$kriteria->id}}" name="kriteria_id">
                            <div class="form-group">
                                <label for="nama_crips">Nama Crips</label>
                                <input type="text" class="form-control @error('nama_crips') is-invalid @enderror" id="nama_crips" name="nama_crips" value="{{ old('nama_crips') }}" required>

                                @error('nama_crips')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot Crips</label>
                                <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{ old('bobot') }}" required>

                                @error('bobot')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <a href="{{ route('kriteria.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- List Crips -->
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <a href="#listcrips" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="listcrips">
                    <h6 class="m-0 font-weight-bold text-primary">List Crips</h6>
                </a>
                <div class="collapse show" id="listcrips">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="DataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Crips</th>
                                        <th>Bobot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($crips as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nama_crips }}</td>
                                            <td>{{ $row->bobot }}</td>
                                            <td>
                                                <a href="{{ route('cp.edit', $row->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('cp.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('kriteria.index', $kriteria->id) }}" class="btn btn-sm btn-secondary mt-3">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
