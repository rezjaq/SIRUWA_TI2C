<!-- warga/form_surat/preview.blade.php -->

@extends('layouts.app')

@section('title', 'Priview Formulir Surat')

@section('breadcrumb')
    @component('layouts.breadcrumb', [
        'title' => $breadcrumb['title'],
        'list' => $breadcrumb['list']
    ])
    @endcomponent
@endsection

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h5 class="mb-0">{{ $formSurat->judul }}</h5>
        </div>
        <div class="card-body">
            <p>{{ $formSurat->deskripsi }}</p>
            <iframe src="{{ asset('storage/' . $formSurat->file_path) }}" width="100%" height="500"></iframe>
        </div>
    </div>
</div>
@endsection
