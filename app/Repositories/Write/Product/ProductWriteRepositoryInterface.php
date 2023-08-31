<?php

namespace App\Repositories\Write\Product;

use App\Models\Product;
use App\Services\Dtos\Products\CreateProductDto;
use App\Services\Dtos\Products\UpdateProductDto;

interface ProductWriteRepositoryInterface
{
    public function create(CreateProductDto $dto): bool;

    public function update(UpdateProductDto $dto): bool;

    public function delete(int $userId, int $productId): bool;
}
