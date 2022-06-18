@extends('layout.master')
@section('content')
<div class="container">
    <h4>Detail Peminjam</h4>
    <p>Kode Peminjam : {{ $data_peminjam->kode_peminjam }}</p>
    <p>Nama Peminjam : {{ $data_peminjam->nama_peminjam }}</p>

    <div class="table-responsive">
        <table class="table table-dark table-stripped table-hovered">
            <tr>
                <td>No</td>
                <td>Judul Buku Yang Dipinjam</td>
            </tr>
            @php $i = 1 @endphp
            @foreach($data_peminjam->data_buku as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->judul_buku }}</td>
                </tr>
            @php $i ++ @endphp
            @endforeach
        </table>
    </div>
</div>
@endsection