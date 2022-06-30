<?php

namespace App\Domains\Product\Database\Repositories;

use App\Domains\Product\DTOs\ProductDto;
use App\Domains\Product\Enums\TranslationType;
use App\Domains\Product\Models\Product;
use App\Domains\Product\Models\ProductTranslation;

class ProductRepository
{
    public function save(ProductDto $dto)
    {
        $product = Product::create([
            'store_id' => $dto->getStoreId()
        ]);

        ProductTranslation::create([
                'text' => $dto->getArName(),
                'type' => TranslationType::$NAME,
                'locale' => 'ar',
                'product_id' => $product->id,
            ]);

        ProductTranslation::create([
            'text' => $dto->getEnName(),
            'type' => TranslationType::$NAME,
            'locale' => 'en',
            'product_id' => $product->id,
        ]);

        ProductTranslation::create([
            'text' => $dto->getArDescription(),
            'type' => TranslationType::$DESCRIPTION,
            'locale' => 'ar',
            'product_id' => $product->id,
        ]);

        ProductTranslation::create([
            'text' => $dto->getEnDescription(),
            'type' => TranslationType::$DESCRIPTION,
            'locale' => 'en',
            'product_id' => $product->id,
        ]);
    }

    public function get(string $id)
    {
        return Product::find($id);
    }
}
