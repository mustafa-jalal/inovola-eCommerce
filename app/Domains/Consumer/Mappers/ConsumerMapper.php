<?php

namespace App\Domains\Consumer\Mappers;

use App\Domains\Consumer\DTOs\ConsumerDto;
use Illuminate\Http\Request;

class ConsumerMapper
{
    public static function toDto(Request $request): ConsumerDto
    {
        $dto = new ConsumerDto();
        $dto->setName($request->name);
        $dto->setEmail($request->email);
        $dto->setPassword($request->password);

        return $dto;
    }
}
