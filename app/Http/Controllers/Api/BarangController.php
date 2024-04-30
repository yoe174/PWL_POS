<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\barangModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = barangModel::with('kategori')->get();

        return response()->json([
            'status_code' => 200,
            'data' => $barangs
        ]);
    }

    public function store(Request $request)
    {

        $barang = barangModel::create($request->all());

        return response()->json([
            'status_code' => 201,
            'data' => $barang
        ]);
    }

    public function show(barangModel $barang)
    {
        $barang->load('kategori'); // Load relasi kategori dan stok

        return response()->json([
            'status_code' => 200,
            'data' => $barang
        ]);
    }

    public function update(Request $request, barangModel $barang)
    {
        $barang->update($request->all());

        return response()->json([
            'status_code' => 200,
            'data' => $barang
        ]);
    }

    public function destroy(barangModel $barang)
    {
        $barang->delete();

        return response()->json([
            'status_code' => 204,
            'success' => true,
            'message' => 'Barang terhapus',
        ]);
    }
}
