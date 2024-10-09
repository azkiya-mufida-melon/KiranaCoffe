<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Pegawai Kirana Coffee</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('biodatas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BIODATA</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Foto Profil</th>
                                    <th scope="col" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            @forelse ($biodatas as $biodata)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/biodatas/'.$biodata->foto_profil) }}" class="rounded" style="width: 150px">
                                </td>
                                <td>{{ $biodata->nama }}</td>
                                <td>{{ $biodata->jenis_kelamin }}</td>
                                <td>{{ \Carbon\Carbon::parse($biodata->tgl_lahir)->format('d-m-Y') }}</td>
                                <td>{!! $biodata->alamat !!}</td>
                                <td>{{ "+62 " . substr($biodata->no_telp, 1) }}</td>
                                <td>{{ $biodata->email }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('biodatas.destroy', $biodata->id_biodata) }}" method="POST">
                                        <a href="{{ route('biodatas.show', $biodata->id_biodata) }}" class="btn btn-sm btn-dark">TAMPIL</a>
                                        <a href="{{ route('biodatas.edit', $biodata->id_biodata) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                    <div class="alert alert-danger">
                                        Data menu belum Tersedia.
                                    </div>
                                @endforelse

                        </table>
                        {{ $biodatas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>