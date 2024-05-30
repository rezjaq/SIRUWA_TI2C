@extends('template-admin.template')

@section('content')
<div class="container">
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <a href="#tambahalternatif" class="d-block card-header py-3" data-toggle="collapse">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Alternatif</h6>
            </a>
            <div class="collapse show" id="tambahalternatif">
                <div class="card-body">
                    <form action="{{ route('alter.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_alternatif">Nama Alternatif</label>
                            <input type="text" class="form-control @error('nama_alternatif') is-invalid @enderror" id="nama_alternatif" name="nama_alternatif" value="{{old ('nama_alternatif')}}">

                            @error('nama_alternatif')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <a href="#listalternatif" class="d-block card-header py-3" data-toggle="collapse">
                <h6 class="m-0 font-weight-bold text-primary">List Alternatif</h6>
            </a>
            <div class="collapse show" id="listalternatif">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="DataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alternatif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($alternatif as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_alternatif }}</td>
                                       <td>
                                            <a href="{{ route('alter.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('alter.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
