<?php

namespace App\Services\Actions\Products;

use App\Repositories\Write\Product\ProductWriteRepositoryInterface;

class DeleteProductAction
{
    protected ProductWriteRepositoryInterface $productWriteRepository;

    public function __construct(ProductWriteRepositoryInterface $productWriteRepository)
    {
        $this->productWriteRepository = $productWriteRepository;
    }

    public function run(int $userId, int $productId)
    {
        $this->productWriteRepository->delete($userId, $productId);
    }
}
