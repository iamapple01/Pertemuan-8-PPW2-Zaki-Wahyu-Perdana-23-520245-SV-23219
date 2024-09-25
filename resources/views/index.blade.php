<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Belajar CRUD PPW2</title>
</head>
<h1>Daftar Buku</h1>
<table class="table table-stripped">
    <thead>
        <tr>
            <th>id</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_buku as $buku)
        <tr>
            <td>{{ $buku->id }}</td>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{ "Rp. ".number_format($buku->harga, 2, ',', '.') }}</td>
            <td>{{ (new DateTime($buku->tgl_terbit))->format('d/m/Y') }} </td>
            <td><form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin mau di hapus?')" type="submit" 
                class="btn btn-danger">Hapus</button>
            </form>
            <td>
                <form method="POST" action="{{ route('buku.update', $buku->id) }}">
                    @csrf
                    <input type="text" name="judul" value="{{ $buku->judul }}">
                    <input type="text"  name="penulis" value="{{ $buku->penulis }}">
                    <input type="text"  name="harga" value="{{ $buku->harga }}">
                    <input type="date"  name="tgl_terbit" value="{{ $buku->tgl_terbit }}">
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Total Buku:</strong> {{ $jumlah_buku }}</p>

<p><strong>Total Harga Semua Buku:</strong> {{ "Rp. ".number_format($total_harga, 2, ',', '.') }}</p>

<a href="{{ route('create') }}" class="btn btn-primary">Tambah Buku</a>
