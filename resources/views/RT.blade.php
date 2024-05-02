@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>halaman RT</h1>
            </div>
            <div class="card-body">
                <a href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
@endsection
