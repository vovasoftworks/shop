<?php

namespace App\Services\Actions\Products;

use App\Models\Product;
use App\Services\Dtos\Products\CreateProductDto;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;

class CreateProductAction
{
    protected ProductWriteRepositoryInterface $productWriteRepository;

    public function __construct(ProductWriteRepositoryInterface $productWriteRepository)
    {
        $this->productWriteRepository = $productWriteRepository;
    }

    public function run(CreateProductDto $dto)
    {
        $this->productWriteRepository->create($dto);
    }
}
