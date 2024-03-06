<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'C001',
                'kategori_nama' => 'Elektronik',
                'created_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'C002',
                'kategori_nama' => 'Peralatan Rumah Tangga',
                'created_at' => now(),
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'C003',
                'kategori_nama' => 'Olahraga',
                'created_at' => now(),
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'C004',
                'kategori_nama' => 'Mainan',
                'created_at' => now(),
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'C005',
                'kategori_nama' => 'Otomotif',
                'created_at' => now(),
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
