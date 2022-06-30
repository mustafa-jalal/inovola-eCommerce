<?php

namespace App\Domains\Merchant\Database\Repositories;

use App\Domains\Merchant\DTOs\MerchantDto;
use App\Domains\Merchant\Models\Merchant;
use App\Domains\Merchant\Models\Store;

class MerchantRepository
{
    /**
     * @param MerchantDto $dto
     * @return void
     */
    public function save(MerchantDto $dto)
    {
        $merchant =  Merchant::create([
            'name' => $dto->getName(),
            'email' => $dto->getEmail(),
            'password' => bcrypt($dto->getPassword())
        ]);

        $merchant->initializeStore();
    }
}
