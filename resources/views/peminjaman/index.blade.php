@extends('layout.master')
@section('content')
<div class="container">
<h4>Data Peminjaman</h4>
<a href="{{ route('peminjaman.create') }}" class="btn btn-outline-primary">Tambah Data Peminjaman</a>

<div class="table-responsive">
    <table class="table table-dark table-hovered table-stripped">
        <tr>
            <td>No</td>
            <td>Kode Tranksaksi</td>
            <td>Nama Peminjaman</td>
            <td>Judul Buku</td>
            <td>Tanggal Peminjaman</td>
            <td>Tanggal Pengembalian</td>
        </tr>
        @foreach($data_peminjaman as $x)
            <tr>
                <td>{{ $x->id }}</td>
                <td>{{ $x->kode_tranksaksi }}</td>
                <td><a href="{{ route('peminjaman.detail_peminjam' , $x->data_peminjam['id']) }}">{{ $x->data_peminjam['nama_peminjam'] }}</a></td>
                <td><a href="{{ route('peminjaman.detail_buku' , $x->data_buku['id']) }}">{{ $x->data_buku['judul_buku'] }}</a></td>
                <td>{{ $x->tgl_peminjaman }}</td>
                <td>{{ $x->tgl_pengembalian }}</td>
            </tr>
        @endforeach
    </table>
    <div class="pull-left">
        <strong>
            Jumlah Peminjaman : {{ $jumlah_peminjaman }}
        </strong>
    </div>
</div>
</div>
@endsection