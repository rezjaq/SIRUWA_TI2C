@extends('template-admin.template')

@section('content')
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #03774A;">
            <div class="card-header bg-custom text-white">
                <h4 class="mb-0">
                    <a href="{{ route('rt.surat.index') }}" class="btn btn-sm btn-light me-2">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    Form Pengajuan Surat
                </h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <form method="POST" action="{{ route('rt.surat.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik_warga" class="col-sm-2 col-form-label">NIK Warga</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="nik_warga" name="nik_warga" required>
                                    <option value="">Pilih NIK Warga</option>
                                    @foreach ($wargas as $warga)
                                        <option value="{{ $warga->nik }}">{{ $warga->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .bg-custom {
            background-color: #03774A !important;
        }

        .card-header {
            border-bottom: none;
        }

        .card {
            border-radius: 10px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #03774A;
            border-color: #03774A;
            border-radius: 5px;
            width: 100%;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #025d37;
            border-color: #025d37;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $('#nik_warga').on('change', function() {
                var nik = $(this).val();
                var nama = $(this).find('option:selected').text();
                $('#nama_warga').val(nama);
            });
        });
    </script>
@endpush
