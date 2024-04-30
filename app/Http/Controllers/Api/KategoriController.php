<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\kategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = kategoriModel::with('barang')->get();

        return response()->json([
            'status_code' => 200,
            'data' => $kategoris
        ]);
    }

    public function store(Request $request)
    {
        $kategori = kategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return response()->json([
            'status_code' => 201,
            'data' => $kategori
        ]);
    }

    public function show(kategoriModel $kategori)
    {
        $kategori->load('barang');

        return response()->json([
            'status_code' => 200,
            'data' => $kategori
        ]);
    }

    public function update(Request $request, kategoriModel $kategori)
    {
        $kategori->update($request->all());

        return response()->json([
            'status_code' => 200,
            'data' => $kategori
        ]);
    }

    public function destroy(kategoriModel $kategori)
    {
        $kategori->delete();

        return response()->json([
            'status_code' => 204,
            'success' => true,
            'message' => 'Kategori terhapus',
        ]);
    }
}