<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    // public function index()
    // {
        // $data = 
        // [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert Data baru berhasil';
        
        // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'Update data berhasil. Jumlah data yang diupdate ; ' .$row. ' baris';

        // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus ; ' .$row. ' baris';

    //     $data = DB::table('m_kategori')->get();
    //     return view('kategori',['data' => $data]);
    // }

    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

    public function edit($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function edit_simpan(Request $request, $id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;
        $kategori->save();
        return redirect('/kategori');
    }

    public function hapus($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();
        return redirect('/kategori');
    }
    
}

