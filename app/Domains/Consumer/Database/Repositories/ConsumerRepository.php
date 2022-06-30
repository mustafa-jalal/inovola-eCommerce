<?php

namespace App\Domains\Consumer\Database\Repositories;

use App\Domains\Consumer\DTOs\ConsumerDto;
use App\Domains\Consumer\Models\Consumer;

class ConsumerRepository
{
    public function save(ConsumerDto $dto)
    {
        return Consumer::create([
            'name' => $dto->getName(),
            'email' => $dto->getEmail(),
            'password' => bcrypt($dto->getPassword())
        ]);
    }
}
