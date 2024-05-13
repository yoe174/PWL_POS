<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\barangModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:m_kategori,kategori_id',
            'barang_kode' => 'required|unique:m_barang',
            'barang_nama' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $hashedName = $image->hashName();
            $path = $image->storeAs('public/barang', $hashedName);
            $barang = barangModel::create([
                'kategori_id' => $request->kategori_id,
                'barang_kode' => $request->barang_kode,
                'barang_nama' => $request->barang_nama,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'image' => $hashedName,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'errors' => 'No image file uploaded',
            ], 422);
        }

        if ($barang) {
            return response()->json([
                'success' => true,
                'status_code' => 201,
                'barang' => [
                    'kategori_id' => $request->kategori_id,
                    'barang_kode' => $request->barang_kode,
                    'barang_nama' => $request->barang_nama,
                    'harga_beli' => $request->harga_beli,
                    'harga_jual' => $request->harga_jual,
                    'image' => 'localhost:8000/storage/barang/' . $hashedName,
                ]
            ], 201);
        }

        return response()->json([
            'status_code' => 503,
            'success' => false
        ]);
        // $barang = barangModel::create($request->all());

        // return response()->json([
        //     'status_code' => 201,
        //     'data' => $barang
        // ]);
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
