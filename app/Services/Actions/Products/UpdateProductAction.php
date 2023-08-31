<?php

namespace App\Services\Actions\Products;

use App\Services\Dtos\Products\UpdateProductDto;
use App\Repositories\Write\Product\ProductWriteRepositoryInterface;

class UpdateProductAction
{
    protected ProductWriteRepositoryInterface $productWriteRepository;

    public function __construct(ProductWriteRepositoryInterface $productWriteRepository)
    {
        $this->productWriteRepository = $productWriteRepository;
    }

    public function run(UpdateProductDto $dto)
    {
        $this->productWriteRepository->update($dto);
    }

}
