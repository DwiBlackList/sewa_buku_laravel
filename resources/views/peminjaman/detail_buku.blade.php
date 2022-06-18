@extends('layout.master')
@section('content')
<div class="container">
    <h4>Detail Buku</h4>
    <p>Kode Buku : {{ $data_buku->kode_buku }}</p>
    <p>Nama Buku : {{ $data_buku->judul_buku }}</p>

    <div class="table-responsive">
        <table class="table table-dark table-stripped table-hovered">
            <tr>
                <td>No</td>
                <td>Nama Peminjam</td>
            </tr>
            @php $i = 1 @endphp
            @foreach($data_buku->data_peminjam as $item)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item->nama_peminjam }}</td>
                </tr>
            @php $i++ @endphp
            @endforeach
        </table>
    </div>
</div>
@endsection