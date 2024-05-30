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
            <a href="#tambahkriteria" class="d-block card-header py-3" data-toggle="collapse">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Kriteria</h6>
            </a>
            <div class="collapse show" id="tambahkriteria">
                <div class="card-body">
                    <form action="{{ route('kriteria.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria" name="nama_kriteria">

                            @error('nama_kriteria')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="atribut">Atirbut Kriteria</label>
                            <select name="atribut" id="atribut" class="control-form">
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>

                            @error('atribut')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="atribut">Bobot Kriteria</label>
                            <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot">

                            @error('bobot')
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
            <a href="#listkriteria" class="d-block card-header py-3" data-toggle="collapse">
                <h6 class="m-0 font-weight-bold text-primary">List Kriteria</h6>
            </a>
            <div class="collapse show" id="listkriteria">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="DataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Atribut</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kriteria as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_kriteria }}</td>
                                        <td>{{ $row->atribut }}</td>
                                        <td>{{ $row->bobot }}</td>
                                        <td>
                                            <a href="{{route('kriteria.show', $row->id)}}" class="btn btn-sm btn-circle btn-info"></a>
                                            <a href="{{ route('kriteria.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('kriteria.destroy', $row->id) }}" method="POST" style="display:inline-block;">
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
