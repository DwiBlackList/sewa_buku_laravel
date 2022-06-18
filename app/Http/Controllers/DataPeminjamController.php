<?php

namespace App\Http\Controllers;

use App\Models\DataPeminjam;
use App\Models\Telepon;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DataPeminjamController extends Controller
{
    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;
        $data_peminjam = DataPeminjam::where('nama_peminjam' , 'like' , '%'.$cari.'%')->Paginate($batas);
        $no = $batas * ($data_peminjam->currentPage() - 1);
        return view('data_peminjam.search' , compact('data_peminjam' , 'no' , 'cari'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_peminjam = DataPeminjam::orderBy('id' , 'asc')->Paginate(5);
        $jumlah_peminjam = DataPeminjam::all()->count();
        $no = 0;
        return view('data_peminjam/index' , compact('data_peminjam' , 'no' , 'jumlah_peminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_jenis_kelamin = JenisKelamin::pluck('nama_jenis_kelamin' , 'id_jenis_kelamin');
        return view('data_peminjam.create' , compact('list_jenis_kelamin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode_peminjam' => 'required|string',
            'nama_peminjam' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $foto_peminjam = $request->foto;
        $nama_file = time().'.'.$foto_peminjam->getClientOriginalExtension();
        $foto_peminjam->move('foto_peminjam/' , $nama_file);

        $data_peminjam = new DataPeminjam;
        $data_peminjam->kode_peminjam = $request->kode_peminjam;
        $data_peminjam->nama_peminjam = $request->nama_peminjam;
        $data_peminjam->id_jenis_kelamin = $request->id_jenis_kelamin;
        $data_peminjam->tanggal_lahir = $request->tanggal_lahir;
        $data_peminjam->alamat = $request->alamat;
        $data_peminjam->pekerjaan = $request->pekerjaan;
        $data_peminjam->foto = $nama_file;
        $data_peminjam->save();

        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->telepon;
        $data_peminjam->telepon()->save($telepon);

        Session::flash('flash_message' , 'Data Peminjam Berhasil Disimpan !');

        return redirect('data_peminjam');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjam = DataPeminjam::find($id);
        if (!empty($peminjam->telepon->nomor_telepon)) {
            $peminjam->nomor_telepon = $peminjam->telepon->nomor_telepon;
        }
        $list_jenis_kelamin = JenisKelamin::pluck('nama_jenis_kelamin' , 'id_jenis_kelamin');
        return view('data_peminjam.edit' , compact('peminjam' , 'list_jenis_kelamin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_peminjam = DataPeminjam::find($id);
        if ($request->has('foto')) {
            $foto_peminjam = $request->foto;
            $nama_file = time().'.'.$foto_peminjam->getClientOriginalExtension();
            $foto_peminjam->move('foto_peminjam/' , $nama_file);
            $data_peminjam->kode_peminjam = $request->kode_peminjam;
            $data_peminjam->nama_peminjam = $request->nama_peminjam;
            $data_peminjam->id_jenis_kelamin = $request->id_jenis_kelamin;
            $data_peminjam->tanggal_lahir = $request->tanggal_lahir;
            $data_peminjam->alamat = $request->alamat;
            $data_peminjam->pekerjaan = $request->pekerjaan;
            $data_peminjam->foto = $nama_file;
            $data_peminjam->update();
        }else {
            $data_peminjam->kode_peminjam = $request->kode_peminjam;
            $data_peminjam->nama_peminjam = $request->nama_peminjam;
            $data_peminjam->id_jenis_kelamin = $request->id_jenis_kelamin;
            $data_peminjam->tanggal_lahir = $request->tanggal_lahir;
            $data_peminjam->alamat = $request->alamat;
            $data_peminjam->pekerjaan = $request->pekerjaan;
            $data_peminjam->update();
        }
        

        if ($data_peminjam->telepon) {
            if ($request->filled('telepon')) {
                $telepon = $data_peminjam->telepon;
                $telepon->nomor_telepon = $request->telepon;
                $data_peminjam->telepon()->save($telepon);
            }else {
                $data_peminjam->telepon()->delete();
            }
        }else {
            if ($request->filled('telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->telepon;
                $data_peminjam->telepon()->save($telepon);
            }
        }

        Session::flash('flash_message' , 'Data Peminjam Berhasil Diupdate !');

        return redirect('data_peminjam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_peminjam = DataPeminjam::find($id);
        $data_peminjam->delete();

        Session::flash('flash_message' , 'Data Peminjam Berhasil Dihapus !');
        Session::flash('penting' , true);

        return redirect('data_peminjam');
    }

    public function CobaCollection()
    {
        $daftar = ['Budi Pranoto' , 'amy Delia' , 'Cakra Lukman' , 'Dewi Nova' , 'Kartini indah'];
        $collection = collect($daftar)->map(function($nama){
            return ucwords($nama);
        });
        return $collection;
    }

    public function CollectionFirst()
    {
        $collection = DataPeminjam::all()->first();
        return $collection;
    }

    public function CollectionLast()
    {
        $collection = DataPeminjam::all()->last();
        return $collection;
    }

    public function CollectionCount()
    {
        $collection = DataPeminjam::all()->count();
        return $collection;
    }

    public function CollectionTake()
    {
        $collection = DataPeminjam::all()->take(2);
        return $collection;
    }

    public function CollectionPluck()
    {
        $collection = DataPeminjam::all()->pluck('nama_peminjam');
        return $collection;
    }

    public function CollectionWhere()
    {
        $collection = DataPeminjam::all()->where('kode_peminjam' , 'P1001');
        return $collection;
    }

    public function CollectionWhereIn()
    {
        $collection = DataPeminjam::all()->wherein('kode_peminjam' , ['P1001' , 'P1002']);
        return $collection;
    }

    public function CollectionToArray()
    {
        $collection = DataPeminjam::select('kode_peminjam' , 'nama_peminjam')->take(3)->get();
        $koleksi = $collection->toArray();
        foreach ($koleksi as $peminjam ) {
            echo $peminjam['kode_peminjam'].' - '.$peminjam['nama_peminjam'].'<br>';
        }
    }

    public function CollectionToJson()
    {
        $data = [
            ['kode_peminjam' => 'P0001' , 'nama_peminjam' => 'karina'],
            ['kode_peminjam' => 'P0002' , 'nama_peminjam' => '404'],
            ['kode_peminjam' => 'P0003' , 'nama_peminjam' => 'Tak tau'],
            ['kode_peminjam' => 'P0004' , 'nama_peminjam' => 'Entah'],
        ];
        $collection = collect($data)->toJson();
        return $collection;
    }
}
