@extends('template-admin.template')

@section('title', 'Kelola Pengaduan')

@section('content')
    <div class="form-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Warga</th>
                    <th>Nama Usaha</th>
                    <th>Jenis Usaha</th>
                    <th>Alamat Usaha</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usahaWarga as $usaha)
                    <tr>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $usaha->nama_usaha }}</td>
                        <td>{{ $usaha->jenis_usaha }}</td>
                        <td>{{ $usaha->alamat_usaha }}</td>
                        <td>{{ $usaha->foto }}</td>
                        <td>{{ $usaha->status }}</td>
                        <td>
                            @if($usaha->status == 'pending')
                            <form action="{{ route('umkm.approve', ['id' => $usaha->id_usahaWarga]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('umkm.reject', ['id' => $usaha->id_usahaWarga]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>                                                       
                            @else
                                {{ ucfirst($usaha->status) }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
