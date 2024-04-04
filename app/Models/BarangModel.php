<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class barangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang'; //mendefiniskan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'barang_id'; //mendefiniskan primary key dari tabel yang digunakan

    protected $fillable = ['kategori_id','barang_kode','barang_nama','harga_beli','harga_jual'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }
}