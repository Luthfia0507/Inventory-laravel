<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus hanya data contoh lama dari seeder sebelumnya.
        Product::whereIn('sku', [
            'ELK-001',
            'ELK-002',
            'AKS-001',
            'PRT-001',
            'FSH-001',
        ])->delete();

        // Hapus kategori contoh lama jika sudah tidak memiliki produk.
        Category::whereIn('name', [
            'Elektronik',
            'Aksesoris',
            'Peralatan Rumah Tangga',
            'Fashion',
        ])->delete();

        $makeup = Category::where('name', 'Make-up')->firstOrFail();
        $skincare = Category::where('name', 'Skincare')->firstOrFail();

        $products = [
            [
                'category_id' => $makeup->id,
                'sku' => 'MUP-001',
                'name' => 'Perfect Cover Cushion',
                'brand' => 'Glad2Glow',
                'price' => 85000,
                'stock' => 20,
                'minimum_stock' => 5,
                'description' => 'Cushion untuk membantu meratakan warna kulit.',
            ],
            [
                'category_id' => $makeup->id,
                'sku' => 'MUP-002',
                'name' => 'Matte Kiss Lip Cream',
                'brand' => 'OMG',
                'price' => 35000,
                'stock' => 25,
                'minimum_stock' => 5,
                'description' => 'Lip cream dengan hasil akhir matte.',
            ],
            [
                'category_id' => $makeup->id,
                'sku' => 'MUP-003',
                'name' => 'Setting Spray Dewy Fix',
                'brand' => 'Deazzle Me',
                'price' => 45000,
                'stock' => 15,
                'minimum_stock' => 5,
                'description' => 'Setting spray untuk membantu menjaga riasan.',
            ],
            [
                'category_id' => $skincare->id,
                'sku' => 'SKN-001',
                'name' => 'UV Shield Sunscreen SPF 35',
                'brand' => 'Wardah',
                'price' => 45000,
                'stock' => 30,
                'minimum_stock' => 8,
                'description' => 'Sunscreen untuk perlindungan kulit dari sinar matahari.',
            ],
            [
                'category_id' => $skincare->id,
                'sku' => 'SKN-002',
                'name' => 'Brightening Moisturizer',
                'brand' => 'Glowshopy',
                'price' => 55000,
                'stock' => 18,
                'minimum_stock' => 5,
                'description' => 'Pelembap untuk membantu menjaga kelembapan kulit.',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['sku' => $product['sku']],
                $product
            );
        }
    }
}
