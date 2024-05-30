@extends('template-admin.template')

@section('content')
<div class="container">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('kriteria.index') }}">Menu SPK</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kriteria.show', $crips->kriteria_id) }}">Detail Kriteria</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Crips</li>
        </ol>
    </nav>

    <!-- Success Message -->
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    <div class="row">
        <!-- Edit Crips Form -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <a href="#editCripsForm" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="editCripsForm">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Crips: {{ $crips->nama_crips }}</h6>
                </a>
                <div class="collapse show" id="editCripsForm">
                    <div class="card-body">
                        <form action="{{ route('cp.update', $crips->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_crips">Nama Crips</label>
                                <input type="text" class="form-control @error('nama_crips') is-invalid @enderror" id="nama_crips" name="nama_crips" value="{{ $crips->nama_crips }}" required>

                                @error('nama_crips')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot Crips</label>
                                <input type="number" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{ $crips->bobot }}" required>

                                @error('bobot')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <a href="{{ route('kriteria.show', $crips->kriteria_id) }}" class="btn btn-sm btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Info or Actions -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Crips</h6>
                </div>
                <div class="card-body">
                    <p>Crips ini merupakan bagian dari kriteria dengan ID: {{ $crips->kriteria_id }}</p>
                    <p>Anda dapat mengedit nama dan bobot crips sesuai kebutuhan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
