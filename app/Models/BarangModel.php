<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class barangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang'; //mendefiniskan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'barang_id'; //mendefiniskan primary key dari tabel yang digunakan

    // protected $fillable = ['kategori_id','barang_kode','barang_nama','harga_beli','harga_jual'];
    protected $fillable = ['kategori_id','barang_kode','barang_nama','harga_beli','harga_jual','image'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    public function stok(): HasMany
    {
        return $this->hasMany(StokModel::class, 'barang_id', 'barang_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/barangGambar/' . $image),
        );
    }
}