@extends('layout.master')
@section('content')
<div class="container">
    <h4>Tambah Data Peminjam</h4>

    @if(count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('data_peminjam.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <table class="table table-dark table-stripped">
            <tr>
                <td>Kode Peminjam</td>
                <td>:</td>
                <td><input type="text" name="kode_peminjam" id="" class="form-control"></td>
            </tr>
            <tr>
                <td>Nama Peminjam</td>
                <td>:</td>
                <td><input type="text" name="nama_peminjam" id="" class="form-control"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="id_jenis_kelamin" class="form-control" id="">
                        @foreach($list_jenis_kelamin as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir" id="" class="form-control"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" id="" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><input type="text" name="pekerjaan" id="" class="form-control"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><input type="text" name="telepon" id="" class="form-control"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td><input type="file" name="foto" id="" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="3"><div class="d-grid"><button type="submit" class="btn btn-outline-success">Simpan</button></div></td>
            </tr>
        </table>
    </form>
</div>
@endsection