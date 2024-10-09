<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
</head>
<html style="background: lightgray">
    
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pegawai</h1>
    <form action="{{ route('biodatas.update', $biodata->id_biodata) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $biodata->nama }}" required>
        </div>
        
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $biodata->jenis_kelamin }}" required>
        </div>
        
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $biodata->tgl_lahir }}" required>
        </div>
        
        <div class="mb-3">
            <label for="no_telp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $biodata->no_telp }}" required>
        </div>
        
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required>{{ $biodata->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $biodata->email }}" required>
        </div>
        
        <div class="mb-3">
            <label for="foto_profil" class="form-label">Foto Profil</label>
            <input type="file" class="form-control" id="foto_profil" name="foto_profil">
            @if($biodata->foto_profil)
                <div class="mt-2">
                    <img src="{{ asset('uploads/' . $biodata->foto_profil) }}" alt="Foto Profil" width="100">
                </div>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Update Profil</button>
    </form>
</div>
@endsection

</html>
</body>