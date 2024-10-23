<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Belajar CRUD PPW2</title>
</head>
<body> <!-- Missing body tag added -->
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
                <td>{{ number_format($buku->harga, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}</td> <!-- Updated -->
                <td>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin mau di hapus?')" type="submit" 
                        class="btn btn-danger">Hapus</button>
                    </form>
                </td> <!-- Missing closing td tag -->
                <td>
                    <form method="POST" action="{{ route('buku.update', $buku->id) }}">
                        @csrf
                        <input type="text" name="judul" value="{{ $buku->judul }}">
                        <input type="text" name="penulis" value="{{ $buku->penulis }}">
                        <input type="text" name="harga" value="{{ $buku->harga }}">
                        <input type="date" name="tgl_terbit" value="{{ $buku->tgl_terbit }}">
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </td>
            </tr> <!-- Missing closing tr tag -->
            @endforeach
        </tbody>
    </table>
    <div>
    {{ $data_buku->links() }}
</div>
    </div>
    <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>

    <p><strong>Total Buku:</strong> {{ $jumlah_buku }}</p>

    <p><strong>Total Harga Semua Buku:</strong> {{ "Rp. ".number_format($total_harga, 2, ',', '.') }}</p>

    <a href="{{ route('create') }}" class="btn btn-primary">Tambah Buku</a>

    @if(Session::has('pesan'))
        <div class="alert alert-success">{{ Session::get('pesan') }}</div>
    @endif
</body>
</html>
