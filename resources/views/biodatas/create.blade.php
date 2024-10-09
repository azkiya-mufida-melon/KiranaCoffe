<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
</head>

@extends('layouts.app') <!-- Jika kamu menggunakan layout utama -->

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <form action="{{ route('biodatas.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
                    <span class="font-weight-bold">{{ old('nama') }}</span>
                    <span class="text-black-50">{{ old('email') }}</span>
                    <span></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="nama lengkap" value="{{ old('nama') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" placeholder="jenis kelamin" value="{{ old('jenis_kelamin') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_telp" placeholder="masukkan nomor telepon" value="{{ old('no_telp') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="masukkan alamat" value="{{ old('alamat') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="masukkan email" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Foto Profil</label>
                            <input type="file" class="form-control" name="foto_profil" placeholder="URL foto profil" value="{{ old('foto_profil') }}">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Simpan Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection