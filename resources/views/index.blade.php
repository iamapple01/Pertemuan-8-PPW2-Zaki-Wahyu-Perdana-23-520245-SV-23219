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
        </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Total Buku:</strong> {{ $jumlah_buku }}</p>

<p><strong>Total Harga Semua Buku:</strong> {{ "Rp. ".number_format($total_harga, 2, ',', '.') }}</p>
