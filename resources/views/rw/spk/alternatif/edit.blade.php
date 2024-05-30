@extends('template-admin.template')

@section('content')
<div class="container">
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    <div class="col-md-4">
        <a href="#tambahalternatif" class="d-block card-header py-3" data-toggle="collapse">
            <h6 class="m-0 font-weight-bold text-primary">Edit alternatif {{$alternatif->nama_alternatif}}</h6>
        </a>
        <div class="collapse show" id="tambahalternatif">
            <div class="card-body">
                <form action="{{ route('alter.update', $alternatif->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_alternatif">Nama alternatif</label>
                        <input type="text" class="form-control @error('nama_alternatif') is-invalid @enderror" id="nama_alternatif" name="nama_alternatif" value="{{$alternatif->nama_alternatif}}">

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
</div>
@endsection
