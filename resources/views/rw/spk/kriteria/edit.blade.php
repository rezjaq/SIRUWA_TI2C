@extends('template-admin.template')

@section('content')
<div class="container">
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    <div class="col-md-4">
        <a href="#tambahkriteria" class="d-block card-header py-3" data-toggle="collapse">
            <h6 class="m-0 font-weight-bold text-primary">Edit Kriteria {{$kriteria->nama_kriteria}}</h6>
        </a>
        <div class="collapse show" id="tambahkriteria">
            <div class="card-body">
                <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_kriteria">Nama Kriteria</label>
                        <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria" name="nama_kriteria" value="{{$kriteria->nama_kriteria}}">

                        @error('nama_kriteria')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="atribut">Atirbut Kriteria</label>
                        <select name="atribut" id="atribut" class="form-control @error('atribut') is-invalid @enderror">
                            <option value="Benefit" {{ $kriteria->atribut == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ $kriteria->atribut == 'Cost' ? 'selected' : '' }}>Cost</option>
                        </select>                    

                        @error('atribut')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="atribut">Bobot Kriteria</label>
                        <input type="text" class="form-control @error('bobot') is-invalid @enderror" id="bobot" name="bobot" value="{{$kriteria->bobot}}">

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
</div>
@endsection
