@extends('layout.master')
@section('content')
<div class="container">
    <h4>Tambah Tranksaksi Peminjaman</h4>
    <form method="POST" action="{{ route('peminjaman.store') }}">
        @csrf
        <input type="hidden" name="tgl_peminjaman" value="{{ date('Y-m-d') }}">
        <input type="hidden" name="tgl_pengembalian" value="{{ date('Y-m-d', strtotime('+15 day', strtotime(date('Y-m-d')))) }}">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <tr>
                    <td>Kode Peminjaman</td>
                    <td>:</td>
                    <td><input type="text" name="kode_tranksaksi" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nama Peminjaman</td>
                    <td>:</td>
                    <td>
                        <select class="form-control" name="id_peminjam" id="">
                            <option value="">Pilih Judul Buku</option>
                            @foreach($list_data_peminjam as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td>:</td>
                    <td>
                        <select class="form-control" name="id_buku" id="">
                            <option value="">Pilih Judul Buku</option>
                            @foreach($list_data_buku as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><div class="d-grid"><button type="submit" class="btn btn-outline-success">Simpan</button></div></td>
                </tr>
            </table>
        </div>
    </form>
</div>
@endsection