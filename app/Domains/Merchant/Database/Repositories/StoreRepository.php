<?php

namespace App\Domains\Merchant\Database\Repositories;

use App\Domains\Merchant\DTOs\UpdateStoreDto;
use App\Domains\Merchant\Models\Store;

class StoreRepository
{
    /**
     * @param UpdateStoreDto $dto
     * @return void
     */
    public function update(UpdateStoreDto $dto): void
    {
        Store::where('merchant_id', $dto->getMerchantId())->update($dto->getData());
    }
}
