<?php

namespace App\Domains\Merchant\Mappers;

use App\Domains\Merchant\DTOs\MerchantDto;
use Illuminate\Http\Request;

class MerchantMapper
{
    public static function toDto(Request $request): MerchantDto
    {
        $dto = new MerchantDto();
        $dto->setName($request->name);
        $dto->setEmail($request->email);
        $dto->setPassword($request->password);

        return $dto;
    }
}
