@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pegawai</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $biodata->nama }}</h5>
            <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $biodata->jenis_kelamin }}</p>
            <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $biodata->tgl_lahir }}</p>
            <p class="card-text"><strong>Nomor Telepon:</strong> {{ $biodata->no_telp }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $biodata->alamat }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $biodata->email }}</p>

            @if($biodata->foto_profil)
            <p><strong>Foto Profil:</strong></p>
            <img src="{{ asset('uploads/' . $biodata->foto_profil) }}" alt="Foto Profil" width="150">
            @else
            <p><strong>Foto Profil:</strong> Tidak ada foto</p>
            @endif

            <a href="{{ route('biodatas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
