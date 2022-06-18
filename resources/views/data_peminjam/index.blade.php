@extends('layout.master')
@section('content')
<div class="container">
    <hr>
    <div class="row">
        <div class="col-lg-4 col-12">
            <h4>Data Peminjam</h4>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4 col-12">
            <p align="right"><a href="{{ route('data_peminjam.create') }}" class="btn btn-outline-primary">Tambah Data</a></p>
        </div>
    </div>
    <br>
    @include('_partial/flash_message')
    <form action="{{ route('data_peminjam.search') }}" method="get">
        @csrf
        <div class="row">
            <div class="col-lg-8"></div>
            <div class="col-lg-4 col-12">
                <input type="text" name="kata" placeholder="Cari ..." class="form-control">
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-dark table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjam</th>
                <th>Nama Peminjam</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Nomor Telepon</th>
                <th>Foto</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data_peminjam))
                @foreach($data_peminjam as $x)
                <tr>
                    <td>{{ $x->id }}</td>
                    <td>{{ $x->kode_peminjam }}</td>
                    <td>{{ $x->nama_peminjam }}</td>
                    <td>{{ $x->jenis_kelamin['nama_jenis_kelamin'] }}</td>
                    <td>{{ $x->tanggal_lahir }}</td>
                    <td>{{ $x->alamat }}</td>
                    <td>{{ $x->pekerjaan }}</td>
                    <td>{{ !empty($x->telepon['nomor_telepon'])?$x->telepon['nomor_telepon'] : '-' }}</td>
                    <td>
                        @if(empty($x->foto))
                        <img src="{{ asset('foto_peminjam/default.jpg') }}" alt="" class="img-fluid">
                        @else
                        <img src="{{ asset('foto_peminjam/'.$x->foto) }}" alt="" class="img-fluid">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('data_peminjam.edit' , $x->id) }}" class="btn btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('data_peminjam.destroy' , $x->id) }}" method="post">
                            @csrf
                            <button class="btn btn-outline-warning" onclick="return confirm('Yang Bener Mau Dihapus ?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">Data Tidak Ada</td>
                </tr>
            @endif
        </tbody>
    </table>
    
    <p>{{ $data_peminjam->links() }}</p>
    <div class="pull-left">
        <strong>
            Jumlah Peminjam : {{ $jumlah_peminjam }}
        </strong>
    </div>
</div>
@endsection