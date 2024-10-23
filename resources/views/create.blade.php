@extends('app')

@section('content')
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="POST" action="{{route('buku.store')}}">
            @csrf
            <div>Judul <input type="text" name="judul"></div>
            <div>Penulis <input type="text" name="penulis"></div>
            <div>Harga <input type="text" name="harga"></div>
            <div>Tanggal Terbit <input type="date" name="tgl_terbit" class="date form-control" placeholder="yyyy/mm/dd"></div>
            <button type="submit">Simpan</button>
            <a href="{{'/buku'}}">Kembali</a>
            
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
        </form>
    </div>
@endsection
