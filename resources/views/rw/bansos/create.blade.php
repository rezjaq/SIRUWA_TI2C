@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Pengajuan Bansos') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('RW.bansos.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nik_warga"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Warga') }}</label>
                                <select id="nik_warga" class="form-control @error('nik_warga') is-invalid @enderror"
                                    name="nik_warga" required>
                                    <option value="">Pilih Warga</option>
                                    @foreach ($warga as $w)
                                        <option value="{{ $w->nik }}">{{ $w->nama }}</option>
                                    @endforeach
                                </select>

                                @error('nik_warga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="pendidikan" class="col-form-label">Pendidikan:</label>
                                <select class="form-control" id="pendidikan" name="pendidikan">
                                    <option value="1">Tamat SLTA</option>
                                    <option value="2">Tamat SLTP</option>
                                    <option value="3">Tamat SD</option>
                                    <option value="4">Tidak Tamat SD</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="pekerjaan" class="col-form-label">Pekerjaan:</label>
                                <select class="form-control" id="pekerjaan" name="pekerjaan">
                                    <option value="1">Swasta</option>
                                    <option value="2">Petani</option>
                                    <option value="3">Buruh</option>
                                    <option value="4">IRT</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="penghasilan" class="col-form-label">Penghasilan:</label>
                                <select class="form-control" id="penghasilan" name="penghasilan">
                                    <option value="1">> Rp.1.000.000</option>
                                    <option value="2">Rp.750.000-Rp.900.000</option>
                                    <option value="3">Rp.600.000-Rp.700.000</option>
                                    <option value="4">Rp.500.000-Rp.550.000</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="status_kepemilikan_rumah" class="col-form-label">Status Kepemilikan
                                    Rumah:</label>
                                <select class="form-control" id="status_kepemilikan_rumah" name="status_kepemilikan_rumah">
                                    <option value="1">Milik sendiri</option>
                                    <option value="2">Milik orang tua/anak</option>
                                    <option value="3">Tidak memiliki rumah/kontrak</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="fasilitas_wc" class="col-form-label">Fasilitas WC:</label>
                                <select class="form-control" id="fasilitas_wc" name="fasilitas_wc">
                                    <option value="1">WC pribadi/milik sendiri</option>
                                    <option value="2">WC Umum</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="fasilitas_listrik" class="col-form-label">Fasilitas Listrik:</label>
                                <select class="form-control" id="fasilitas_listrik" name="fasilitas_listrik">
                                    <option value="1">Listrik PLN 1.300 W</option>
                                    <option value="2">Listrik PLN 900 W</option>
                                    <option value="3">Listrik PLN 450 W</option>
                                    <option value="4">Tanpa listrik/Lampu tembok</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="bahan_bakar" class="col-form-label">Bahan Bakar:</label>
                                <select class="form-control" id="bahan_bakar" name="bahan_bakar">
                                    <option value="1">Gas LPG</option>
                                    <option value="2">Minyak tanah</option>
                                    <option value="3">Kayu bakar</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="kepemilikan_tabungan" class="col-form-label">Kepemilikan Tabungan:</label>
                                <select class="form-control" id="kepemilikan_tabungan" name="kepemilikan_tabungan">
                                    <option value="1">Tabungan > Rp.1000.000</option>
                                    <option value="2">Tabungan < Rp.1000.000</option>
                                    <option value="3">Tidak memiliki tabungan</option>
                                </select>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                    <a href="{{ route('RW.bansos.ranked-scores') }}" class="btn btn-secondary">
                                        {{ __('Batal') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
