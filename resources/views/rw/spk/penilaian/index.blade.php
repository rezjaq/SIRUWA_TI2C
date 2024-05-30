@extends('template-admin.template')

@section('content')
@if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
<div class="card shadow mb-4">
    <a href="#listkriteria" class="d-block card-header py-3" data-toggle="collapse">
        <h6 class="m-0 font-weight-bold text-primary">Penilaian Alternatif</h6>
    </a>

    <div class="collapse show" id="listkriteria">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('pn.store')}}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-primary float-right">Simpan</button>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Alternatif</th>
                                @foreach ($kriteria as $key => $value)
                                    <th>{{ $value->nama_kriteria }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alternatif as $alt => $valt)
                                <tr>
                                    <input type="hidden" value="{{$valt->id}}" name="alternatif_id[]">
                                    <td>{{ $valt->nama_alternatif }}</td>
                                    @foreach ($kriteria as $key => $value)
                                        <td>
                                            @php
                                                $penilaian = $valt->penilaian->where('crips.kriteria_id', $value->id)->first();
                                            @endphp
                                            @if($penilaian && $penilaian->crips)
                                                {{ $penilaian->crips->nama_crips }} ({{ $penilaian->crips->bobot }})
                                            @else
                                                <select name="crips_id[{{ $valt->id }}][{{ $value->id }}]" class="form-control custom-select">
                                                    <option value="" disabled selected>Select Crips</option>
                                                    @foreach ($value->crips as $crip)
                                                        <option value="{{ $crip->id }}">{{ $crip->nama_crips }} ({{ $crip->bobot }})</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ count($kriteria) + 1 }}" class="text-center">Tidak Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </form>
            </div>
        </div>   
    </div>
</div>
@endsection
